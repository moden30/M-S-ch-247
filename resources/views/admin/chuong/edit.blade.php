@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Sửa
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">

                            <h5>Sửa chương sách: {{ $sach->ten_sach }}</h5>
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
                  action="{{ route('chuong.update', [$sach->id, $chuong->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Số chương</label>
                                            <input type="text" name="so_chuong"
                                                   value="{{ old('so_chuong', $chuong->so_chuong) }}"
                                                   class="form-control @error('so_chuong') is-invalid @enderror"
                                                   id="manufacturer-name-input" placeholder="Nhập chương số...">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Tiêu đề</label>
                                            <input type="text" name="tieu_de"
                                                   value="{{ old('tieu_de', $chuong->tieu_de) }}"
                                                   class="form-control @error('tieu_de') is-invalid @enderror"
                                                   id="manufacturer-brand-input" placeholder="Nhập tiêu đề chương">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="orders-input">Ngày lên sóng</label>
                                    <input type="date" class="form-control @error('ngay_len_song') is-invalid @enderror"
                                           name="ngay_len_song"
                                           value="{{ old('ngay_len_song', $chuong->ngay_len_song) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nội dung chương</h5>
                            </div>
                            <div class="card-body">
                                <textarea id="ckeditor-classic" name="noi_dung"
                                          class="form-control @error('noi_dung') is-invalid @enderror">{{ old('noi_dung', $chuong->noi_dung) }}</textarea>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-warning ">Sửa chương</button>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Trạng thái</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label" for="">Nội dung người lớn</label>
                                        <select name="noi_dung_nguoi_lon" id="" class="form-select">
                                            @foreach($noi_dung_nguoi_lon as $key => $value)
                                                <option class="{{ $mau_trang_thai[$key] }}" value="{{$key}}"
                                                        @if (old('noi_dung_nguoi_lon') == $key) selected @endif {{ $chuong->noi_dung_nguoi_lon == $key ? 'selected' : '' }}>{{ $value }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Trạng thái</label>
                                        <select name="trang_thai_chuong" id="" class="form-select">
                                            @foreach($trang_thai as $key => $value)
                                                <option class="{{ $mau_trang_thai[$key] }}"
                                                        value="{{$key}}" @if (old('trang_thai_chuong') == $key)  @endif {{ $chuong->trang_thai == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">Kiểm duyệt</label>
                                        <select name="kiem_duyet_chuong" id="" class="form-select">
                                            @foreach($kiem_duyet as $key => $value)
                                                <option class="{{ $mau_trang_thai[$key] }}"
                                                        value="{{$key}}" @if (old('kiem_duyet_chuong') == $key)  @endif {{ $chuong->kiem_duyet == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

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
