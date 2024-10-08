@extends('admin.layouts.app')
@section('start-point')
    Quản lý đơn hàng
@endsection
@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4 ">

                            <div class="card-body bg-light p-4 ribbon-box">
                                <div style="padding-left: 86%"
                                    class="ribbon-three {{ $donHang->trang_thai == 'thanh_cong'
                                        ? 'ribbon-three-success text-light'
                                        : ($donHang->trang_thai == 'dang_xu_ly'
                                            ? 'ribbon-three-warning text-light'
                                            : ($donHang->trang_thai == 'that_bai'
                                                ? 'ribbon-three-danger text-light'
                                                : 'ribbon-three-secondary text-light')) }}">
                                    <span style="font-size: 0.85em;">
                                        {{ $donHang->trang_thai == 'thanh_cong'
                                            ? 'Thành công'
                                            : ($donHang->trang_thai == 'dang_xu_ly'
                                                ? 'Đang xử lý'
                                                : ($donHang->trang_thai == 'that_bai'
                                                    ? 'Thất bại'
                                                    : 'Không xác định')) }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <span style="font-size: 1.2em; font-weight: bold;">Mã đơn hàng:</span>
                                            <span style="font-size: 1.2em; color: red;font-weight: bold;">12345</span>
                                        </div>

                                        <div style="font-size: 1.1em; margin-top: 10px;">Ngày tạo:
                                            {{ $donHang->created_at->format('d/m/Y H:i') }}</div>
                                    </div>


                                </div>
                            </div>
                        </div>





                    </div><!--end col-->
                    <div class="container ps-5 pe-5 ">
                        <div class="row">
                            <!-- Card cho thông tin sách và ảnh -->
                            <div class="col-md-8">
                                <div class="card mb-3 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <img src="{{ Storage::url($donHang->sach->anh_bia_sach) }}"
                                                            alt="Ảnh Sản Phẩm" class="img-fluid"
                                                            style="max-width: 100%; border-radius: 10px;">
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <h4 style="font-weight: bold;">Thông tin sản phẩm</h4>

                                                        <h4>{{ $donHang->sach->ten_sach }}</h4>
                                                        <p style="font-size: 15px;">Tác giả: <span
                                                                style="color: #007bff;">{{ $donHang->sach->tac_gia }}</span>
                                                        </p>

                                                        <p class="no-dots" style="font-size: 15px;">Ngày xuất bản:
                                                            {{ $donHang->sach->created_at->format('d/m/Y') }}</p>
                                                        <p class="no-dots" style="font-size: 15px;">Thể loại: <span
                                                                style="padding: 5px; border-radius: 5px; border: 1px solid #6c6c6c;">{{ $donHang->sach->theLoai->ten_the_loai }}</span>

                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Tình trạng:
                                                            @if ($donHang->sach->tinh_trang_cap_nhat === 'da_full')
                                                                Đã hoàn thành
                                                            @elseif ($donHang->sach->tinh_trang_cap_nhat === 'tiep_tuc_cap_nhat')
                                                                Tiếp tục cập nhật
                                                            @else
                                                                Không xác định
                                                            @endif
                                                        </p>
                                                        <hr style="">
                                                        <p style="font-size: 15px; font-weight: bold;">Phương thức thanh
                                                            toán: <span
                                                                style="padding: 5px;">{{ $donHang->phuongThucThanhToan->ten_phuong_thuc }}</span>
                                                        </p>

                                                        <p style="font-size: 15px; font-weight: bold;">
                                                            Số tiền thanh toán: <span style="padding: 5px; color: red;">
                                                                {{ number_format($donHang->so_tien_thanh_toan, 0, ',', '.') }}
                                                                VNĐ
                                                            </span>
                                                        </p>


                                                        <style>
                                                            p.no-dots::before {
                                                                content: '•';
                                                                color: #28a745;
                                                                /* Màu xanh lá */
                                                                font-size: 20px;
                                                                /* Lớn hơn một chút so với chữ để nổi bật */
                                                                padding-right: 10px;
                                                                /* Khoảng cách giữa ba chấm và văn bản */
                                                                vertical-align: middle;
                                                                /* Căn chỉnh chấm sao cho phù hợp với đường base của text */
                                                            }
                                                        </style>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card cho thông tin khách hàng -->
                            <div class="col-md-4">
                                <div class="card mb-3 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h4 style=" font-weight: bold;">Thông tin khách hàng
                                                </h4>
                                                <div style="display: flex; align-items: center; margin-bottom: 20px">
                                                    <img src="{{ Storage::url($donHang->user->hinh_anh) }}" alt="Avatar" style="width: 40px; height: 40px; border-radius: 10%; margin-right: 10px; object-fit: cover;">
                                                    <p style="font-size: 15px; margin: 0;">
                                                        {{ $donHang->user->ten_doc_gia }}<br>
                                                        <span style="font-size: 80%; color: #66696b;">Khách hàng</span>
                                                    </p>
                                                </div>


                                                <p style="font-size: 15px;"><span
                                                        style="font-weight: bold; color: #0056b3;">Giới tính:</span><br>
                                                    {{ $donHang->user->gioi_tinh }}</p>
                                                <p style="font-size: 15px;"><span
                                                        style="font-weight: bold; color: #0056b3;">Địa chỉ:</span><br>
                                                    {{ $donHang->user->dia_chi }}</p>
                                                <p style="font-size: 15px;"><span
                                                        style="font-weight: bold; color: #0056b3;">Số điện thoại:</span><br>
                                                    {{ preg_replace('/(\d{3})(\d{3})(\d{4})/', "$1 $2 $3", $donHang->user->so_dien_thoai) }}
                                                </p>
                                                <p style="font-size: 15px;"><span
                                                        style="font-weight: bold; color: #0056b3;">Email:</span><br>
                                                    {{ $donHang->user->email }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                {{-- <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">STT</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col" class="text-end">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-list">
                                        <tr>
                                            <th scope="row">01</th>
                                            <td class="text-center">
                                                {{ $donHang->sach->ten_sach }}
                                            </td>
                                            <td>{{ $donHang->so_tien_thanh_toan }}</td>
                                            <td>01</td>
                                            <td class="text-end">{{ $donHang->so_tien_thanh_toan }}</td>
                                        </tr>

                                    </tbody>
                                </table><!--end table-->
                            </div>
                            <div class="border-top border-top-dashed mt-2">
                                <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                    style="width:250px">
                                    <tbody>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="text-end">$699.96</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax (12.5%)</td>
                                            <td class="text-end">$44.99</td>
                                        </tr>
                                        <tr>
                                            <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                            <td class="text-end">- $53.99</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge</td>
                                            <td class="text-end">$65.00</td>
                                        </tr>
                                        <tr class="border-top border-top-dashed fs-15">
                                            <th scope="row">Total Amount</th>
                                            <th class="text-end">$755.96</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>

                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-success"><i
                                        class="ri-printer-line align-bottom me-1"></i> Print</a>
                                <a href="javascript:void(0);" class="btn btn-primary"><i
                                        class="ri-download-2-line align-bottom me-1"></i> Download</a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div> --}}
            </div><!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/pages/invoicedetails.js') }}"></script>
@endpush
