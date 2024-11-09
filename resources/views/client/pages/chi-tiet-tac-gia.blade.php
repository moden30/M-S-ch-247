{{-- @extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>
            .author-card {
                background-color: #f9f9f9;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .user_avatar_2 img {
                width: 120px;
                height: 120px;
                object-fit: cover;
                border-radius: 50%;
                display: block;
                margin: 0 auto;
            }

            .user_nickname {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .user_login {
                font-size: 14px;
                margin-bottom: 15px;
                color: #666;
            }

            #user_count .number {
                font-size: 22px;
                font-weight: bold;
            }

            #user_count .text {
                font-size: 14px;
                color: #999;
            }

            .description {
                font-size: 14px;
                color: #777;
            }

            .text-muted {
                color: #888 !important;
            }

            .text-center {
                text-align: center;
            }

            .load_more_tax {
                text-align: center;
            }

            .btn {
                display: inline-block;
                margin: 0 auto;
            }
        </style>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span class="fa fa-home"></span> <a href="{{ url('/') }}" itemprop="url">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">
                Thành Viên
            </li>
            <li class="breadcrumb-item">
                <a href="#">
                    {{ $author->ten_doc_gia }} </a>
            </li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <!-- Thông tin tác giả -->
            <div class="col-xs-12 col-md-3">
                <div id="post_author" class="author-card">
                    <div class="user_avatar_parent text-center">
                        <div class="user_avatar_2">
                            <img src="{{ $author->hinh_anh ? Storage::url($author->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                alt="{{ $author->ten_doc_gia }} Avatar">
                        </div>
                    </div>
                    <h1 class="user_nickname text-center">
                        <span>{{ $author->ten_doc_gia }}</span>
                    </h1>
                    <div class="user_login text-center text-muted"> {{ $author->vai_tros->first()->ten_vai_tro }}</div>
                    <div class="row" id="user_count" style="margin-top: 15px;">
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $books->count() }}</div>
                            <div class="text text-muted">Sách</div>
                        </div>
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $yeuThichCount }}</div>
                            <div class="text text-muted">Yêu thích</div>
                        </div>
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $soLuongSachCount }}</div>
                            <div class="text text-muted">Đã bán</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danh sách sách -->
            <div class="col-xs-12 col-md-9">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Sách Quản Lý</h3>
                </div>
                <div id="title-result">
                    <div class="pull-right">
                        <div class="form-group">
                            <select id="filter_keyword_tax" class="form-control" onchange="filterBooks()">
                                <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Tất Cả</option>
                                <option value="newest" {{ $filter == 'newest' ? 'selected' : '' }}>Sách Mới</option>
                                <option value="updating" {{ $filter == 'updating' ? 'selected' : '' }}>Đang Cập Nhật
                                </option>
                                <option value="new" {{ $filter == 'new' ? 'selected' : '' }}>Đã Full</option>
                                <option value="top-favorite" {{ $filter == 'top-favorite' ? 'selected' : '' }}>🏆Top Yêu
                                    thích</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="content-keyword">
                    <table class="theloai-thumlist">
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="col-md-6 col-sm-6 col-xs-12">
                                    <td>
                                        <a href="{{ route('chi-tiet-sach', $book->id) }}" class="thumbnail"
                                            title="{{ $book->ten_sach }}">
                                            <img src="{{ $book->anh_bia_sach_url }}" alt="{{ $book->ten_sach }}">
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2">
                                            <a href="{{ route('chi-tiet-sach', $book->id) }}"
                                                title="{{ $book->ten_sach }}">
                                                {{ $book->ten_sach }}
                                            </a>
                                        </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray">
                                                <span class="fa fa-user"></span> Tác giả: {{ $book->tac_gia }}
                                            </p>
                                            <p class="crop-text-2">{{ $book->tom_tat }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="load_more_tax text-center">
                        <span class="btn btn-sm btn-in-primary" id="btn-xem-them" data-maxpage="3">Xem Thêm Sách →</span>
                        <span class="btn btn-sm btn-in-primary" id="btn-an-truyen" style="display: none;">Ẩn Sách ←</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function filterBooks() {
            var filter = document.getElementById('filter_keyword_tax').value;

            // Gửi request AJAX
            $.ajax({
                url: '?filter=' + filter,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Xóa nội dung danh sách sách hiện tại
                    var content = '';
                    data.forEach(function(book) {
                        content += `
                <tr class="col-md-6 col-sm-6 col-xs-12">
                    <td>
                        <a href="/sach/${book.id}" class="thumbnail" title="${book.ten_sach}">
                            <img src="${book.anh_bia_sach_url}" alt="${book.ten_sach}">
                        </a>
                    </td>
                    <td class="text">
                        <h2 class="crop-text-2">
                            <a href="/sach/${book.id}" title="${book.ten_sach}">${book.ten_sach}</a>
                        </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray">
                                <span class="fa fa-user"></span> Tác giả: ${book.tac_gia}
                            </p>
                            <p class="crop-text-2">${book.tom_tat}</p>

                            ${book.nguoi_yeu_thich_count ?
                            `<p class="crop-text-2">
                                            <span class="fa fa-heart"></span> Yêu thích: ${book.nguoi_yeu_thich_count} lượt
                                        </p>` : ''}
                        </div>
                    </td>
                </tr>`;
                    });

                    // Cập nhật nội dung bảng sách
                    $('#content-keyword tbody').html(content);
                },
                error: function(xhr) {
                    console.log('Đã xảy ra lỗi trong khi tải sách.');
                }
            });
        }

        // Gắn sự kiện change vào dropdown để gọi filterBooks
        document.getElementById('filter_keyword_tax').addEventListener('change', filterBooks);
    </script>
    <script>
        var storageBaseUrl = "{{ Storage::url('') }}"; // Trả về base URL của thư mục storage
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const booksPerPage = 10;
            let currentPage = 1;

            function updateBooksDisplay() {
                const rows = document.querySelectorAll('#content-keyword tbody tr');
                const totalBooks = rows.length;

                rows.forEach((row, index) => {
                    row.style.display = (index < booksPerPage * currentPage) ? '' : 'none';
                });

                // Hiển thị hoặc ẩn nút "Xem Thêm Truyện" nếu còn sách để xem
                const xemThemButton = document.getElementById('btn-xem-them');
                const anTruyenButton = document.getElementById('btn-an-truyen');

                xemThemButton.style.display = (booksPerPage * currentPage < totalBooks) ? 'inline-block' : 'none';
                anTruyenButton.style.display = (currentPage > 1) ? 'inline-block' : 'none';
            }

            // Xử lý khi nhấn nút "Xem Thêm Truyện"
            document.getElementById('btn-xem-them').addEventListener('click', function() {
                currentPage++;
                updateBooksDisplay();
            });

            // Xử lý khi nhấn nút "Ẩn Truyện"
            document.getElementById('btn-an-truyen').addEventListener('click', function() {
                currentPage = 1;
                updateBooksDisplay();
            });

            // Gọi hàm updateBooksDisplay ban đầu để hiển thị sách
            updateBooksDisplay();
        });
    </script>
@endpush --}}

{{-- --------------------------------------------------------------------------------------------------------- --}}


{{-- ---------------------------------------------------------------------------------------------------- --}}
@extends('client.layouts.app')
@section('content')
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets\client\themes\truyenfull\echo\css\tim-kiem-nang-cao.css') }}">
    <style>
        /* General Styles */
        .book-item {
            position: relative;
            width: 150px;
            height: 220px;
            margin: 15px;
            padding: 0;
            /* Removed padding for full image display */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s ease;
            overflow: hidden;
            background-color: #fff;
            display: inline-block;
        }

        .book-image {
            position: relative;
            /* Để chứa các phần tử con */
            overflow: hidden;
            /* Ẩn phần bên ngoài */
        }

        .original-price {}

        /* Ẩn hình ảnh khi không hover */
        .hover-book {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            /* Căn giữa */
            align-items: center;
            /* Căn giữa */
            opacity: 0;
            /* Ẩn hình ảnh khi không hover */
            transition: opacity 0.3s ease;
            /* Hiệu ứng chuyển tiếp */
        }

        /* Hiện hình ảnh khi hover */
        .book-image:hover .hover-book {
            opacity: 1;
            /* Hiện hình ảnh khi hover */
        }

        /* Kích thước hình ảnh hiển thị khi hover */
        .hover-image {
            max-width: 80%;
            /* Giới hạn kích thước hình ảnh */
            max-height: 80%;
            /* Giới hạn kích thước hình ảnh */
            border-radius: 5px;
            /* Bo góc hình ảnh */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            /* Thêm bóng cho hình ảnh */
        }


        .book-item:hover {
            transform: translateY(-5px);
        }

        /* Book Image */
        .book-image {
            width: 100%;
            height: 100%;
            /* Make the image container full height */
            overflow: hidden;
        }

        .book-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }


        /* Price Tag */
        .price-tag {
            position: absolute;
            top: 0;
            /* Aligns it to the top */
            right: 0;
            /* Aligns it to the right */
            color: white;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Adds a subtle shadow for depth */
            z-index: 10;
            /* Ensures the price tag appears above other elements */
            margin: 0;
            /* Remove margin to position it exactly in the corner */
        }

        /* Giá đã mua */
        .price-tag.da-mua {
            background: linear-gradient(135deg, #ff8a00 30%, #ffc107 100%);
            box-shadow: 0 0 5px rgba(255, 138, 0, 0.5),
                0 0 10px rgba(255, 138, 0, 0.4),
                0 0 15px rgba(255, 138, 0, 0.3),
                0 0 20px rgba(255, 138, 0, 0.2);
            animation: burn-mua 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Giá khuyến mãi */
        .price-tag.gia-khuyen-mai {
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                0 0 10px rgba(30, 187, 240, 0.4),
                0 0 15px rgba(30, 187, 240, 0.3),
                0 0 20px rgba(30, 187, 240, 0.2);
            animation: burn-goc 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Giá gốc */
        .price-tag.gia-goc {
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                0 0 10px rgba(30, 187, 240, 0.4),
                0 0 15px rgba(30, 187, 240, 0.3),
                0 0 20px rgba(30, 187, 240, 0.2);
            animation: burn-goc 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Animation bốc cháy cho giá đã mua */
        @keyframes burn-mua {
            0% {
                box-shadow:
                    0 0 5px rgba(255, 138, 0, 0.5),
                    0 0 10px rgba(255, 138, 0, 0.4),
                    0 0 15px rgba(255, 138, 0, 0.3),
                    0 0 20px rgba(255, 138, 0, 0.2);
                transform: scale(1);
            }

            100% {
                box-shadow:
                    0 0 10px rgba(255, 138, 0, 0.7),
                    0 0 20px rgba(255, 138, 0, 0.5),
                    0 0 30px rgba(255, 138, 0, 0.4),
                    0 0 40px rgba(255, 138, 0, 0.3);
                transform: scale(1.05);
            }
        }

        /* Animation bốc cháy cho giá khuyến mãi */
        @keyframes burn-khuyen-mai {
            0% {
                box-shadow:
                    0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                transform: scale(1);
            }

            100% {
                box-shadow:
                    0 0 10px rgba(30, 187, 240, 0.7),
                    0 0 20px rgba(30, 187, 240, 0.5),
                    0 0 30px rgba(30, 187, 240, 0.4),
                    0 0 40px rgba(30, 187, 240, 0.3);
                transform: scale(1.05);
            }
        }

        /* Animation bốc cháy cho giá gốc */
        @keyframes burn-goc {
            0% {
                box-shadow:
                    0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                transform: scale(1);
            }

            100% {
                box-shadow:
                    0 0 10px rgba(30, 187, 240, 0.7),
                    0 0 20px rgba(30, 187, 240, 0.5),
                    0 0 30px rgba(30, 187, 240, 0.4),
                    0 0 40px rgba(30, 187, 240, 0.3);
                transform: scale(1.05);
            }
        }


        /* Book Info */
        .book-info {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent background */
            text-align: center;
            padding: 5px 0;
        }

        .book-title {
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin: 0;
        }
    </style>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span class="fa fa-home"></span> <a href="{{ url('/') }}" itemprop="url">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">
                Thành Viên
            </li>
            <li class="breadcrumb-item">
                <a href="#">
                    {{ $author->ten_doc_gia }}({{ $author->but_danh }})</a>
            </li>
        </ol>
    </div>
    <style>
        /* Container chính */
        .main-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .author-info-section {
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Centering content horizontally */

            margin-bottom: 20px;
            padding: 130px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 70%, rgba(255, 255, 255, 1) 70%), url('{{ asset('assets/client/img/banner-author.png') }}') no-repeat center center;
            background-size: cover;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #ffffff;
        }

        .author-stats-section {
            margin-top: 280px;
            display: flex;
            gap: 20px;
            /* Adds space between each stats div */
            color: #000;
            /* Sets text color to black */
            background-color: rgba(255, 255, 255, 0.5);
            /* White background with 50% transparency */
        }




        .author-info-section img {
            margin-top: 190px;
            width: 150px;
            height: 150px;
            border-radius: 10%;
            border: 5px solid white;
            margin-right: 20px;
            object-fit: cover;
        }

        .author-details-section {
            color: #000;
            flex-grow: 1;
            padding-top: 250px;
        }

        .author-details-section h1 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }



        .author-stats-section div {
            display: flex;
            flex-direction: column;
        }

        .author-stats-section span {
            font-weight: bold;
            font-size: 1.2em;
        }

        .follow-btn-section {
            border: 2px solid #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: white;
            color: #4CAF50;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .follow-btn-section:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <div class="container">
        <!-- Phần đầu với avatar và thông tin -->
        <section class="author-info-section">
            <img src="{{ $author->hinh_anh ? Storage::url($author->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                alt="{{ $author->ten_doc_gia }}({{ $author->but_danh }}) Avatar">
            <div class="author-details-section">
                <h1>{{ $author->ten_doc_gia }}({{ $author->but_danh }})</h1>
                <p>{{ $author->email }}</p>
            </div>
            <div class="author-stats-section">
                <div>
                    <i class="fa fa-book" style="color: gray; font-size: 120%; display: block; text-align: center;"></i>
                    <p style="color: gray; font-size: 80%; text-align: center;">Sách</p>
                    <span style="display: block; text-align: center;">{{ $books->count() }}</span>
                </div>
                <div>
                    <i class="fa fa-heart" style="color: gray; font-size: 120%; display: block; text-align: center;"></i>
                    <p style="color: gray; font-size: 80%; text-align: center;">Yêu thích</p>
                    <span style="display: block; text-align: center;">{{ $yeuThichCount }}</span>
                </div>
                <div>
                    <i class="fa fa-shopping-cart"
                        style="color: gray; font-size: 120%; display: block; text-align: center;"></i>
                    <p style="color: gray; font-size: 80%; text-align: center;">Đã bán</p>
                    <span style="display: block; text-align: center;">{{ $soLuongSachCount }}</span>
                </div>
            </div>

        </section>



    </div>






<div class="container tax"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-2 sidebar-right">
            <form method="GET" action="" id="searchForm">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <input name="title" type="text" class="form-control"
                                   placeholder="Nhập tên sách" value="{{ request('title') }}" id="searchInput"/>
                            <div class="input-group-btn">
                                <button class="btn btn-primary color-white" type="button" id="searchButton">
                                    <span class="fa fa-search"></span> Tìm Kiếm
                                </button>
                            </div>
                        </div>
                        <div id="show_button_collapse" class="tf_hidden text-center">
                <span class="btn btn-black"
                      data-toggle="collapse"
                      href="#collapseExample"
                      role="button"
                      aria-expanded="false"
                      aria-controls="collapseExample">Hiển Thị Mở Rộng</span>
                        </div>
                        <div class="collapse2" id="collapseExample">
                            <div class="category" id="category">

                                <div class="form-group">
                                    <div class="h2-child"><span class="the7-list">></span> <span
                                            class="title-child">Nội dung người lớn</span></div>
                                    <select class="form-control" name="noi_dung_nguoi_lon">
                                        <option value="all">Tất Cả</option>
                                        <option value="co">Có</option>
                                        <option value="khong">Không</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="h2-child"><span class="the7-list">></span> <span
                                            class="title-child">Tình Trạng Truyện</span></div>
                                    <select class="form-control" name="tinh_trang_cap_nhat">
                                        <option value="all">Tất Cả</option>
                                        <option value="da_full">Hoàn Thành</option>
                                        <option value="tiep_tuc_cap_nhat">Đang Cập Nhật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="h2-child">
                                        <span class="the7-list">></span>
                                        <span class="title-child">Thời Gian</span>
                                    </div>
                                    <select class="form-control" name="ngay_dang">
                                        <option value="all">Tất Cả</option>
                                        <option value="new">Sách mới nhất</option>
                                        <option value="old">Sách cũ nhất</option>
                                    </select>
                                </div>

                                <div class="-ginputr">
                                    <button class="btn btn-primary color-white btn-block" type="button" id="filterButton">
                                        <span class="fa fa-search"></span> Lọc
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-10">
            <div class="alert-first"></div>
            <div id="alert-info" class="alert alert-info alert-dismissible" role="alert"></div>
            <div class="theloai-thumlist" id="data-sach">
            </div>
                <div id="pagination" class="col-md-12 mb-5">
                </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
     $(document).ready(function() {
            let currentPage = 1;
            let debounceTimer;

            function fetchBooks(page = 1) {
                const formData = $('#searchForm').serialize() + `&page=${page}`;
                const authorId = '{{ $author->id }}';
                $.ajax({
                    url: `/fetch-books2/${authorId}`,
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        $('#alert-info').html(`Tìm thấy <strong>${response.total}</strong> sách`);
                        $('#data-sach').empty();
                        response.data.forEach(function(data) {
                            let content = `
                              <li class="book-item col-md-4 col-sm-4 col-xs-12">
                                    <a href="/sach/${data.id}" title="${data.ten_sach}">
                                        <div class="book-image">
                                            <img src="${data.anh_bia_sach}" alt="${data.ten_sach}">
     <div class="price-tag ${data.da_mua ? 'da-mua' : (data.gia_khuyen_mai ? 'gia-khuyen-mai' : 'gia-goc')}">
    ${data.da_mua ? data.da_mua : (data.gia_khuyen_mai ? `
              <div class="price-slide">
            <span class="original-price" style="text-decoration: line-through; color: black;">${data.gia_goc}</span>
          </div>
          <div class="price-slide">
            <span class="promo-price">${data.gia_khuyen_mai}</span>
          </div>

    ` : data.gia_goc)}
</div>

                                            <!-- Thẻ sách hiển thị khi hover -->
                                            <div class="hover-book">
                                                <img src="${data.anh_bia_sach}" alt="${data.ten_sach}" class="hover-image">
                                            </div>
                                        </div>
                                        <div class="book-info">
                                            <h4 class="book-title">${data.ten_sach}</h4>
                                        </div>
                                    </a>
                                </li>
                            `;
                            $('#data-sach').append(content);
                        });

                    // Cập nhật phân trang
                    $('#pagination').empty();
                    let paginationContent = `
                        <div>
                            <span>Trang ${response.current_page} / ${response.last_page}</span>
                            <div class="text-center">
                                <button id="prev" class="btn btn-primary" ${response.current_page === 1 ? 'disabled' : ''}>«</button>
                    `;

                    for (let i = 1; i <= response.last_page; i++) {
                        paginationContent += `
                            <button class="btn page-link me-2 ${response.current_page === i ? 'btn-primary' : 'btn-secondary'}" data-page="${i}">${i}</button>
                        `;
                    }

                    paginationContent += `
                                <button id="next" class="btn btn-primary" ${response.current_page === response.last_page ? 'disabled' : ''}>»</button>
                            </div>
                        </div>
                    `;
                    $('#pagination').append(paginationContent);

                    // Gắn sự kiện cho các nút phân trang
                    $('#prev').off('click').on('click', function () {
                        if (currentPage > 1) {
                            currentPage--;
                            fetchBooks(currentPage);
                        }
                    });

                    $('#next').off('click').on('click', function () {
                        if (currentPage < response.last_page) {
                            currentPage++;
                            fetchBooks(currentPage);
                        }
                    });

                    $('.page-link').off('click').on('click', function () {
                        const page = $(this).data('page');
                        currentPage = page;
                        fetchBooks(currentPage);
                    });
                },
                error: function () {
                    console.error('Lỗi khi tải dữ liệu sách');
                }
            });
        }

        // Sự kiện cho nút tìm kiếm
        $('#searchButton').on('click', function () {
            currentPage = 1;
            fetchBooks(currentPage);
        });

        // Sự kiện cho nút lọc
        $('#filterButton').on('click', function () {
            currentPage = 1;
            fetchBooks(currentPage);
        });

        // Tìm kiếm với debounce
        $('#searchInput').on('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                currentPage = 1;
                fetchBooks(currentPage);
            }, 300);
        });

        // Tải dữ liệu ban đầu
        fetchBooks();
    });
</script>
@endpush


