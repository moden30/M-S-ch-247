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
                padding: 0; /* Removed padding for full image display */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: transform 0.2s ease;
                overflow: hidden;
                background-color: #fff;
                display: inline-block;
            }
            .book-image {
                position: relative; /* Để chứa các phần tử con */
                overflow: hidden; /* Ẩn phần bên ngoài */
            }
.original-price{

}
            /* Ẩn hình ảnh khi không hover */
            .hover-book {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                display: flex;
                justify-content: center; /* Căn giữa */
                align-items: center; /* Căn giữa */
                opacity: 0; /* Ẩn hình ảnh khi không hover */
                transition: opacity 0.3s ease; /* Hiệu ứng chuyển tiếp */
            }

            /* Hiện hình ảnh khi hover */
            .book-image:hover .hover-book {
                opacity: 1; /* Hiện hình ảnh khi hover */
            }

            /* Kích thước hình ảnh hiển thị khi hover */
            .hover-image {
                max-width: 80%; /* Giới hạn kích thước hình ảnh */
                max-height: 80%; /* Giới hạn kích thước hình ảnh */
                border-radius: 5px; /* Bo góc hình ảnh */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Thêm bóng cho hình ảnh */
            }


            .book-item:hover {
                transform: translateY(-5px);
            }

            /* Book Image */
            .book-image {
                width: 100%;
                height: 100%; /* Make the image container full height */
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
                top: 0; /* Aligns it to the top */
                right: 0; /* Aligns it to the right */
                color: white;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
                font-size: 12px;
                font-weight: bold;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow for depth */
                z-index: 10; /* Ensures the price tag appears above other elements */
                margin: 0; /* Remove margin to position it exactly in the corner */
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
                background: linear-gradient(135deg, #f44336 30%, #e57373 100%);
                box-shadow: 0 0 5px rgba(244, 67, 54, 0.5),
                0 0 10px rgba(244, 67, 54, 0.4),
                0 0 15px rgba(244, 67, 54, 0.3),
                0 0 20px rgba(244, 67, 54, 0.2);
                animation: burn-khuyen-mai 1.5s infinite alternate;
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
                        0 0 5px rgba(244, 67, 54, 0.5),
                        0 0 10px rgba(244, 67, 54, 0.4),
                        0 0 15px rgba(244, 67, 54, 0.3),
                        0 0 20px rgba(244, 67, 54, 0.2);
                    transform: scale(1);
                }
                100% {
                    box-shadow:
                        0 0 10px rgba(244, 67, 54, 0.7),
                        0 0 20px rgba(244, 67, 54, 0.5),
                        0 0 30px rgba(244, 67, 54, 0.4),
                        0 0 40px rgba(244, 67, 54, 0.3);
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
                background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
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
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tim-kiem-sach') }}">Danh sách</a></li>
        </ol>
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
                                    <div class="clearfix">
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Thể Loại</span></div>
                                        @foreach($theLoais as $item)
                                            <input type="checkbox" id="theloai-{{$item->id}}" value="{{$item->id}}" name="the_loai[]">
                                            <label for="theloai-{{$item->id}}"><span></span>{{$item->ten_the_loai}}</label>
                                        @endforeach
                                    </div>
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
                                        <div class="h2-child"><span class="the7-list">></span> <span
                                                class="title-child">Thời Gian</span></div>
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
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tim-kiem-sach') }}">Danh sách</a></li>
        </ol>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            let currentPage = 1;
            let debounceTimer;
            function fetchBooks(page = 1) {
                const formData = $('#searchForm').serialize() + `&page=${page}`;

                $.ajax({
                    url: '{{ route('data-sach') }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        $('#alert-info').html(`Tìm thấy <strong>${response.total}</strong> sách`);
                        $('#data-sach').empty();
                        response.data.forEach(function (data) {
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
                        $('#pagination').empty(); // Xóa nội dung cũ
                        let paginationContent = `
                         <div>
                            <span>Trang ${response.current_page} / ${response.last_page}</span>
                                <div class="text-center">
                            <button id="prev" class="btn btn-primary" ${response.current_page === 1 ? 'disabled' : ''}>«</button>
                        `;

                        // Tạo các nút cho từng trang
                        for (let i = 1; i <= response.last_page; i++) {
                            paginationContent += `<button class="btn page-link me-2 ${response.current_page === i ? 'btn-primary' : 'btn-secondary'}"  data-page="${i}">${i}</button>`;
                        }

                        paginationContent += `
                            <button id="next" class="btn btn-primary" ${response.current_page === response.last_page ? 'disabled' : ''}>»</button>
                            </div>
                        </div>
                        `;
                        $('#pagination').append(paginationContent);

                        // Cập nhật sự kiện cho các nút phân trang
                        $('#prev').off('click').on('click', function() {
                            if (currentPage > 1) {
                                currentPage--;
                                fetchBooks(currentPage);
                            }
                        });

                        $('#next').off('click').on('click', function() {
                            if (currentPage < response.last_page) {
                                currentPage++;
                                fetchBooks(currentPage);
                            }
                        });

                        // Sự kiện cho các nút số trang
                        $('.page-link').off('click').on('click', function() {
                            const page = $(this).data('page'); // Lấy số trang từ data-page
                            currentPage = page; // Cập nhật trang hiện tại
                            fetchBooks(currentPage); // Gọi lại hàm fetchBooks với trang mới
                        });
                    },
                    error: function () {
                        console.error('Lỗi');
                    }
                });
            }

            // Sự kiện cho nút tìm kiếm
            $('#searchButton').on('click', function() {
                currentPage = 1; // Reset trang hiện tại về 1 khi tìm kiếm
                fetchBooks(currentPage);
            });

            // Sự kiện cho nút lọc
            $('#filterButton').on('click', function() {
                currentPage = 1; // Reset trang hiện tại về 1 khi lọc
                fetchBooks(currentPage);
            });

            $('#searchInput').on('input', function() {
                clearTimeout(debounceTimer);
                const inputValue = $(this).val();


                debounceTimer = setTimeout(function() {
                    currentPage = 1;
                    fetchBooks(currentPage);
                }, 300);
            });
            // Tải dữ liệu ban đầu
            fetchBooks();
        });
    </script>
@endpush
