<?php

namespace App\Http\Controllers\Payment;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
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
        $sach_id = $request->input('sach_id', 0);
        $user_id = $request->input('user_id', 0);
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
            'trang_thai' => 'dang_xu_ly',
            'mo_ta' => $orderInfo
        ];
        $donhang = DonHang::query()->create($donhangData);


        $redirectUrl = $request->input('redirectUrl', route('momo.handle'));
        $ipnUrl = $request->input('ipnUrl', route('momo.handle'));
        $extraData = json_encode(['don_hang_id' => $donhang->id]);
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

        $response = Http::withHeaders([
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
        $don_hang = DonHang::query()->findOrFail($data->don_hang_id);
        if ($request->resultCode === '0'){
            $don_hang->trang_thai = 'thanh_cong';
            $don_hang->save();
            return redirect()->route('home')->with('success', $request->message);
        }
        else if ($request->resultCode === '1005'){
            $don_hang->trang_thai = 'that_bai';
            $don_hang->save();
            return redirect()->route('home')->with('error', $request->message);
        }
        return redirect()->route('home')->with('error', $request->message);
    }
}
