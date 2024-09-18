@extends('admin.layouts.app')

@section('start-point')
    Phản Hồi Khách Hàng
@endsection

@section('title')
    Phản Hồi Khách Hàng
@endsection

@section('content')
<form action="{{ route('email.phanHoi') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
    @csrf
    <div class="row">
        {{-- Form nhập dữ liệu để gửi email --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Tiêu Đề</label>
                        <input type="text" class="form-control @error('tieu_de') is-invalid @enderror" id="product-title-input" name="tieu_de" placeholder="Nhập tiêu đề" value="{{ old('tieu_de') }}" required>
                        @error('tieu_de')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label" for="ckeditor-classic">Nội Dung</label>
                        <br>
                        <textarea class="form-control @error('noi_dung') is-invalid @enderror" id="ckeditor-classic" name="noi_dung" placeholder="Nhập nội dung phản hồi tại đây">{{ old('noi_dung') }}</textarea>
                        @error('noi_dung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="container mt-4">
                        <div class="mb-3">
                            <label for="image-upload" class="form-label">File Đính Kèm:</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" class="image-label">Chọn tệp</label>
                                <input type="file" id="image-upload" name="anh[]" accept="image/*" multiple />
                            </div>
                            <div id="selected-image-preview" class="mt-2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-success w-sm">Gửi</button>
            </div>
        </div>

        {{-- Form đổ ra thông tin liên hệ của khách hàng --}}
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
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Email</h5>
                </div>
                <div class="card-body">
                    <div>
                        <label for="datepicker-publish-input" class="form-label">Email Khách Hàng</label>
                        <br>
                        <input type="text" class="form-control" name="customer_email" value="{{ $lienHe->email }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Nội Dung Liên Hệ</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">Đây Là Nội Dung Liên Hệ</p>
                    <textarea class="form-control" name="customer_content" rows="3" readonly>{{ strip_tags($lienHe->noi_dung) }}</textarea>
                </div>

                @if(!empty($lienHe->anh))
                    <div class="card-body">
                        <p class="text-muted mb-2">Đây Là Ảnh Liên Hệ</p>
                        <img src="{{ asset($lienHe->anh)  }}" width="150px" height="150px" class="img-square" alt="Ảnh Liên Hệ">
                    </div>
                @endif

            </div>

        </div>
    </div>
</form>
@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome for Trash Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const imageUpload = document.getElementById('image-upload');
        const selectedImagePreview = document.getElementById('selected-image-preview');
        let fileArray = [];

        imageUpload.addEventListener('change', function(event) {
            const files = Array.from(event.target.files);

            files.forEach(file => {
                fileArray.push(file);

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('img-wrapper');
                    imgWrapper.innerHTML = `
                        <img src="${e.target.result}" class="img-square" alt="Selected Image">
                        <span class="remove-icon"><i class="fas fa-trash-alt"></i></span>
                    `;

                    imgWrapper.querySelector('.remove-icon').addEventListener('click', function() {
                        const index = fileArray.indexOf(file);
                        if (index > -1) {
                            fileArray.splice(index, 1);
                        }
                        imgWrapper.remove();
                    });

                    selectedImagePreview.appendChild(imgWrapper);
                }
                reader.readAsDataURL(file);
            });

            event.target.value = '';
        });

        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const formData = new FormData(form);
            formData.delete('anh[]');

            fileArray.forEach(file => {
                formData.append('anh[]', file);
            });

            const request = new XMLHttpRequest();
            request.open(form.method, form.action);
            request.send(formData);

            e.preventDefault();

            request.onload = function() {
                if (request.status === 200) {
                    window.location.reload();
                } else {
                    alert('Có lỗi xảy ra khi gửi email.');
                }
            };
        });
    });
</script>

<!-- CSS -->
<style>
    .image-preview {
        width: 100%;
        height: auto;
        padding: 10px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
    }

    .image-preview label {
        font-size: 16px;
        cursor: pointer;
    }

    #image-upload {
        display: none;
    }

    #selected-image-preview {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .img-wrapper {
        position: relative;
        margin: 5px;
        width: 100px;
        height: 100px;
    }

    .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .remove-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: white;
        border-radius: 50%;
        cursor: pointer;
        padding: 3px;
    }

    .remove-icon i {
        color: rgb(9, 9, 9);
    }
</style>
