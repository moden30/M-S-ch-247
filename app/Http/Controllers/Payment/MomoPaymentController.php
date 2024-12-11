<?php

namespace App\Http\Controllers\Payment;

use App\Events\MessageSent;
use App\Events\NotificationSent;
use App\Jobs\InvoiceEmailJob;
use App\Jobs\SendRawEmailJob;
use App\Mail\InvoiceMail;
use App\Models\ContributorCommissionEarning;
use App\Models\DonHang;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;

class MomoPaymentController extends Controller
{
    protected $zalopay;
    protected $order;
    public function createPayment(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $this->zalopay = new ZalopayController();
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = $request->input('partnerCode', 'MOMOBKUN20180529');
        $accessKey = $request->input('accessKey', 'klm05TvNBzhg7h7j');
        $secretKey = $request->input('secretKey', 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa');

        //Thông tin gửi vào to server
        $sach_id = $request->input('sach_id');
        $user_id = auth()->user()->id;
        $user_buying = User::query()->find($user_id);

        $payment_method = $request->input('payment_method', 'Momo');
        $orderId = $this->zalopay->generateOrderId();
        $orderInfo = $request->input('orderInfo', 'Thanh toán qua MoMo');
        $amount = $request->input('amount');

        $existingOrder = DonHang::query()->where('sach_id', $sach_id)
            ->where('user_id', auth()->user()->id)
            ->where('trang_thai', 'that_bai')
            ->first();

        $processingOrder = DonHang::query()
            ->where('sach_id', $sach_id)
            ->where('user_id', auth()->user()->id)
            ->where('trang_thai', 'dang_xu_ly')
            ->exists();

        $processingOrderCount = DonHang::query()
            ->where('user_id', $user_id)
            ->where('trang_thai', 'dang_xu_ly')
            ->get();

        if (count($processingOrderCount) > 3) {
            return redirect()->route('home')->with('error', 'Bạn đang có quá nhiều đơn hàng chưa thanh toán !');
        }

        if (!$amount || !$payment_method || !$orderInfo || !$sach_id) {
            return redirect()->route('home')->with('error', 'Thông tin thanh toán không hợp lệ.');
        }

        if ($processingOrder) {
            return redirect()->route('home')->with('error', 'Bạn đang có một giao dịch tương tự cần hoàn thành.');
        }

        //nếu có thì dùng lại đơn này
        if ($existingOrder) {
            $existingOrder->so_tien_thanh_toan = $amount;
            $existingOrder->phuong_thuc_thanh_toan_id = $payment_method;
            $existingOrder->mo_ta = $orderInfo;
            $existingOrder->trang_thai = 'dang_xu_ly';
            $existingOrder->expires_at = now()->addMinutes(15)->toDateTimeString();
            $existingOrder->save();

            $this->order = $existingOrder;
        } else { // không thì tạo đơn mới
            $donhangData = [
                'sach_id' => $sach_id,
                'user_id' => $user_id,
                'phuong_thuc_thanh_toan_id' => $payment_method,
                'ma_don_hang' => $orderId,
                'so_tien_thanh_toan' => $amount,
                'mo_ta' => $orderInfo,
                'trang_thai' => 'dang_xu_ly',
                'expires_at' => now()->addMinutes(15)->toDateTimeString(),
            ];
            $donhang = DonHang::query()->create($donhangData);
            $this->order = $donhang;
        }

//        $donhangData = [
//            'sach_id' => $sach_id,
//            'user_id' => $user_id,
//            'phuong_thuc_thanh_toan_id' => $payment_method,
//            'ma_don_hang' => $orderId,
//            'so_tien_thanh_toan' => $amount,
//            'mo_ta' => $orderInfo
//        ];
//        $donhang = DonHang::query()->create($donhangData);


        $redirectUrl = $request->input('redirectUrl', route('momo.handle'));
        $ipnUrl = $request->input('ipnUrl', route('momo.handle'));
        $extraData = json_encode(['don_hang_id' => $this->order->id, 'email' => $user_buying->email]);
        $requestId = time() . "";
        $requestType = "payWithATM";
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            'storeId' => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        ];

        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
        ])->post($endpoint, $data);

        $jsonResult = $response->json();

        if (isset($jsonResult['payUrl'])) {
            $this->order->payment_link = $jsonResult['payUrl'];
            $this->order->save();
            return redirect()->away($jsonResult['payUrl']);
        } else {
            return response()->json(['error' => 'Có lỗi xảy ra trong quá trình thanh toán.'], 400);
        }
    }

    public function paymentHandle(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = json_decode($request->extraData);
        $don_hang = DonHang::with('sach', 'user')->where('id', '=', $data->don_hang_id)->first();
        if ($don_hang->trang_thai == 'thanh_cong') {
            return redirect()->route('home')->with(['success' => 'Chúc mừng bạn đã mua hàng thành công!']);
        }

        if ($request->resultCode === '0') {
            $don_hang->trang_thai = 'thanh_cong';
            $don_hang->payment_link = null;
            $don_hang->save();
            $amount = $don_hang->so_tien_thanh_toan;
            $book = $don_hang->sach;
            $bookOwner = $book->user;
            $rose = 0;
            $roseForAdmin = 0;

            $admin = User::whereHas('vai_tros', function ($query) {
                $query->where('vai_tro_id', VaiTro::ADMIN_ROLE_ID);
            })->first();

            //lấy ra phần trăm hoa hồng của chủ cuốn sách vd: 0.7, v.v
            $commissionRate = $bookOwner->getCommissionRate();

            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                // Cộng tác viên: Tính tiền theo tỷ lệ hoa hồng
                $rose = $amount * $commissionRate;

                // Phần còn lại thuộc về admin
                $roseForAdmin = $amount * (1 - $commissionRate);
            } elseif ($bookOwner->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                // Admin tự đăng sách, nhận toàn bộ số tiền
                $rose = $amount;
            }

            // Cập nhật số dư cho người đăng sách
            $bookOwner->so_du += $rose;
            $bookOwner->save();

            // Cập nhật số dư cho admin nếu có tiền thuộc về admin
            if ($roseForAdmin > 0) {
                $admin->so_du += $roseForAdmin;
                $admin->save();
            }

            //Lưu lại lịc sử, phần trăm hoa hồng cho coojg tac viiên tại thời điểm này:
            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                ContributorCommissionEarning::query()->create([
                    'user_id' => $bookOwner->id,
                    'id_don_hang' => $don_hang->id,
                    'commission_amount' => $rose,
                    'commission_rate' => $bookOwner->getCommissionRate(),
                    'admin_earnings' => $roseForAdmin,
                ]);
            }

            // Thông báo và gửi email
            $url = route('notificationDonHang', ['id' => $don_hang->id]);

            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                $noiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $don_hang->ma_don_hang . '".';
                $notification = ThongBao::create([
                    'user_id' => $bookOwner->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $noiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notification));

                SendRawEmailJob::dispatch(
                    $bookOwner->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $noiDung . ' Xem chi tiết tại đây: ' . $url
                );

                // Gửi thông báo và email cho admin về phần tiền nhận được
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($roseForAdmin, 0, ',', '.') . ' VND từ đơn hàng "' . $don_hang->ma_don_hang . '".';
                $adminNotification = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($adminNotification));

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );

            } elseif ($bookOwner->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                $adminNoiDung = 'Bạn đã nhận được ' . number_format($rose, 0, ',', '.') . ' VND từ đơn hàng "' . $don_hang->ma_don_hang . '".';
                $adminNotification = ThongBao::create([
                    'user_id' => $admin->id,
                    'tieu_de' => 'Bạn đã nhận được tiền từ một đơn hàng',
                    'noi_dung' => $adminNoiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($adminNotification));

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );
            }

            InvoiceEmailJob::dispatch($data->email, $don_hang);
            return redirect()->route('home')->with(['success' => 'Chúc mừng bạn đã mua hàng thành công!']);
        }
        else {
            $don_hang->payment_link = null;
            return redirect()->route('home')->with('error', 'Thanh toán thất bại');
        }

    }
}
