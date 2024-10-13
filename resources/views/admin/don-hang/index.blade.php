@extends('admin.layouts.app')
@section('start-point')
    Quản lý đơn hàng
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card cho tổng doanh thu tuần này -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">TỔNG DOANH THU TUẦN NÀY</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5
                                class="{{ $tongDoanhThuTuanNay < $tongDoanhThuTuanTruoc ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                <i
                                    class="{{ $tongDoanhThuTuanNay < $tongDoanhThuTuanTruoc ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                @if ($tongDoanhThuTuanTruoc > 0)
                                    {{ $tongDoanhThuTuanNay < $tongDoanhThuTuanTruoc ? '-' : '+' }}
                                    {{ abs((($tongDoanhThuTuanNay - $tongDoanhThuTuanTruoc) / $tongDoanhThuTuanTruoc) * 100) }}
                                    %
                                @else
                                    {{ $tongDoanhThuTuanNay > 0 ? '+ 100' : '0' }} %
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $tongDoanhThuTuanNay }}">0</span> VNĐ
                            </h4>
                            <span class="badge bg-warning me-1">{{ number_format($tongDoanhThuTuanNay, 0, ',', '.') }}
                                VNĐ</span>
                            <span class="text-muted">Được thanh toán bởi khách hàng</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="check-square" class="text-success icon-dual-success"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN HÀNG THÀNH CÔNG TUẦN NÀY</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="{{ $phanTram < 0 ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                <i
                                    class="{{ $phanTram < 0 ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                {{ $phanTram < 0 ? '-' : '+' }} {{ abs($phanTram) }} %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $tongDonHangTuanNay }}">0</span> đơn hàng
                            </h4>
                            <span class="badge bg-warning me-1">{{ $tongDonHangTuanNay }}</span>
                            <span class="text-muted">Tổng số đơn hàng tuần này</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="file-text" class="text-success icon-dual-success"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        {{--    Hóa đơn chưa thanh toán    --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN CHƯA THANH TOÁN</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5
                                class="{{ $hoaDonTuanNay < $hoaDonTuanTruoc ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                <i
                                    class="{{ $hoaDonTuanNay < $hoaDonTuanTruoc ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                @if ($hoaDonTuanTruoc > 0)
                                    {{ $hoaDonTuanNay < $hoaDonTuanTruoc ? '-' : '+' }}
                                    {{ abs((($hoaDonTuanNay - $hoaDonTuanTruoc) / $hoaDonTuanTruoc) * 100) }} %
                                @else
                                    {{ $hoaDonTuanNay > 0 ? '+ 100' : '0' }} %
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $hoaDonTuanNay }}"></span> Đơn hàng
                            </h4>
                            <span class="badge bg-warning me-1">{{ $hoaDonTuanNay }}</span>
                            <span class="text-muted">Đơn chưa thanh toán bởi khách hàng</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="clock" class="text-success icon-dual-success"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        {{--    Đơn đã hủy    --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">ĐƠN ĐÃ HỦY</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="{{ $hoaDonHuyTN < $hoaDonHuyTC ? 'text-danger' : 'text-success' }} fs-14 mb-0">
                                <i
                                    class="{{ $hoaDonHuyTN < $hoaDonHuyTC ? 'ri-arrow-right-down-line' : 'ri-arrow-right-up-line' }} fs-13 align-middle"></i>
                                @if ($hoaDonHuyTC > 0)
                                    {{ $hoaDonHuyTN < $hoaDonHuyTC ? '-' : '+' }}
                                    {{ abs((($hoaDonHuyTN - $hoaDonHuyTC) / $hoaDonHuyTC) * 100) }} %
                                @else
                                    {{ $hoaDonHuyTN > 0 ? '+ 100' : '0' }} %
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                <span class="counter-value" data-target="{{ $hoaDonHuyTN }}"></span> Đơn
                            </h4>
                            <span class="badge bg-warning me-1">{{ $hoaDonHuyTN }}</span>
                            <span class="text-muted"> Đơn đã bị hủy bởi khách hàng</span>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded fs-3">
                                <i data-feather="x-octagon" class="text-success icon-dual-success"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('styles')
    <!-- Sweet Alert css-->
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush

@push('scripts')
    <!-- list.js min js -->
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>

    <!--list pagination js-->
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>



    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                    name: "STT",
                    hidden: true,

                }, {
                    name: "Mã đơn",
                    width: "auto",
                    formatter: function(e, row) {
                        const id = row.cells[0].data;
                        const detailUrl = "{{ route('don-hang.detail', ':id') }}".replace(':id', id);

                        return gridjs.html(`
                        <div class="flex-grow-1">
                            <span class="fw-semibold">  ${e}</span>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                        </div>
                    `);
                    }
                }, {
                    name: "Họ và tên",
                    width: "auto",

                },
                {
                    name: "Email",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Sách",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Số tiền",
                    width: "auto",
                    formatter: function(e) {
                        const formattedPrice = Number(e).toLocaleString('vi-VN', {
                            style: 'decimal',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        });
                        return gridjs.html('<span>' + formattedPrice + ' VNĐ</span>');
                    }
                },
                {
                    name: "Phương thức",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function(e) {
                        let colorClass = '';
                        let xuLy = '';
                        let style = "";
                        switch (e) {
                            case 'thanh_cong':
                                colorClass = 'fs-6';
                                style =
                                    "background-color: green; border: 1px solid green; padding: 5px 5px; border-radius: 4px; color:white;";
                                xuLy = 'Thành công';
                                break;
                            case 'dang_xu_ly':
                                colorClass = 'fs-6';
                                style =
                                    "background-color: #ffa500; color: white; border: 1px solid yellow; padding: 5px 5px; border-radius: 4px;";
                                xuLy = 'Đang xử lí';
                                break;
                            case 'that_bai':
                                colorClass = 'fs-6';
                                style =
                                    "background-color: red; color: white; border: 1px solid red; padding: 5px 5px; border-radius: 4px;";
                                xuLy = 'Thất bại';
                                break;
                            default:
                                colorClass = 'bg-secondary text-white fs-6';
                        }
                        return gridjs.html(
                            `<span class="badge ${colorClass}" style="${style}">${xuLy}</span>`
                        );
                        return gridjs.html('<a href="">' + e + "</a>")
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                @foreach ($listDonHang as $donHang)
                    [
                        '{{ $donHang->id }}',
                        '{{ $donHang->ma_don_hang }}',
                        '{{ $donHang->user->ten_doc_gia }}',
                        '{{ $donHang->user->email }}',
                        '{{ $donHang->sach->ten_sach }}',
                        '{{ $donHang->so_tien_thanh_toan }}',
                        '{{ $donHang->phuongThucThanhToan->ten_phuong_thuc }}',
                        '{{ $donHang->trang_thai }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush
