@extends('admin.layouts.app')

@section('start-point')
    Phản Hồi Khách Hàng
@endsection

@section('title')
    Phản Hồi Khách Hàng
@endsection

@section('content')
<form action="{{ route('email.phanHoi') }}" method="POST" enctype="multipart/form-data" class="needs-validation giap">
    @csrf
    <div class="row">
        {{-- Form nhập dữ liệu để gửi email --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
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
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Tiêu Đề</label>
                        <input type="text" class="form-control @error('tieu_de') is-invalid @enderror" id="product-title-input" name="tieu_de" placeholder="Nhập tiêu đề" value="{{ old('tieu_de') }}" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội Dung</label>
                        <br>
                        <textarea class="form-control @error('noi_dung') is-invalid @enderror" id="ckeditor-classic" name="noi_dung" placeholder="Nhập nội dung phản hồi tại đây">{{ old('noi_dung') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image-upload" class="form-label">File Đính Kèm:</label>
                        <div class="custom-file-upload" onclick="document.getElementById('image-upload').click()">
                            Nhấn để chọn ảnh
                        </div>
                        <input type="file" id="image-upload" name="anh[]" accept="image/*" multiple style="display: none;" onchange="previewImages()" />
                        <div id="image-preview" class="mt-3"></div>
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
                        <img src="{{ asset('storage/' .$lienHe->anh)  }}" width="150px" height="150px" class="img-square" alt="Ảnh Liên Hệ">
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
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush

<script>
    CKEDITOR.replace('ckeditor-classic', {
        language: 'vi',
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token(), 'type' => 'sach']) }}",
        filebrowserUploadMethod: 'form'
    });

    document.getElementById('image-upload').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Xóa các ảnh đã hiển thị trước đó

        // Duyệt qua từng file được chọn
        Array.from(files).forEach((file) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Tạo khung chứa ảnh và nút xóa
                const previewDiv = document.createElement('div');
                previewDiv.classList.add('image-preview');

                // Tạo thẻ img để hiển thị ảnh
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px'; // Đặt kích thước cho ảnh
                img.style.height = '100px'; // Đặt kích thước cho ảnh
                img.style.objectFit = 'cover'; // Cắt ảnh nếu cần

                // Tạo nút xóa
                const removeButton = document.createElement('button');
                removeButton.classList.add('remove-image');
                removeButton.innerHTML = '&times;';
                removeButton.onclick = function() {
                    previewDiv.remove(); // Xóa ảnh khỏi giao diện
                };

                // Thêm ảnh và nút xóa vào div chứa ảnh
                previewDiv.appendChild(img);
                previewDiv.appendChild(removeButton);

                // Thêm div ảnh vào container
                previewContainer.appendChild(previewDiv);
            };

            reader.readAsDataURL(file); // Đọc file ảnh
        });
    });
    function previewImages() {
        const fileInput = document.getElementById('image-upload');
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Xóa nội dung cũ

        Array.from(fileInput.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageDiv = document.createElement('div');
                imageDiv.classList.add('image-preview-item');
                imageDiv.innerHTML = `
                    <img src="${event.target.result}" alt="Image Preview" style="max-width: 100px; margin-right: 10px;" />
   <button type="button" onclick="removeImage(${index})" class="delete-button">
        <i class="bx bx-trash"></i>
    </button>
 `;
                previewContainer.appendChild(imageDiv);
            }
            reader.readAsDataURL(file);
        });
    }

    function removeImage(index) {
        const fileInput = document.getElementById('image-upload');
        const dataTransfer = new DataTransfer(); // Để quản lý file
        for (let i = 0; i < fileInput.files.length; i++) {
            if (i !== index) {
                dataTransfer.items.add(fileInput.files[i]); // Giữ lại file không bị xóa
            }
        }
        fileInput.files = dataTransfer.files; // Cập nhật lại file
        previewImages(); // Cập nhật lại preview
    }

</script>
<!-- CSS -->
<style>

    .image-preview-item {
        display: inline-block; /* Đặt thành inline-block để dễ dàng quản lý vị trí */
        position: relative; /* Để sử dụng vị trí tuyệt đối cho nút xóa */
        margin-right: 10px; /* Khoảng cách giữa các ảnh */
        margin-bottom: 10px; /* Khoảng cách dưới cùng */
    }
    .image-preview-item img {
        max-width: 200px; /* Kích thước ảnh */
        max-height: 150px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .delete-button {
        position: absolute; /* Định vị nút xóa */
        top: 0; /* Đặt ở trên cùng */
        right: 0; /* Đặt ở bên phải */
        background: rgba(255, 255, 255, 0.7); /* Nền mờ cho nút xóa */
        border: none;
        border-radius: 50%;
        cursor: pointer;
        padding: 2px; /* Khoảng cách trong nút */
        font-size: 16px; /* Kích thước chữ cho biểu tượng */
        color: black; /* Màu chữ */
    }


    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 30px;
    }

    .custom-file-upload {
        padding: 10px;
        border: 2px dashed #007bff;
        text-align: center;
        cursor: pointer;
        color: #007bff;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .custom-file-upload:hover {
        background-color: #e9f7fe;
    }

    .image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }

    .image-preview {
        position: relative;
        width: 150px;
        height: 150px;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        background-color: #f8f8f8;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-preview .remove-image {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 22px;
        cursor: pointer;
    }
</style>
