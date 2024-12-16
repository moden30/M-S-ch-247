<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Random\RandomException;

class VnPayController extends Controller
{
    /**
     * @throws RandomException
     */
    public function createPayment(Request $request): \Illuminate\Http\RedirectResponse
    {
//        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TmnCode = "6900EP55"; // Mã TmnCode của bạn
        $vnp_HashSecret = "2OG9FVAWF5R2RMV8QYUEK1IROBNOE3TQ"; // Mã HashSecret của bạn
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('payment.vnpay.callback'); // URL trả về

        $startTime = now()->format('YmdHis');
        $expire = now()->addMinutes(15)->format('YmdHis');

        $vnp_TxnRef = random_int(1, 10000);
        $vnp_Amount = $request->input('amount', 10000);
        $vnp_Locale = $request->input('language', 'vn');
        $vnp_BankCode = $request->input('bankCode', 'SAHDAWW');
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $startTime,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD: $vnp_TxnRef",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        ];

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData); // Sắp xếp tham số theo thứ tự từ điển

        $hashdata = urldecode(http_build_query($inputData)); // Không dùng urldecode
        $query = http_build_query($inputData);

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); // Tạo chữ ký
        $query .= '&vnp_SecureHash=' . $vnpSecureHash;

        $paymentUrl = $vnp_Url . '?' . $query;

        return redirect()->away($paymentUrl);
    }

}
