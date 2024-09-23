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
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">HÓA ĐƠN ĐÃ GỬI</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                    data-target="559.25">0</span>k</h4>
                            <span class="badge bg-warning me-1">2,258</span> <span class="text-muted">HÓA ĐƠN ĐÃ GỬI</span>
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

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">HÓA ĐƠN ĐÃ THANH TOÁN</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +8.09 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                    data-target="409.66">0</span>k</h4>
                            <span class="badge bg-warning me-1">1,958</span> <span class="text-muted">Được thanh toán bởi khách hàng</span>
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
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">HÓA ĐƠN CHƯA THANH TOÁN</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +9.01 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                    data-target="136.98">0</span>k</h4>
                            <span class="badge bg-warning me-1">338</span> <span class="text-muted">Chưa thanh toán bởi khách hàng</span>
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

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0">HÓA ĐƠN ĐÃ HỦY</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +7.55 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                    data-target="84.20">0</span>k</h4>
                            <span class="badge bg-warning me-1">502</span> <span class="text-muted"> Đã bị hủy bởi khách hàng</span>
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
                    name: "Họ và tên",
                    width: "auto",
                formatter: function(e, row) {
                    const id = row.cells[0].data; // Lấy ID từ cột đầu tiên
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
                        return gridjs.html('<a >' + e + "</a>")
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
                        switch (e) {
                            case 'thanh_cong':
                                colorClass = 'bg-success text-white fs-6';
                                xuLy = 'Thành Công';
                                break;
                            case 'dang_xu_ly':
                                colorClass = 'bg-primary  text-white fs-6';
                                xuLy = 'Đang xử lí';
                                break;
                            case 'that_bai':
                                colorClass = 'bg-danger text-white fs-6';
                                xuLy = 'Thất bại';
                                break;
                            default:
                                colorClass = 'bg-secondary text-white fs-6';
                        }
                        return gridjs.html(
                            `<span class="badge ${colorClass} ">${xuLy}</span>`
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
