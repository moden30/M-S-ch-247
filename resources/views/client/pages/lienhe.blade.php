@extends('client.layouts.app')
@section('content')
    @push('styles')
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link rel="stylesheet" href="{{ asset('assets\client\themes\truyenfull\echo\css\lien-he.css') }}">
        <style>
            .contact_us_2 {
                background-image: url('{{ asset('assets/client/img/nen.png') }}');
                background-size: cover;

            }
        </style>
    @endpush

    <div class="contact_us_2">
        <div class="responsive-container-block big-container">
            <div class="blueBG">
            </div>
            <div class="responsive-container-block container">
                <form class="form-box" action="{{ route('lien_he.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-block form-wrapper">
                        <h1 style=" font-size: 2.5em;font-weight: bold;">
                            LIÊN HỆ
                        </h1>
                        <p class="text-blk contactus-subhead">
                            Chúng tôi luôn lắng nghe phản hồi của bạn.
                        </p>
                        <div class="responsive-container-block">
                            <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6" id="i10mt">
                                <p class="text-blk input-title">
                                    HỌ VÀ TÊN
                                </p>
                                <input type="text" id="name" name="ten_khach_hang" class="input"
                                    value="{{ Auth::check() ? Auth::user()->ten_doc_gia : 'Nhập tên' }}" required>
                            </div>
                            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                <p class="text-blk input-title">
                                    EMAIL
                                </p>
                                <input type="email" id="email" name="email" class="input"
                                    value="{{ Auth::check() ? Auth::user()->email : 'Nhập email' }}" required>
                            </div>
                            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                <p class="text-blk input-title">
                                    CHỦ ĐỀ
                                </p>
                                <input type="text" id="chu_de" name="chu_de" class="input"
                                    placeholder="Vui lòng nhập chủ đề..." required>
                            </div>

                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i">
                                <p class="text-blk input-title">
                                    lỜI NHẮN
                                </p>
                                <textarea id="message" name="noi_dung" class="textinput" placeholder="Vui lòng mô tả chi tiết vấn đề..." required></textarea>
                            </div>

                            <div class="responsive-cell-block wk-desk-6 ">
                                <label for="fileUpload" class="input upload-label">
                                    <i style="color: rgb(0, 0, 0)" class="fa fa-upload"></i> Tải Lên Hình Ảnh
                                </label>

                                <input type="file" id="fileUpload" name="anh" style="display:none;">

                                <div id="imagePreviewContainer" class="image-preview-container" style="display:none;">
                                    <div class="image-preview">
                                        <img id="previewImage" src="" alt="Preview Image" class="preview-img" />
                                        <span id="fileName" class="file-name"></span>
                                        <span id="removeImage" class="remove-image"><i class="fa fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <label style="margin-left: 12px;" class="text-danger" for="message">Bạn có thể tải lên các hình
                                ảnh mô tả vấn đề hoặc lỗi.</label>
                        </div>
                        <button class="submit-btn">
                            Gửi liên hệ
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        // Xử lý khi người dùng chọn file ảnh
        document.getElementById('fileUpload').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Lấy file được chọn
            const previewImage = document.getElementById('previewImage'); // Thẻ img hiển thị preview
            const fileName = document.getElementById('fileName'); // Thẻ span hiển thị tên file
            const imagePreviewContainer = document.getElementById(
                'imagePreviewContainer'); // Container hiển thị ảnh

            if (file) {
                const reader = new FileReader();

                // Giới hạn tên file nếu dài quá 20 ký tự
                let fileNameText = file.name;
                if (fileNameText.length > 20) {
                    fileNameText = fileNameText.substring(0, 17) + '...'; // Cắt ngắn tên và thêm "..."
                }

                // Khi file được tải xong, đặt URL vào src của thẻ img và hiển thị container
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Set nguồn của ảnh là ảnh mới
                    fileName.textContent = fileNameText; // Hiển thị tên file (đã cắt ngắn nếu cần)
                    imagePreviewContainer.style.display = 'flex'; // Hiển thị container chứa ảnh
                }

                // Đọc file dưới dạng URL
                reader.readAsDataURL(file);
            }
        });

        // Xử lý khi người dùng nhấn vào biểu tượng thùng rác để xóa ảnh
        document.getElementById('removeImage').addEventListener('click', function() {
            document.getElementById('fileUpload').value = ''; // Xóa giá trị của input file
            document.getElementById('previewImage').src = ''; // Xóa ảnh hiển thị
            document.getElementById('fileName').textContent = ''; // Xóa tên file
            document.getElementById('imagePreviewContainer').style.display = 'none'; // Ẩn container hiển thị ảnh
        });

        document.addEventListener('DOMContentLoaded', function() {
            var alertClose = document.querySelector('.custom-alert-close');
            var alertBox = document.getElementById('customAlert');

            // Đóng thông báo khi nhấn vào dấu X
            if (alertClose) {
                alertClose.addEventListener('click', function() {
                    alertBox.style.display = 'none';
                });
            }

            // Tự động ẩn thông báo sau 5 giây
            setTimeout(function() {
                if (alertBox) {
                    alertBox.style.display = 'none';
                }
            }, 5000); // 5000ms = 5 giây
        });
    </script>
@endsection
