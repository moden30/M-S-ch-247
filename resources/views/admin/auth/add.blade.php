@extends('admin.layouts.app')
@section('start-point')
    Quản lý quyền
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
            <form action="">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nameInput" class="form-label">Name</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" id="nameInput"
                                           placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="websiteUrl" class="form-label">Website URL</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="url" class="form-control" id="websiteUrl" placeholder="Enter your url">
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="meassageInput" class="form-label">Message</label>
                                </div>
                                <div class="col-lg-7">
                                    <textarea class="form-control" id="meassageInput" rows="3"
                                              placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="" class="form-label">Quyền</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check mb-1 custom-checkbox-size">
                                                <input class="form-check-input" type="checkbox" id="quyen1" checked>
                                                <label class="form-check-label ms-2" for="quyen1">
                                                    Quyền 1
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                        <button type="submit" class="btn btn-primary">Thoát</button>
                                    </div>
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
