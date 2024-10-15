@extends('admin.layouts.app')
@section('start-point')
    Quản lý bài viết
@endsection
@section('title')
    Chi tiết bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Bài viết: {{ $baiViet->tieu_de }}</h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">
                        Ngày đăng: {{ $baiViet->ngay_dang->format('d/m/Y') }} |
                        Tác giả: {{ $baiViet->tacGia->ten_doc_gia }} |
                        Trạng thái: {{ $trang_thai[$baiViet->trang_thai] }}
                    </p>
                    <div class="mx-n3">
                        <div data-simplebar class="px-3">
                            <p>{!! $baiViet->noi_dung !!}</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <!-- Hiển thị bình luận -->
                    <div class="mt-5">
                        <h5 class="mb-4">Bình luận</h5>
                        <ul class="list-unstyled">
                            @foreach ($baiViet->binhLuans as $binhLuan)
                                <li class="media mb-4 p-3" style="border-bottom: 1px solid #eee;">
                                    <!-- Hiển thị ảnh đại diện người dùng -->
                                    <img class="mr-3 rounded-circle shadow-sm"
                                        src="{{ $binhLuan->user->hinh_anh ? asset('storage/' . $binhLuan->user->hinh_anh) : asset('assets/admin/images/default-avatar.png') }}"
                                        alt="{{ $binhLuan->user->ten_doc_gia }}" width="50" height="50">

                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1 font-weight-bold">{{ $binhLuan->user->ten_doc_gia }}
                                            <small class="text-muted ml-2">•
                                                {{ $binhLuan->created_at->diffForHumans() }}</small>
                                        </h6>
                                        <p class="text-muted">{{ $binhLuan->noi_dung }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- end card-body -->
            </div><!-- end card -->
            <button class="btn btn-warning" onclick="window.history.back()">Quay lại</button>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Thêm CSS cho giao diện bình luận -->
    <style>
        .media img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .media-body {
            margin-left: 15px;
        }

        .media {
            display: flex;
            align-items: flex-start;
            background-color: #f9f9f9;
        }

        .media h6 {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .media p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }

        .media small {
            color: #777;
        }

        /* Giao diện responsive */
        @media (max-width: 768px) {
            .media img {
                width: 40px;
                height: 40px;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- ecommerce product details init -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-details.init.js') }}"></script>
@endpush
