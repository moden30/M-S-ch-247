@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Chi tiết bình luận
@endsection
@section('content')

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Ảnh bài viết -->
                    <div class="mb-2">
                        <img src="{{ Storage::url($binhLuan->baiViet->hinh_anh) }}" alt="Ảnh Bài Viết" class="img-fluid" style="max-width: 250px;">
                    </div>

                    <!-- Tên sản phẩm dưới chân ảnh -->
                    <h5 class="fs-14 mb-4">{{ $binhLuan->baiViet->tieu_de }}</h5>

                    <!-- Nút Xem Bài Viết -->
                    <a href="{{ route('bai-viet.show', $binhLuan->bai_viet_id) }}" class="btn btn-primary">Xem Bài Viết</a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body text-center">
                        <h6 class=" fw-semibold">Tổng số bình luận: {{ $tongBinhLuan }}</h6>
                        <!--end table-->
                </div>
            </div>



        </div>
        <!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-light text-dark me-2">ID: {{ $binhLuan->id }}</span>
                        </div>

                        <h6 class="mb-3 fw-semibold text-uppercase">Thông Tin Người Bình Luận</h6>
                        <p><strong>Họ Tên:</strong> {{ $binhLuan->user->ten_doc_gia }}</p>

                        <p><strong>Số Điện Thoại:</strong> {{ $binhLuan->user->so_dien_thoai }}</p>
                        <p><strong>Email:</strong> {{ $binhLuan->user->email }}</p>
                        <p><strong>Trạng thái:</strong>  <span class="badge fs-6 {{ $binhLuan->trang_thai === 'hien' ? 'bg-success' : 'bg-danger' }}">
                            {{ $binhLuan->trang_thai === 'hien' ? 'Hiển thị' : 'Ẩn' }}
                        </span></p>

                        <p><strong>Ngày Bình Luận</strong> {{ \Carbon\Carbon::parse($binhLuan->created_at)->translatedFormat('d \T\h\á\n\g m, Y') }}</p>
                        <h6 class="mb-3 fw-semibold text-uppercase">Nội Dung Đánh Giá</h6>
                        <p>{{ $binhLuan->noi_dung }}</p>




                    </div>

                    <!-- Nút Liên Hệ Khách Hàng -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Liên Hệ Khách Hàng</a>
                    </div>
                </div>
            </div>


            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab">
                                    Đánh giá khác của khách hàng (3)
                                </a>
                            </li>
                        </ul>
                        <!--end nav-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reviews" role="tabpanel">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th scope="col">Độc giả</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Ngày bình luận</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="fs-15 mb-0">ABCXYZ</h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning w-60">Trung bình</span>
                                            </td>
                                            <td>Sản phẩm bình thường, tôi mong đợi nhiều hơn.</td>
                                            <td>05 Tháng 9, 2024</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                       id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="ri-equalizer-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuLink3">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Xóa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                    <!--end tab-content-->
                </div>
            </div>


            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
