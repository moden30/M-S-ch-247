@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Danh sách bình luận
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
        <!-- end col -->
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .comment-preview {
            position: relative;
            transition: background-color 0.3s ease;
        }

        .comment-detail {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1000;
            max-width: 300px;
            white-space: pre-wrap;
        }

        .comment-preview:hover {
            background-color: #f0f0f0;
        }

        .comment-preview:hover .comment-detail {
            display: block;
        }
    </style>
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
                name: "ID",
                width: "150px",
                formatter: function(e) {
                    let detailUrl = "{{ route('binh-luan.detail', ':id') }}".replace(':id', e[0]);

                    return gridjs.html(`
                        <span class="fw-semibold">${e[0]}</span>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem chi tiết</a> 
                        </div>
                    `);
                }
            }, {
                name: "Độc giả",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Bài viết",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Nội dung bình luận",
                width: "220px",
                formatter: function(e) {
                    return gridjs.html(`
                <div class="comment-preview" style="position: relative;">
                    <textarea cols="35" rows="3" class="form-control" readonly>${e}</textarea>
                    <div class="comment-detail">
                        <p>${e}</p>
                    </div>
                </div>
            `);
                }
            }, {
                name: "Ngày bình luận",
                width: "120px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                @foreach ($binhLuans as $binhLuan)
                    [
                        '{{ $binhLuan->id }}',
                        '{{ $binhLuan->user_id }}',
                        '{{ $binhLuan->bai_viet_id }}',
                        '{{ $binhLuan->noi_dung }}',
                        '{{ $binhLuan->ngay_binh_luan }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush
