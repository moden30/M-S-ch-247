@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Khôi phục bản sao
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="fs-16">Khôi phục bản sao chương <span class="text-danger">{{ $chuong->sochuong }}: {{ $chuong->tieu_de }}</span> của sách <span class="text-success">{{ $sach->ten_sach }}</span></h5>
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
            <form id="createproduct-form" autocomplete="off" class="needs-validation giap" novalidate
                  action="{{ route('chuong.update', [$sach->id, $chuong->id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Số chương</label>
                                            <input type="text" name="so_chuong" disabled
                                                   value="{{ old('so_chuong', $chuong->so_chuong) }}"
                                                   class="form-control @error('so_chuong') is-invalid @enderror"
                                                   id="manufacturer-name-input" placeholder="Nhập chương số...">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Tiêu đề</label>
                                            <input type="text" name="tieu_de" disabled
                                                   value="{{ old('tieu_de', $chuong->tieu_de) }}"
                                                   class="form-control @error('tieu_de') is-invalid @enderror"
                                                   id="manufacturer-brand-input" placeholder="Nhập tiêu đề chương">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                           role="tab">
                                            Nội dung chương
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                        <textarea id="ckeditor-classic" name="noi_dung" disabled
                                                  class="form-control @error('noi_dung') is-invalid @enderror">{{ old('noi_dung', $chuong->noi_dung) }}</textarea>
                                        <!-- end row -->
                                    </div>
                                    <!-- end tab-pane -->

                                </div>
                                <!-- end tab content -->
                            </div>

                        </div>
                        <div class="text-end mb-3">
                            <a href="{{ route('chuong.edit', ['sach' => $chuong->sach_id, 'chuong' => $chuong->chuong_id]) }}" class="btn btn-info">Quay lại chương</a>
                            <button type="submit" class="btn btn-warning">Khôi phục</button>


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
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>

    <script>
        CKEDITOR.replace('ckeditor-classic', {
            language: 'vi',
            filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?type=chuong&_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form'
        });

        function hienThiAnh(event) {
            const anhBiaSach = document.getElementById('anh_bia');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function () {
                anhBiaSach.src = reader.result;
                anhBiaSach.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
