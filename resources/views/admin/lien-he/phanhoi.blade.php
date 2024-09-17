@extends('admin.layouts.app')
@section('start-point')
    Phản Hồi Khách Hàng
@endsection
@section('title')
    Phản Hồi Khách Hàng
@endsection
@section('content')

<form action="{{ route('email.phanHoi') }}" method="POST" enctype="multipart/form-data"  class="needs-validation">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Tiêu Đề</label>
                        <input type="text" class="form-control" id="product-title-input" name="tieu_de" placeholder="Nhập tiêu đề" required>
                    </div>
                    <div >
                        <label class="form-label" for="product-title-input">Nội Dung</label>
                        <br>
                        <textarea class="" id="ckeditor-classic" name="noi_dung" placeholder="Nhập nội dung phản hồi tại đây"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Hình ảnh:</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="anh" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-success w-sm">Submit</button>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông Tin Khách Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="choices-publish-status-input" class="form-label">Tiêu Đề</label>
                        <input type="text" id="datepicker-publish-input" class="form-control" name="customer_subject" value="{{ $lienHe->chu_de }}" readonly>
                    </div>

                    <div>
                        <label for="choices-publish-visibility-input" class="form-label">Tên Khách Hàng</label>
                        <input class="form-control" type="text" value="{{ $lienHe->ten_khach_hang }}" readonly />
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Email</h5>
                </div>
                <!-- end card body -->
                <div class="card-body">
                    <div>
                        <label for="datepicker-publish-input" class="form-label">Email Khách Hàng</label>
                        <br>
                        <input type="text"  class="form-control" name="customer_email" value="{{ $lienHe->email }}" readonly>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Nội Dung Liên Hệ</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Đây Là Nội Dung Liên Hệ</p>
                    <textarea class="form-control" name="customer_content" rows="3" readonly>{{ strip_tags($lienHe->noi_dung) }}</textarea>
                </div>

                <!-- Hiển thị ảnh nếu có -->
                @if(!empty($lienHe->anh))
                    <div class="card-body">
                        <p class="text-muted mb-2">Đây Là Ảnh Liên Hệ</p>
                        <img src="{{ $lienHe->anh }}" class="img-square" alt="Ảnh Liên Hệ">
                    </div>
                @endif
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</form>


@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush

<style>
    .img-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 100px;
        overflow: hidden;
    }

    .img-square {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
