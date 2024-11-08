<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\ThongBao;
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
        if ($status == 1) {
            $orderid = $request->query('orderid', null);
            $order = DonHang::with('user')->find($orderid);
            $order->trang_thai = 'thanh_cong';
            $order->save();
            $adminUsers = User::whereHas('vai_tros', function ($query) {
                $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
            })->get();
            $url = route('notificationDonHang', ['id' => $order->id]);
            foreach ($adminUsers as $adminUser) {
                ThongBao::create([
                    'user_id' => $adminUser->id,
                    'tieu_de' => 'Có một đơn hàng mới',
                    'noi_dung' => 'Đơn hàng của "' . $order->user->ten_doc_gia . '" đã được đặt thành công.',
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'chung',
                ]);
            }
            Mail::to($order->user->email)->queue(new InvoiceMail($order));
            return redirect()->route('home')->with('success', 'Bạn đã mua hàng thành công !');
        }
        return redirect()->route('home')->with('error', 'Đơn hàng bị hủy');
    }
}























