<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\DonHang;

class ZalopayController extends Controller
{
    public function createPayment(Request $request)
    {
        // Cấu hình API của ZaloPay
        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        // Dữ liệu embed và item của merchant
        $embeddata = '{"redirecturl": "http://localhost:8000/callback"}'; // Merchant's data
        $items = '[]'; // Merchant's data

        // Random transaction ID
        $transID = rand(0, 1000000);

        $sach_id = $request->input('sach_id', null);
        $user_id = $request->input('user_id', null);
        $user_buying = User::query()->find($user_id);
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
        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000), // Thời gian tính bằng milliseconds
            "app_trans_id" => date("ymd") . "_" . $transID, // ID giao dịch
            "app_user" => "user123", // Tài khoản người dùng
            "item" => $items, // Các mặt hàng
            "embed_data" => $embeddata, // Dữ liệu nhúng
            "amount" => $donhang->so_tien_thanh_toan, // Số tiền
            "description" => "Lazada - Payment for the order #$transID", // Mô tả
            "bank_code" => "zalopayapp", // Mã ngân hàng (zalopayapp)
            "callback_url" => "http://localhost:8000/callback"
        ];

        // Tạo mã băm (MAC) từ dữ liệu
        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

        // Gửi yêu cầu HTTP POST đến ZaloPay API
        $response = Http::asForm()->post($config["endpoint"], $order);

        // Xử lý kết quả trả về từ API
        $result = $response->json();

        // Kiểm tra nếu có lỗi
        if ($response->failed()) {
            return response()->json(['error' => 'Request failed'], 500);
        }

        if (isset($result['order_url'])) {
            return redirect($result['order_url']);
        }

        // Hiển thị kết quả trả về (tương tự như echo trong PHP thuần)
        return response()->json($result);
    }

    public function callBack(Request $request)
    {
        dd($request->all());
        if ($request->status === 1) {
            # code...
        }
        // $result = [];
        // try {
        //     $key2 = "eG4r0GcoNtRGbO8";
        //     $postdata = $request->getContent(); // Lấy dữ liệu raw từ request
        //     $postdatajson = json_decode($postdata, true);

        //     // Tạo MAC để xác minh tính hợp lệ của callback
        //     $mac = hash_hmac("sha256", $postdatajson["data"], $key2);
        //     $requestmac = $postdatajson["mac"];

        //     // Kiểm tra nếu MAC hợp lệ
        //     if (strcmp($mac, $requestmac) != 0) {
        //         // Callback không hợp lệ
        //         $result["return_code"] = -1;
        //         $result["return_message"] = "mac not equal";
        //     } else {
        //         // Thanh toán thành công
        //         $datajson = json_decode($postdatajson["data"], true);
        //         // Cập nhật trạng thái đơn hàng
        //         // Ví dụ: Order::where('app_trans_id', $datajson['app_trans_id'])->update(['status' => 'success']);

        //         // Lưu log để kiểm tra quá trình xử lý
        //         Log::info("Update order's status = success where app_trans_id = " . $datajson["app_trans_id"]);

        //         $result["return_code"] = 1;
        //         $result["return_message"] = "success";
        //     }
        // } catch (Exception $e) {
        //     // Trong trường hợp lỗi, ZaloPay sẽ callback lại (tối đa 3 lần)
        //     $result["return_code"] = 0;
        //     $result["return_message"] = $e->getMessage();

        //     // Lưu log lỗi để tiện theo dõi và debug
        //     Log::error('ZaloPay callback error: ' . $e->getMessage());
        // }

        // // Trả kết quả về cho ZaloPay server
        // return response()->json($result);
    }
}
