@extends('admin.layouts.app')
@section('start-point')
    Quản lý quyền
@endsection
@section('title')
    Sửa
@endsection
@section('content')
    <div class="col">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Khởi tạo vai trò mới</h4>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="ri-notification-off-line label-icon"></i>
                                <strong class="fs-5">{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Thông báo khi thêm thất bại -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="ri-error-warning-line label-icon"></i>
                                <strong class="fs-5">Thất bại</strong>
                                <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('roles.update', $vaiTro->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="nameInput" class="form-label">Tên vai trò</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text"
                                                       class="form-control @error('ten_vai_tro') is-invalid @enderror"
                                                       id="nameInput"
                                                       placeholder="Nhập tên"
                                                       value="{{ old('ten_vai_tro', $vaiTro->ten_vai_tro) }}"
                                                       name="ten_vai_tro">
                                                @error('ten_vai_tro')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="meassageInput" class="form-label">Mô tả</label>
                                            </div>
                                            <div class="col-lg-7">
                        <textarea name="mo_ta" class="form-control @error('mo_ta') is-invalid @enderror"
                                  id="meassageInput" rows="3"
                                  placeholder="Vai trò này gồm các quyền gì, phạm vi truy cập v.v">{{ old('mo_ta', $vaiTro->mo_ta) }}</textarea>
                                                @error('mo_ta')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="" class="form-label">Quyền</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    @foreach ($groupedPermissions as $group => $permissions)
                                                        <h5>{{ $group }}</h5>
                                                        <div class="row">
                                                            @foreach ($permissions as $permissionKey => $permissionLabel)
                                                                @php
                                                                    $quyen = $quyens->firstWhere('ten_quyen', $permissionKey);
                                                                @endphp
                                                                @if ($quyen)
                                                                    <div class="col-lg-4">
                                                                        <div class="form-check mb-1 custom-checkbox-size">
                                                                            <input
                                                                                    value="{{ $quyen->id }}"
                                                                                    class="form-check-input quyen-checkbox"
                                                                                    type="checkbox"
                                                                                    name="quyen[]"
                                                                                    id="{{ 'quyen' . $quyen->id }}"
                                                                                    @if(isset($vaiTro) && $vaiTro->quyens->contains($quyen->id)) checked @endif
                                                                            >
                                                                            <label class="form-check-label ms-2"
                                                                                   for="{{ 'quyen' . $quyen->id }}">
                                                                                {{ $permissionLabel }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endforeach

                                                </div>
                                                @error('quyen')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="text-start mt-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                    <a href="{{ route('roles.index') }}"
                                                       class="btn btn-secondary">Thoát</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .custom-checkbox-size .form-check-input {
            width: 20px;
            height: 20px;
        }
    </style>
@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>

@endpush
