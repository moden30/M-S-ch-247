@extends('admin.layouts.app')
@section('start-point')
    Quản lý bài viết
@endsection
@section('title')
    Thêm mới
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-16">Thêm mới bài viết</h5>
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
            <form id="createproduct-form" autocomplete="off" class="needs-validation" action="{{ route('bai-viet.store') }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tiêu đề bài viết</label>
                                    <input type="text" class="form-control @error('tieu_de') is-invalid @enderror" id="product-title-input" value="{{ old('tieu_de') }}" name="tieu_de" placeholder="Nhập tiêu đề sách" required>
                                </div>
                                <div>
                                    <label>Nội dung chính</label>
                                    <textarea id="ckeditor-classic" name="noi_dung" class="@error('noi_dung') is-invalid @enderror">{{ old('noi_dung') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Thêm</button>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ảnh đại diện</h5>
                            </div>
                            <div class="card-body">

                                <div class="d-flex justify-content-center mb-3">
                                    <img id="anh_dai_dien" src="" style="height: 200px; width: auto; display: none">
                                </div>
                                <div class="mb-3">
                                    <input type="file" onchange="hienThiAnh(event)" class="form-control @error('hinh_anh') is-invalid @enderror" name="hinh_anh">
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Khác</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Chuyên mục</label>


                                    <select name="chuyen_muc_id" id="" class="form-select @error('chuyen_muc_id') is-invalid @enderror">
                                        @foreach($chuyenMucs as $value)
                                            <option class="" value="{{$value->id}}" @if (old('chuyen_muc_id') == $value->id) selected @endif>{{ $value->ten_chuyen_muc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng Thái</label>

                                    <select name="trang_thai" id="" class="form-select">
                                        @foreach($trang_thai as $key => $value)
                                            <option class="{{ $mau_trang_thai[$key] }}" value="{{$key}}" @if (old('trang_thai') == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="choices-publish-visibility-input" class="form-label">Thời gian đăng</label>
                                    <input type="date" class="form-control @error('ngay_dang') is-invalid @enderror" name="ngay_dang" value="{{ old('ngay_dang') }}">
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

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

    <script>
        function hienThiAnh(event) {
            const anhDaiDien = document.getElementById('anh_dai_dien');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function () {
                anhDaiDien.src = reader.result;
                anhDaiDien.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
