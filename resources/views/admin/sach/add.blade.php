@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Thêm mới sách
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-16">Thêm mới sách</h5>
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
                  action="{{ route('sach.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{--                <input type="hidden" name="user_id" value="{{ auth()->id() }}">--}}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tiêu đề sách</label>
                                    <input type="text" class="form-control @error('ten_sach') is-invalid @enderror"
                                           name="ten_sach" id="product-title-input" value="{{ old('ten_sach') }}"
                                           placeholder="Nhập tiêu đề sách" required>

                                </div>
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Thể loại sách</label>
                                    <select name="the_loai_id" id=""
                                            class="form-select @error('the_loai_id') is-invalid @enderror">
                                        @foreach($theLoais as $value)
                                            <option class="" value="{{$value->id}}"
                                                    @if (old('the_loai_id') == $value->id) selected @endif>{{ $value->ten_the_loai }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tóm tắt nội dung</label>
                                    <textarea name="tom_tat" id="" cols="30" rows="6"
                                              class="form-control @error('tom_tat') is-invalid @enderror"
                                              placeholder="Nhập tóm tắt sách" required>{{ old('tom_tat') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                           role="tab">
                                            Giá sách
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                            Chương đầu tiên
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-price-input">Giá gốc</label>
                                                    <div class="input-group has-validation mb-3">
                                                        <span class="input-group-text" id="product-price-addon">$</span>
                                                        <input type="number"
                                                               class="form-control @error('gia_goc') is-invalid @enderror"
                                                               name="gia_goc" value="{{ old('gia_goc') }}"
                                                               id="product-price-input" placeholder="Nhập giá"
                                                               aria-label="Price" aria-describedby="product-price-addon"
                                                               required>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="product-discount-input">Giá khuyến
                                                        mãi</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"
                                                              id="product-discount-addon">%</span>
                                                        <input type="text"
                                                               class="form-control @error('gia_khuyen_mai') is-invalid @enderror"
                                                               name="gia_khuyen_mai" value="{{ old('gia_khuyen_mai') }}"
                                                               id="product-discount-input"
                                                               placeholder="Nhập giá khuyến mãi" aria-label="discount"
                                                               aria-describedby="product-discount-addon">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end tab-pane -->

                                    <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-name-input">Số
                                                            chương</label>
                                                        <input type="text" name="so_chuong"
                                                               value="{{ old('so_chuong') }}"
                                                               class="form-control @error('so_chuong') is-invalid @enderror"
                                                               id="manufacturer-name-input"
                                                               placeholder="Nhập chương số...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-brand-input">Tiêu
                                                            đề</label>
                                                        <input type="text" name="tieu_de" value="{{ old('tieu_de') }}"
                                                               class="form-control @error('tieu_de') is-invalid @enderror"
                                                               id="manufacturer-brand-input"
                                                               placeholder="Nhập tiêu đề chương">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div>
                                                    <label>Nội dung chương</label>
                                                    <textarea id="ckeditor-classic" name="noi_dung"
                                                              class="form-control @error('noi_dung') is-invalid @enderror">{{ old('noi_dung') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">Trạng thái</label>
                                                        <select name="trang_thai_chuong" id="" class="form-select">
                                                            @foreach($trang_thai as $key => $value)
                                                                <option class=""
                                                                        value="{{$key}}" @if (old('trang_thai_chuong') == $key)  @endif>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end row -->

                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="d-flex justify-content-end">
                            <div class="mb-3 p-1">
                                <a href="{{ route('sach.index') }}" class="btn btn-info">Quay lại</a>
                            </div>
                            <div class="mb-3 p-1">
                                <button type="submit" name="action" value="cho_xac_nhan" class="btn btn-success ">Thêm
                                </button>
                            </div>
                            <div class="mb-3 p-1">
                                <button type="submit" name="action" value="ban_nhap" class="btn btn-secondary ">Lưu
                                    thành bản nháp
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ảnh bìa sách</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex justify-content-center mb-3">
                                        <img id="anh_bia" src="" alt="" width="50%" style="display: none;">
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" onchange="hienThiAnh(event)"
                                               class="form-control @error('anh_bia_sach') is-invalid @enderror"
                                               name="anh_bia_sach">
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Trạng thái</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng thái hiển
                                        thị</label>
                                    <select name="trang_thai" id="" class="form-select" data-choices
                                            data-choices-search-false>
                                        @foreach($trang_thai as $key => $value)
                                            <option class="" value="{{$key}}"
                                                    @if (old('trang_thai') == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="choices-publish-visibility-input" class="form-label">Trạng thái cập
                                        nhật</label>
                                    <select name="tinh_trang_cap_nhat" id="" class="form-select" data-choices
                                            data-choices-search-false>
                                        @foreach($tinh_trang_cap_nhat as $key => $value)
                                            <option class="" value="{{$key}}"
                                                    @if (old('tinh_trang_cap_nhat') == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <label class="form-label" for="">Nội dung người lớn</label>
                                    <select name="noi_dung_nguoi_lon" id="" class="form-select">
                                        @foreach($noi_dung_nguoi_lon as $key => $value)
                                            <option class="" value="{{$key}}"
                                                    @if (old('noi_dung_nguoi_lon') == $key) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
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
