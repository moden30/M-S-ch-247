<?php

namespace App\Http\Controllers\Payment;

//use App\Events\MessageSent;
use App\Events\NewOrderNotification;
use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\InvoiceEmailJob;
use App\Jobs\SendRawEmailJob;
use App\Mail\InvoiceMail;
use App\Models\ContributorCommissionEarning;
use App\Models\ThongBao;
use App\Models\VaiTro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\DonHang;
use Illuminate\Support\Facades\Mail;

class ZalopayController extends Controller
{
    protected $order_id;

    public function createPayment(Request $request)
    {
        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        $items = '[]';
        $transID = rand(0, 1000000);

        $sach_id = $request->input('sach_id', null);
        $user_id = $request->input('user_id', null);
        $payment_method = $request->input('payment_method', '');
        $orderId = $request->input('orderId', time() . "");
        $orderInfo = $request->input('orderInfo', 'Thanh toán qua Zalopay');
        $amount = $request->input('amount', '10000');

        $donhangData = [
            'sach_id' => $sach_id,
            'user_id' => $user_id,
            'phuong_thuc_thanh_toan_id' => $payment_method,
            'ma_don_hang' => $orderId,
            'so_tien_thanh_toan' => $amount,
            'mo_ta' => $orderInfo
        ];
        $donhang = DonHang::query()->create($donhangData);
        $this->order_id = $donhang->id;
        $embeddata = '{"redirecturl": "http://localhost:8000/payment/zalopay/callback?orderid=' . $donhang->id . '"}';

        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000),
            "app_trans_id" => date("ymd") . "_" . $transID,
            "app_user" => "user123",
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => $donhang->so_tien_thanh_toan,
            "description" => "Lazada - Payment for the order #$transID",
            "bank_code" => "zalopayapp",
        ];

        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

//        $response = Http::asForm()->post($config["endpoint"], $order);
        $response = Http::withoutVerifying()->asForm()->post($config["endpoint"], $order);

        $result = $response->json();

        if ($response->failed()) {
            return response()->json(['error' => 'Request failed'], 500);
        }

        if (isset($result['order_url'])) {
            return redirect($result['order_url']);
        }

        return response()->json($result);
    }

    public function callBack(Request $request)
    {
        $status = $request->query('status', null);
        $orderid = $request->query('orderid', null);
        $order = DonHang::with('user', 'sach')->find($orderid);

        // Nếu đơn hàng đã có trạng thái 'thanh_cong', tránh xử lý lại
        if ($order->trang_thai == 'thanh_cong') {
            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công');
        }

        if ($status == 1) {
            $order->trang_thai = 'thanh_cong';
            $order->save();

            $amount = $order->so_tien_thanh_toan;
            $book = $order->sach;
            $bookOwner = $book->user;
            $userRate = $bookOwner->getCommissionRate();

            // Lấy admin duy nhất
            $admin = User::whereHas('vai_tros', function ($query) {
                $query->where('vai_tro_id', VaiTro::ADMIN_ROLE_ID);
            })->first();

            $rose = 0; // Số tiền cộng tác viên nhận
            $roseForAdmin = 0; // Số tiền admin nhận

            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                // Cộng tác viên đăng sách
                $rose = $amount * $userRate;
                $roseForAdmin = $amount * (1 - $userRate);

                // Cập nhật số dư
                $bookOwner->so_du += $rose;
                $bookOwner->save();

                $admin->so_du += $roseForAdmin;
                $admin->save();

                //Lưu lịch sử nhận hoa hồng của ctv
                ContributorCommissionEarning::query()->create([
                    'user_id' => $bookOwner->id,
                    'id_don_hang' => $order->id,
                    'commission_amount' => $rose,
                    'commission_rate' => $bookOwner->getCommissionRate(),
                    'admin_earnings' => $roseForAdmin,
                ]);

                // Thông báo cho cộng tác viên
                $url = route('orderDetails', ['id' => $order->id]);
                $noiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';
                $notificationContributor = ThongBao::create([
                    'user_id' => $bookOwner->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $noiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tai_chinh',
                ]);

                broadcast(new NotificationSent($notificationContributor));

                Mail::raw($noiDung . ' Xem chi tiết đơn hàng tại đây: ' . $url, function ($message) use ($bookOwner) {
                    $message->to($bookOwner->email)
                        ->subject('Thông báo nhận tiền từ đơn hàng');
                });

                // Thông báo cho admin
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($roseForAdmin, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';

                $notificationAdmin = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notificationAdmin));

                Mail::raw($adminNoiDung . ' Xem chi tiết tại đây: ' . $url, function ($message) use ($admin) {
                    $message->to($admin->email)
                        ->subject('Thông báo nhận tiền từ đơn hàng');
                });
            } elseif ($bookOwner->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                // Admin đăng sách
                $rose = $amount;
                $admin->so_du += $rose;
                $admin->save();

                // Thông báo cho admin
                $url = route('orderDetails', ['id' => $order->id]);
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $order->ma_don_hang . '".';

                $notificationAdmin = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notificationAdmin));

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );
            }

            InvoiceEmailJob::dispatch($order->user->email, $order);

            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công!');
        }

        return redirect()->route('home')->with('error', 'Đơn hàng bị hủy');
    }

}























