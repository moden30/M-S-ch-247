@extends('admin.layouts.app')
@section('start-point')
    Quản lý chuyên mục
@endsection
@section('title')
    Sửa chuyên mục
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-16">Chỉnh sửa thông chuyên mục</h5>
                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Thông báo khi thêm thất bại -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i>
                                    <strong class="fs-5">Thất bại</strong>
                                    <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate
                  action="{{ route('chuyen-muc.update', $chuyen_mucs->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tên chuyên mục</label>
                                    <input type="text" class="form-control"
                                           name="ten_chuyen_muc" id="product-title-input"
                                           value="{{ $chuyen_mucs->ten_chuyen_muc }}"
                                           placeholder="Nhập tên chuyên mục" required>
                                </div>
                                <div class="mb-3">
                                    <label for="parent-category-select" class="form-label">Chuyên mục cha</label>
                                    <select name="chuyen_muc_cha_id" id="parent-category-select" class="form-select">
                                        <option value="">Chọn chuyên mục cha</option>
                                        @foreach($parentCategories as $parent)
                                            <option value="{{ $parent->id }}"
                                                {{ $chuyen_mucs->chuyen_muc_cha_id == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->ten_chuyen_muc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Nút "Sửa" được căn giữa ngay dưới phần "Thông tin chính" -->
                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('chuyen-muc.index') }}" class="btn btn-secondary me-2">Quay lại</a>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Trạng thái</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng thái hiển thị</label>
                                    <select name="trang_thai" id="" class="form-select" data-choices data-choices-search-false>
                                        @foreach(App\Models\ChuyenMuc::TRANG_THAI as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $chuyen_mucs->trang_thai == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>

@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush
