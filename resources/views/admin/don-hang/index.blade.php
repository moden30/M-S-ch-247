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
                            <p class="text-uppercase fw-medium text-muted mb-0">Invoices Sent</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +89.24 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="559.25">0</span>k</h4>
                            <span class="badge bg-warning me-1">2,258</span> <span class="text-muted">Invoices sent</span>
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
                            <p class="text-uppercase fw-medium text-muted mb-0">Paid Invoices</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +8.09 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="409.66">0</span>k</h4>
                            <span class="badge bg-warning me-1">1,958</span> <span class="text-muted">Paid by clients</span>
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
                            <p class="text-uppercase fw-medium text-muted mb-0">Unpaid Invoices</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-danger fs-14 mb-0">
                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> +9.01 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="136.98">0</span>k</h4>
                            <span class="badge bg-warning me-1">338</span> <span class="text-muted">Unpaid by clients</span>
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
                            <p class="text-uppercase fw-medium text-muted mb-0">Cancelled Invoices</p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +7.55 %
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="84.20">0</span>k</h4>
                            <span class="badge bg-warning me-1">502</span> <span class="text-muted">Cancelled by clients</span>
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
                name: "ID", width: "80px", formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {name: "Họ và tên", width: "150px",
                formatter: function (e) {
                    return gridjs.html(` ${e}
                    <div class="d-flex justify-content-start mt-2">
                        <a href="{{ route('banner.edit') }}" class="btn btn-link p-0">Sửa |</a>
                        <a href="{{ route('banner.detail') }}" class="btn btn-link p-0">Xem |</a>
                        <a href="#" class="btn btn-link p-0 text-danger">Xóa</a>
                    </div>
                `);
                }
            }, {
                name: "Email", width: "220px", formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>")
                }
            }, {name: "Ảnh",
                width: "100px",
                formatter: function (e) {
                    return gridjs.html(`<img src="{{ asset('${e}') }}" alt="" width="50px">`)
                }
            }, {name: "Company", width: "180px"}, {
                name: "Country",
                width: "180px",
                formatter: function (e) {
                    return gridjs.html('<span class="badge bg-success-subtle text-success">' + e + "</span>")
                }
            },],
            pagination: {limit: 10},
            sort: !0,
            search: !0,
            data: [["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],

            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush
