@extends('client.layouts.app')
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
                border-radius: 0;
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
    {{-- <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div id="post_author" class="author-card">
                    <div class="max-width">
                        <div class="user_avatar_parent text-center">
                            <div class="user_avatar_2">
                                <img src="https://truyenhdt.com/img/user/vinnita-1724640086.jpg" alt="Vinita Avatar">
                            </div>
                        </div>
                        <h1 data-term="author:802569" class="user_nickname text-center">
                            <span style="color:#000000">Vinita</span>
                        </h1>
                        <div class="user_login text-center text-muted">Thành Viên</div>

                        <div class="text-center">
                            <span id="sms"></span>
                            <span id="follow"></span>
                        </div>

                        <div class="row" id="user_count" style="margin-top: 15px;">
                            <div class="col-xs-4 text-center">
                                <div class="number" style="font-weight: bold; font-size: 20px;">28</div>
                                <div class="text text-muted">Sách</div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <div class="number" style="font-weight: bold; font-size: 20px;">0</div>
                                <div class="text text-muted">Yêu thích</div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <div class="number" style="font-weight: bold; font-size: 20px;">12</div>
                                <div class="text text-muted">Sách đã bán</div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="description text-center text-muted" style="margin-top: 15px;">
                        Chưa có giới thiệu
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-9">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    </div>
                </div>
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Sách Quản Lý</h3>
                </div>
                <div id="content-keyword">
                    <div id="title-result">
                        <div class="pull-left">
                            28 Sách </div>
                        <div class="pull-right">
                            <div class="form-group">
                                <select id="filter_keyword_tax" class="form-control">
                                    <option value="new-chap">Tất Cả</option>
                                    <option value="ticket_new">Sách Mới</option>
                                    <option value="new-full">Đang Cập Nhật</option>
                                    <option value="new">Đã Full</option>
                                    <option value="top-ticket-week">🏆Top Yên thích - Tuần</option>
                                    <option value="top-ticket-month">🏆Top Yên thích - Tháng</option>
                                    <option value="top-ticket-total">🏆Top Yên thích - Tất Cả</option>
                                    <option value="top-revenue-week">💸Top Doanh Thu - Tuần</option>
                                    <option value="top-revenue-month">💸Top Doanh Thu - Tháng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <table class="theloai-thumlist">
                        <tbody>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung"
                                        class="thumbnail" title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11759157-1728028123.jpg"
                                            alt="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng" itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung"
                                            title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng" itemprop="url">
                                            Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/hoa-nhat-v/" rel="tag">Hòa Nhật
                                                    V</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Nhiều nam chính + Tu la tràng +
                                            Cạnh tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều xuyên sách
                                            rồi, nhiệm vụ là cùng lúc công&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu"
                                        class="thumbnail" title="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu-1728587866.jpg"
                                            alt="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu"
                                            title="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù" itemprop="url">
                                            Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/nhat-ca-cuong-chinh-bat-a-dich-nu-nhan/"
                                                    rel="tag">Nhất Cá Cương Chính Bất A Đích Nữ Nhân</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Xuyên không trở thành một trong
                                            những giống cái đỉnh cấp quý hiếm nhất, Tô Nại buộc phải khám phá bí mật về
                                            sự trường thọ của các thú&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr> --}}
    {{-- <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay"
                                        class="thumbnail"
                                        title="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay-1726236844.jpg"
                                            alt="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay"
                                            title="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay"
                                            itemprop="url">
                                            Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/lat-dieu-gia-ma/"
                                                    rel="tag">Lạt
                                                    Điều Gia Ma</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Đọc tâm động vật + Vả mặt + Đoàn
                                            sủng + Tu La tràng + Yêu nước + Con gái yêu quý của nhà nước lớn + Nhẹ
                                            nhàng&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung"
                                        class="thumbnail"
                                        title="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung-1727883622.jpg"
                                            alt="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung"
                                            title="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng"
                                            itemprop="url">
                                            Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/thinh-thinh-bat-thinh/"
                                                    rel="tag">Thính Thính Bất Thính</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Trên trời chỉ có một con tiểu Thao
                                            Thiết duy nhất hạ phàm, hạ phàm mới phát hiện quả thực đúng như lời Thiên
                                            Đạo cha nói: Có quyền&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr> --}}
    {{-- </tbody>
                    </table>
                    <div class="load_more_tax text-center"><span class="btn btn-sm btn-in-primary" data-maxpage="3">Xem
                            Thêm Truyện →</span></div>
                </div>
            </div>
        </div>
    </div> --}}
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
                                <option value="top-revenue" {{ $filter == 'top-revenue' ? 'selected' : '' }}>💸Top Doanh
                                    Thu</option>
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
                                        <a href="{{ route('sach.show', $book->id) }}" class="thumbnail"
                                            title="{{ $book->ten_sach }}">
                                            <img src="{{ Storage::url($book->anh_bia_sach) }}"
                                                alt="{{ $book->ten_sach }}">
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2">
                                            <a href="{{ route('sach.show', $book->id) }}" title="{{ $book->ten_sach }}">
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
                        <span class="btn btn-sm btn-in-primary" id="btn-xem-them">Xem Thêm Truyện →</span>
                    </div>
                    <div class="load_more_tax text-center" style="display: none;">
                        <span class="btn btn-sm btn-in-primary" id="btn-an-truyen">Ẩn Truyện ←</span>
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

            // Cập nhật hiển thị sách theo trang
            function updateBooksDisplay() {
                const rows = document.querySelectorAll('#content-keyword tbody tr');
                const totalBooks = rows.length;

                rows.forEach((row, index) => {
                    if (index < booksPerPage * currentPage) {
                        row.style.display = ''; 
                    } else {
                        row.style.display = 'none'; 
                    }
                });

                // Hiển thị hoặc ẩn nút "Xem Thêm Truyện" nếu còn sách để xem
                if (booksPerPage * currentPage >= totalBooks) {
                    document.getElementById('btn-xem-them').style.display = 'none'; 
                } else {
                    document.getElementById('btn-xem-them').style.display =
                    'inline-block'; 
                }

                // Hiển thị hoặc ẩn nút "Ẩn Truyện" dựa trên trang hiện tại
                if (currentPage > 1) {
                    document.getElementById('btn-an-truyen').parentElement.style.display =
                    'block'; 
                } else {
                    document.getElementById('btn-an-truyen').parentElement.style.display =
                    'none'; 
                }
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
@endpush
