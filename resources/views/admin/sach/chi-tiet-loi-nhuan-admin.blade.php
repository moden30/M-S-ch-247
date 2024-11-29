@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết : {{ $sach->ten_sach }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <div class="swiper-wrapper d-flex justify-content-center">
                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex">
                                            <h4 class="me-3">{{ $sach->ten_sach }}</h4>
                                        </div>
                                        <div class="row mb-3">
                                            <!-- First row -->
                                            <div class="col-md-4">
                                                <div class="text-muted">Tác giả :
                                                    <a href="" class="text-primary">{{ $sach->user->but_danh ? $sach->user->but_danh : $sach->user->ten_doc_gia }}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Thể loại :
                                                    <span class="text-body fw-medium">{{ $sach->TheLoai->ten_the_loai }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Ngày đăng :
                                                    <span class="text-body fw-medium">{{ \Carbon\Carbon::parse($sach->created_at)->format('d-m-Y') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <!-- Second row -->
                                            <div class="col-md-4">
                                                <div class="text-muted">Tổng lợi nhuận :
                                                    <span class="text-body fw-medium">{{ number_format($totalProfit, 0, ',', '.') }} VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Trạng thái :
                                                    <span class="fs-5 {{ $sach->trang_thai === 'an' ? 'text-danger' : 'text-success' }}">
                                                        {{ $sach->trang_thai === 'an' ? 'Ẩn' : 'Hiện' }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Loại sách :
                                                    <span class="text-body fw-medium">{{ $sach->noi_dung_nguoi_lon === 'co' ? '18+' : '13+' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        @if (Auth::check() && Auth::user()->hasPermission('chuong-update') && Auth()->user()->id == $sach->user_id)
                                            <div>
                                                <a href="{{ route('sach.edit', $sach->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="d-flex row">
                                        <div class="col-lg-3">
                                            <h5 class="fs-14">Lịch sử mua :</h5>
                                        </div>
                                        <div class="col-lg-9">
                                            <form action="{{ route('sach.show', $sach->id) }}" method="GET" id="filterForm">

                                            </form>
                                            <script>
                                                document.getElementById('kiemDuyetSelect').addEventListener('change', function () {
                                                    document.getElementById('filterForm').submit();
                                                });

                                                document.getElementById('trangThaiSelect').addEventListener('change', function () {
                                                    document.getElementById('filterForm').submit();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="table-gridjs"></div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="mt-5">

                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <h5 class="fs-14 mb-3">Đánh giá </h5>
                                            </div>
                                            <div>
                                                @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                    <div class="mt-3">
                                                        <div class="row align-items-center g-2 d-flex">
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0">{{ $mucDoHaiLong[$mucDo]['label'] }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="p-2">
                                                                    <div class="progress animated-progress progress-sm w-100">
                                                                        @php
                                                                            $tongSoLuotDanhGia = \App\Models\DanhGia::where('sach_id', $id)->count();
                                                                            $count = count($danhGias);
                                                                            $tong = $tongSoLuotDanhGia > 0 ? ($count / $tongSoLuotDanhGia) * 100 : 0;
                                                                        @endphp
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format($tong, 2) }}%;" aria-valuenow="{{ number_format($tong, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0 text-muted">{{ $count }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>


                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">

                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                            @foreach($danhGias as $danhGia)
                                                                <li class="py-2">
                                                                    <div class="border border-dashed rounded p-3">
                                                                        <div class="d-flex align-items-end">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-0">{{ $danhGia['ten_nguoi_danh_gia'] }}</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted fs-13 mb-0">{{ \Carbon\Carbon::parse($danhGia['ngay_danh_gia'])->format('d-m-Y') }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="d-flex align-items-start mb-3">
                                                                            <div class="hstack gap-3">
                                                                                <div class="badge rounded-pill {{ $mucDoHaiLong[$mucDo]['colorClass'] }} mb-0">
                                                                                    <i class="mdi mdi-star"></i> {{ $mucDoHaiLong[$mucDo]['label'] }}
                                                                                </div>
                                                                                <div class="vr"></div>
                                                                                <div class="flex-grow-1">
                                                                                    <p class="text-muted mb-0">{{ $danhGia['noi_dung'] }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            var orderDetails = @json($orderDetails);

            new gridjs.Grid({
            columns: [
                { name: "Mã đơn hàng", width: "150px" },
                { name: "Ngày mua", width: "100px" },
                { name: "Doanh thu", width: "100px" },
                { name: "Hoa hồng", width: "70px" },
                { name: "Lợi nhuận", width: "100px" }
            ],
            data: orderDetails.map(function(detail) {
                var date = new Date(detail.ngay_mua);
                var formattedDate = [
                    date.getDate().toString().padStart(2, '0'),
                    (date.getMonth() + 1).toString().padStart(2, '0'),
                    date.getFullYear()
                ].join('-');

                var formattedRevenue = detail.doanh_thu.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }).replace('₫', 'VNĐ');
                var formattedProfit = detail.loi_nhuan.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }).replace('₫', 'VNĐ');

                return [
                    detail.ma_don_hang,
                    formattedDate,
                    formattedRevenue,
                    `${detail.phan_tram_hoa_hong}%`,
                    formattedProfit
                ];
            }),
            pagination: { limit: 5 },
            sort: true,
            search: true,
        }).render(document.getElementById("table-gridjs"));
        });
    </script>
    <style>
        /* Màu của nút */
        .status-an {
            background-color: red; /* Màu đỏ cho trạng thái Ẩn */
            color: #fff;
        }

        .status-hien {
            background-color: green; /* Màu xanh cho trạng thái Hiện */
            color: #fff;
        }

        /* Giữ nguyên màu khi hover */
        .status-an:hover {
            background-color: red; /* Giữ nguyên màu đỏ cho nút trạng thái Ẩn */
            color: #fff;
        }

        .status-hien:hover {
            background-color: green; /* Giữ nguyên màu xanh cho nút trạng thái Hiện */
            color: #fff;
        }

        /* Màu nền dropdown */
        .status-an .dropdown-menu {
            background-color: red;
        }

        .status-hien .dropdown-menu {
            background-color: green;
        }

        /* Mũi tên của dropdown */
        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff;
        }


        /* Màu của nút của Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        .status-da_full:hover {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat:hover {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        /* Màu nền dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-menu {
            background-color: blue; /* Màu xanh cho Đã Full */
        }

        .status-tiep_tuc_cap_nhat .dropdown-menu {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
        }

        /* Mũi tên của dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-toggle::after,
        .status-tiep_tuc_cap_nhat .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Màu của nút cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        .status-cho_xac_nhan:hover {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi:hover {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet:hover {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap:hover {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        /* Màu nền dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-menu {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
        }

        .status-tu_choi .dropdown-menu {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
        }

        .status-duyet .dropdown-menu {
            background-color: green; /* Màu xanh cho Duyệt */
        }

        .status-ban_nhap .dropdown-menu {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
        }

        /* Mũi tên của dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-toggle::after,
        .status-tu_choi .dropdown-toggle::after,
        .status-duyet .dropdown-toggle::after,
        .status-ban_nhap .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

    </style>

    <style>
        .col-auto {
            flex: 0 0 80px; /* Giảm chiều rộng của cột chứa tiêu đề và số lượng đánh giá để dành nhiều không gian cho thanh tiến trình */
        }

        .progress {
            width: 100%; /* Đảm bảo thanh tiến trình chiếm toàn bộ chiều rộng của cột */
            height: 5px; /* Chiều cao cho thanh tiến trình */
        }

        .p-2 {
            padding: 8px; /* Điều chỉnh khoảng cách padding */
        }

        .mt-3 {
            margin-top: 6px; /* Khoảng cách giữa các mục */
        }


    </style>


@endpush
