@extends('admin.layouts.app')
@section('start-point')
    Quản lý yêu cầu
@endsection
@section('title')
    Chi tiết yêu cầu
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
                                    class="ribbon-three {{ $chiTietYeuCau->trang_thai == 'da_duyet'
                                        ? 'ribbon-three-success text-light'
                                        : ($chiTietYeuCau->trang_thai == 'dang_xu_ly'
                                            ? 'ribbon-three-warning text-light'
                                            : ($chiTietYeuCau->trang_thai == 'da_huy'
                                                ? 'ribbon-three-danger text-light'
                                                : 'ribbon-three-secondary text-light')) }}">
                                    <span style="font-size: 0.85em;">
                                        {{ $chiTietYeuCau->trang_thai == 'da_duyet'
                                            ? 'Thành công'
                                            : ($chiTietYeuCau->trang_thai == 'dang_xu_ly'
                                                ? 'Đang xử lý'
                                                : ($chiTietYeuCau->trang_thai == 'da_huy'
                                                    ? 'Thất bại'
                                                    : 'Không xác định')) }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <span style="font-size: 1.2em; font-weight: bold;">Mã yêu cầu: </span>
                                            <span style="font-size: 1.2em; color: red;font-weight: bold;">
                                                {{ $chiTietYeuCau->ma_yeu_cau }}</span>
                                        </div>

                                        <div style="font-size: 1.1em; margin-top: 10px;">Ngày tạo:
                                            {{ $chiTietYeuCau->created_at->format('d/m/Y') }}</div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div><!--end col-->
                    <div class="container ps-5 pe-5 ">
                        <div class="row">
                            <!-- Card cho thông tin sách và ảnh -->
                            <div class="col-md-9">
                                <div class="card mb-3 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        @if ($chiTietYeuCau->anh_qr)
                                                            <img src="{{ $chiTietYeuCau->anh_qr }}" alt="Ảnh QR"
                                                                class="img-fluid"
                                                                style="max-width: 100%; border-radius: 10px;">
                                                        @else
                                                            <div>TẠM THỜI CHƯA CÓ ẢNH QR ☹️☹️☹️</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <h4 style="font-weight: bold;">Chi tiết yêu cầu</h4>

                                                        <p class="mt-4" style="font-size: 15px;">Người rút: <span
                                                                style="color: #007bff;"><a
                                                                    href="{{ route('chi-tiet-ctv', $chiTietYeuCau->user->id) }}">{{ $chiTietYeuCau->user->ten_doc_gia }}</a></span>
                                                        </p>

                                                        <p class="no-dots" style="font-size: 15px;">Email:
                                                            {{ $chiTietYeuCau->user->email }}</p>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Số tiền:
                                                            {{ number_format($chiTietYeuCau->so_tien, 0, ',', '.') }} ₫
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Tên ngân hàng:
                                                            {{ $chiTietYeuCau->ten_ngan_hang }}</p>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Số tài khoản:
                                                            {{ $chiTietYeuCau->so_tai_khoan }}</p>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Tên tài khoản:
                                                            {{ $chiTietYeuCau->ten_chu_tai_khoan }}</p>
                                                        </p>

                                                        <hr>

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

                            <div class="col-md-3">
                                <div class="card mb-3 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h4 style=" font-weight: bold;">Ghi chú
                                                </h4>
                                                <p class="" style="font-size: 15px;">
                                                    @if ($chiTietYeuCau->ghi_chu)
                                                        {{ $chiTietYeuCau->ghi_chu }}
                                                    @elseif ($chiTietYeuCau->ghi_chu == '' || $chiTietYeuCau->ghi_chu == null)
                                                        Không có ghi chú gì thêm 😘😘😘
                                                    @endif

                                                </p>
                                                </p>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
