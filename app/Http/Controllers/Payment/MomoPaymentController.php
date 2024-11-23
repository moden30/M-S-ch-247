<?php

namespace App\Http\Controllers\Payment;

use App\Events\MessageSent;
use App\Events\NotificationSent;
use App\Jobs\InvoiceEmailJob;
use App\Jobs\SendRawEmailJob;
use App\Mail\InvoiceMail;
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
    public function createPayment(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = $request->input('partnerCode', 'MOMOBKUN20180529');
        $accessKey = $request->input('accessKey', 'klm05TvNBzhg7h7j');
        $secretKey = $request->input('secretKey', 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa');

        //Thông tin gửi vào to server
        $sach_id = $request->input('sach_id', null);
        $user_id = $request->input('user_id', null);
        $user_buying = User::query()->find($user_id);

        $payment_method = $request->input('payment_method', '');
        $orderId = $request->input('orderId', time() . "");
        $orderInfo = $request->input('orderInfo', 'Thanh toán qua MoMo');
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


        $redirectUrl = $request->input('redirectUrl', route('momo.handle'));
        $ipnUrl = $request->input('ipnUrl', route('momo.handle'));
        $extraData = json_encode(['don_hang_id' => $donhang->id, 'email' => $user_buying->email]);
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
            $don_hang->save();

            $amount = $request->query('amount', 0);
            $book = $don_hang->sach;
            $bookOwner = $book->user;
            $rose = 0;
            $roseForAdmin = 0;

            $admin = User::whereHas('vai_tros', function ($query) {
                $query->where('vai_tro_id', VaiTro::ADMIN_ROLE_ID);
            })->first();

            if ($bookOwner->hasRole(VaiTro::CONTRIBUTOR_ROLE_ID)) {
                $rose = $amount * 0.6;
                $roseForAdmin = $amount * 0.4;
            } elseif ($bookOwner->hasRole(VaiTro::ADMIN_ROLE_ID)) {
                $rose = $amount;
            }

            // Cập nhật số dư cho người đăng sách và admin
            $bookOwner->so_du += $rose;
            $bookOwner->save();

            if ($roseForAdmin > 0) {
                $admin->so_du += $roseForAdmin;
                $admin->save();
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

//                Mail::raw($noiDung . ' Xem chi tiết tại đây: ' . $url, function ($message) use ($bookOwner) {
//                    $message->to($bookOwner->email)
//                        ->subject('Thông báo nhận tiền từ đơn hàng');
//                });

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

//                Mail::raw($adminNoiDung . ' Xem chi tiết tại đây: ' . $url, function ($message) use ($admin) {
//                    $message->to($admin->email)
//                        ->subject('Thông báo nhận tiền từ đơn hàng');
//                });
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

//                Mail::raw($adminNoiDung . ' Xem chi tiết tại đây: ' . $url, function ($message) use ($admin) {
//                    $message->to($admin->email)
//                        ->subject('Thông báo nhận tiền từ đơn hàng');
//                });

                SendRawEmailJob::dispatch(
                    $admin->email,
                    'Thông báo nhận tiền từ đơn hàng',
                    $adminNoiDung . ' Xem chi tiết tại đây: ' . $url
                );
            }
//            Mail::to($data->email)->send(new InvoiceMail($don_hang));
            InvoiceEmailJob::dispatch($data->email, $don_hang);
            return redirect()->route('home')->with(['success' => 'Chúc mừng bạn đã mua hàng thành công!']);
        }
        return redirect()->route('home')->with('error', 'Thanh toán thất bại');
    }
}
