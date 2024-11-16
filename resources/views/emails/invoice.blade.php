@php use Illuminate\Support\Facades\Storage; @endphp
{{--<x-mail::message>--}}
{{--    # Cảm ơn bạn đã mua sách!--}}

{{--    Dưới đây là thông tin chi tiết đơn hàng của bạn:--}}

{{--    **Mã đơn hàng:** {{ $order->ma_don_hang }}--}}

{{--    **Ngày mua:** {{ $order->created_at->format('d/m/Y') }}--}}

{{--    ## Thông tin sách:--}}
{{--        - **Tên sách:** {{ $order->sach->ten_sach }}--}}
{{--        - **Giá tiền:** {{ number_format((!is_null($order->sach->gia_khuyen_mai) ? $order->sach->gia_khuyen_mai : $order->sach->gia_goc), 0, ',', '.') }} VNĐ--}}

{{--    ## Tổng tiền:--}}
{{--    **{{ number_format($order->so_tien_thanh_toan, 0, ',', '.') }}** VNĐ--}}

{{--    <x-mail::button :url="''">--}}
{{--        Xem chi tiết đơn hàng--}}
{{--    </x-mail::button>--}}

{{--    Cảm ơn bạn đã mua sách tại {{ config('app.name') }}!--}}

{{--    Xin cảm ơn,--}}
{{--    {{ config('app.name') }}--}}
{{--</x-mail::message>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
            background-color: #f9f9f9;
        }

        .invoice-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2%;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 1%;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #007bff;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .book-info, .total {
            margin: 20px 0;
        }

        .book-info img {
            max-width: 100px;
            margin-right: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .book-details {
            display: flex;
            align-items: center;
        }

        .book-details div {
            flex: 1;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        .button-container a {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 1%;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <div class="header">
        <h1>Cảm ơn bạn đã mua sách!</h1>
    </div>
    <div class="content">
        <h2>Thông tin đơn hàng</h2>

        <div class="book-info">
            <div class="book-details">
{{--                <img src="{{$base64Image}}" alt="Ảnh bìa sách">--}}
                <div>
                    <p><strong>Mã đơn hàng:</strong> {{ $order->ma_don_hang }}</p>
                    <p><strong>Ngày mua:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                    <p><strong>Tên sách:</strong> {{ $order->sach->ten_sach }}</p>
                    <p><strong>Giá gốc:</strong>
                        {{ number_format($order->sach->gia_goc, 0, ',', '.') }} VNĐ
                    </p>
                    <p><strong>Giá khuyến mãi:</strong>
                        @if($order->sach->gia_khuyen_mai !== 0)
                            {{ number_format($order->sach->gia_khuyen_mai, 0, ',', '.') }} VNĐ
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="total">
            <p><strong>Tổng tiền:</strong> {{ number_format($order->so_tien_thanh_toan, 0, ',', '.') }} VNĐ</p>
        </div>

        <div class="button-container">
            <a href="#">Xem chi tiết đơn hàng</a>
        </div>
    </div>
    <div class="footer">
        <p>Cảm ơn bạn đã mua sách tại {{ config('app.name') }}!</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Tất cả quyền được bảo lưu.</p>
    </div>
</div>
</body>
</html>
