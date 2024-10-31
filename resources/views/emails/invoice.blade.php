<x-mail::message>
    # Cảm ơn bạn đã mua sách!

    Dưới đây là thông tin chi tiết đơn hàng của bạn:

    **Mã đơn hàng:** {{ $order->ma_don_hang }}

    **Ngày mua:** {{ $order->created_at->format('d/m/Y') }}

    ## Thông tin sách:
        - **Tên sách:** {{ $order->sach->ten_sach }}
        - **Giá tiền:** {{ number_format((!is_null($order->sach->gia_khuyen_mai) ? $order->sach->gia_khuyen_mai : $order->sach->gia_goc), 0, ',', '.') }} VNĐ

    ## Tổng tiền:
    **{{ number_format($order->so_tien_thanh_toan, 0, ',', '.') }}** VNĐ

    <x-mail::button :url="''">
        Xem chi tiết đơn hàng
    </x-mail::button>

    Cảm ơn bạn đã mua sách tại {{ config('app.name') }}!

    Xin cảm ơn,
    {{ config('app.name') }}
</x-mail::message>
