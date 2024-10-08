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
                                    <div class="card-body row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                    <label for="nameInput" class="form-label">Tên vai trò</label>
                                                    <input type="text" class="form-control" id="nameInput"
                                                           placeholder="Nhập tên" name="ten_vai_tro">
                                            </div>
                                            <div class="mb-3">
                                                    <label for="meassageInput" class="form-label">Mô tả</label>
                                                <textarea name="mo_ta" class="form-control" id="meassageInput" rows="3"
                                                          placeholder="Vai trò này gồm các quyền gì, phạm vi truy cập v.v"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="text-end mt-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Thoát</a>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-lg-9">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Nhóm quyền</th>
                                                        <th>Quyền</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($groupedPermissions as $group => $permissions)
                                                        <tr>
                                                            <td>{{ $group }}</td> <!-- Tiêu đề nhóm quyền -->
                                                            <td>
                                                                <div class="row">
                                                                    @foreach ($permissions as $permissionKey => $permissionLabel)
                                                                        @php
                                                                            // Tìm quyền theo `ten_quyen` để lấy ID và các thuộc tính khác
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
                                                                                    <label class="form-check-label ms-2" for="{{ 'quyen' . $quyen->id }}">
                                                                                        {{ $permissionLabel }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
