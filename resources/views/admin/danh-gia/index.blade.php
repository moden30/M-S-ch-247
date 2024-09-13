@extends('admin.layouts.app')
@section('start-point')
    Quản lý đánh giá
@endsection
@section('title')
    Danh sách đánh giá
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <img src="{{ asset('assets/admin/images/about.jpg') }}" alt="">
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
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
                <!-- end col -->
            </div>
        </div>
        <!-- end col -->        </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
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
            }, {name: "Độc giả", width: "150px",
                formatter: function (e) {
                    return gridjs.html(`
                     <div class="d-flex gap-2 align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                        </div>
                        <div class="flex-grow-1">
                            ${e}
                        </div>
                    </div>
                    <div class="d-flex justify-content-start mt-2">
                        <a href="{{ route('danh-gia.detail') }}" class="btn btn-link p-0">Chi tiết |</a>
                        <a href="{{ route('danh-gia.detail') }}" class="btn btn-link p-0">Phản hồi </a>
                    </div>
                `);
                }
            }, {
                name: "Nội dung bình luận", width: "220px",
                formatter: function (e) {
                    return gridjs.html(`
                     <textarea name="" id="" cols="35" rows="3" class="form-control" readonly >${e}</textarea>
                `);
                }
            }, {name: "Ảnh",
                width: "100px",
                formatter: function (e) {
                    return gridjs.html(`<img src="{{ asset('${e}') }}" alt="" width="50px">`)
                }
            }, {name: "Số sao", width: "180px",
                formatter: function (e) {
                    return gridjs.html(`
                      <div class="fs-16 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-half-fill"></i>
                                                                </div>
                `);
                }

            }, {
                name: "Country",
                width: "180px",
                formatter: function (e) {
                    return gridjs.html('<span class="badge bg-success-subtle text-success">' + e + "</span>")
                }
            },],
            pagination: {limit: 10},
            sort: !0,
            search: !0,
            data: [["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck AInc", "Holy See"],
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
