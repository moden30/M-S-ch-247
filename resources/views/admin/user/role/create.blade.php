@extends('admin.layouts.app')
@section('start-point')
    Quản lý quyền
@endsection
@section('title')
    Thêm mới
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
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="nameInput" class="form-label">Tên vai trò</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="nameInput"
                                                    placeholder="Nhập tên" name="ten_vai_tro">
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="websiteUrl" class="form-label">Website URL</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="url" class="form-control" id="websiteUrl"
                                                    placeholder="Enter your url">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="dateInput" class="form-label">Date</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="date" class="form-control" id="dateInput">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="timeInput" class="form-label">Time</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="time" class="form-control" id="timeInput">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="leaveemails" class="form-label">Email Id</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="email" class="form-control" id="leaveemails"
                                                    placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="contactNumber" class="form-label">Contact Number</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="number" class="form-control" id="contactNumber"
                                                    placeholder="+91 9876543210">
                                            </div>
                                        </div> --}}
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="meassageInput" class="form-label">Mô tả</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <textarea name="mo_ta" class="form-control" id="meassageInput" rows="3"
                                                    placeholder="Vai trò này gồm các quyền gì, phạm vi truy cập v.v"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="" class="form-label">Quyền</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    @foreach ($quyens as $quyen)
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
                                                                <label class="form-check-label ms-2" for="{{ 'quyen' . $quyen->id }}">
                                                                    {{ $quyen->ten_quyen }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="text-start mt-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Thoát</a>
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
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
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

    <script>
        function hienThiAnh(event) {
            const anhDaiDien = document.getElementById('anh_dai_dien');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                anhDaiDien.src = reader.result;
                anhDaiDien.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-quyen').on('submit', function(e) {
                // Tạo một mảng để lưu các giá trị checkbox đã chọn
                let selectedQuyens = [];

                // Duyệt qua tất cả các checkbox có class 'quyen-checkbox'
                $('.quyen-checkbox:checked').each(function() {
                    selectedQuyens.push($(this).val()); // Thêm giá trị checkbox vào mảng
                });

                // Đặt mảng các giá trị đã chọn vào input ẩn
                $('#selected_quyens').val(selectedQuyens.join(','));

                // Form sẽ được submit với giá trị các checkbox đã chọn
            });
        });
    </script> --}}
@endpush
