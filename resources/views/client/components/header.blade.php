<style>
    .bell-icon-wrapper {
        position: relative;
        display: inline-block;
        background-image: url("{{asset('assets/client/bell-ring.png')}}") '
    }

    .bell-icon-wrapper .fa {
        position: relative;
        font-size: 24px;
    }

    .count {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 1px 7px;
        font-size: 12px;
        font-weight: bold;
        border: white 1px solid;
    }

</style>

<header class="header" style="margin-bottom: 100px;">
    <div class="container">
        <div class="top-row">

            <h1><a class="header-logo" href="{{ route('home') }}" title="Đọc Truyện">Doc Truyen</a></h1>
            
            <div>

                <div class="search-container">
                    <input type="text" name="query" placeholder="Nhập tên sách, tên tác giả, thể loại"
                           class="search-box" id="search-input" autocomplete="off">
                    <button class="search-btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
                <ul id="suggestions-list" class="suggestions-list"></ul>
            </div>
            <style>
                .suggestions-list {
                    position: absolute;
                    background-color: white;
                    border: 1px solid #ddd;
                    max-height: 200px;
                    overflow-y: auto;
                }
            </style>


            <div class="user-info d-flex">
                <div class="col-btn-home-icon me-5" id="tab_home_2">
                    <div class="d-flex" style="position: relative;left: -40px">
                        <a style="position: relative; left: -45%"
                           href="@auth {{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}
                            @else
                                {{ route('dang-nhap') }}
                            @endauth">
                            <div class="bell-icon-wrapper" data-value="tab_home_2">
                                <i class="fa-regular fa-bell fa-lg" aria-hidden="true">
                                    <span class="badge count" id="notification-count">{{ $countThongBaos }}</span>
                                </i>
                            </div>
                        </a>
                        <a href="@auth {{ route('client.yeu-thich.index') }}
                        @else
                            {{ route('dang-nhap') }}
                        @endauth">
                            <div class="bell-icon-wrapper" data-value="tab_home_2">
                                <i class="fa-regular fa-heart fa-lg" style="color: #0a0a0a" aria-hidden="true">
                                    <span class="badge count" id="notification-count">{{ $countYeuThichs }}</span>
                                </i>
                            </div>
                        </a>

                    </div>
                </div>

                @auth
                    <li style="list-style-type: none;" class="dropdown close">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                            <img src="{{ auth()->user()->hinh_anh ? Storage::url(auth()->user()->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}" class="user-avatar">
                            <span id="user_display_name">{{ auth()->user()->ten_doc_gia }}</span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" id="d_u">
                            <li id="d_u_login"><a href="{{ route('trang-ca-nhan') }}"><i class="fa fa-user"></i>
                                    Profile</a></li>
                            @if(Auth()->check() && auth()->user()->hasRole(4) || auth()->user()->hasRole(1))
                                <li><a href="{{ route('sach.create') }}"><i class="fa fa-upload"></i> Đăng Sách</a></li>
                                <li><a href="{{ route('sach.index') }}"><i class="fa fa-list-alt"></i> Quản Lý
                                        Sách</a></li>
                            @endif
                            {{--                            <li><a href="/user/tin-nhan/#h1"><i class="fa fa-envelope"></i> Tin Nhắn</a></li>--}}
                            {{--                            <li><a href="/user/deposit#h1"><i class="fa fa-money"></i> Nạp Vàng</a></li>--}}
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault(); if (confirm('Bạn muốn đăng xuất ?')) document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Đăng xuất
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('cli.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </ul>
                    </li>
                @else
                    <li style="list-style-type: none;" class="ms-3">
                        <div style="padding-top: 13%">
                            <a href="{{ route('cli.auth.showLoginForm') }}" style="color: rgb(0, 0, 0);">Đăng nhập</a>
                            {{--                            <a href="{{ route('cli.auth.showLoginForm') }}" style="color: rgb(0, 0, 0);">Đăng ký</a>--}}
                        </div>
                    </li>
                @endauth
            </div>

        </div>

        <hr style="margin-bottom: 2px;">


        <div class="bottom-row">
            <div class="bttom-trai">
                <nav class="d-flex">
                    <li style="list-style-type: none;" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars" aria-hidden="true"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('tim-kiem-sach') }}"><span class="fa fa-search"></span> Tìm Kiếm Nâng
                                    Cao</a></li>
                            {{--                            <li><a href="truyen-sang-tac/index.html"><i class="fa fa-pencil-square-o"--}}
                            {{--                                        aria-hidden="true"></i> Truyện Sáng Tác</a></li>--}}
                            {{--                            <li><a href="truyen-dich/index.html"><i class="fa fa-language" aria-hidden="true"></i>--}}
                            {{--                                    Truyện Dịch/Edit</a></li>--}}
                        </ul>
                    </li>

                    <li style="list-style-type: none;" class="dropdown"><a href="#" class="dropdown-toggle"
                                                                           data-toggle="dropdown" role="button"
                                                                           aria-haspopup="true" aria-expanded="false">Thể
                            Loại<span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach ($theLoais as $item)
                                <li class="dropdown-submenu">
                                    <a href="{{ route('the-loai', ['id' => $item->id]) }}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        {{ $item->ten_the_loai }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                    <li style="list-style-type: none;" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            Chuyên Mục <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($chuyenMucs as $chuyenMucCha)
                                <li class="dropdown-submenu">
                                    <a href="{{ route('chuyen-muc.filter', $chuyenMucCha->id) }}"
                                       data-id="{{ $chuyenMucCha->id }}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        {{ $chuyenMucCha->ten_chuyen_muc }}
                                    </a>

                                    @if ($chuyenMucCha->chuyenMucCons->count() > 0)
                                        <ul class="dropdown-menu">
                                            @foreach ($chuyenMucCha->chuyenMucCons as $chuyenMucCon)
                                                <li class="dropdown-submenu">
                                                    <a href="{{ route('chuyen-muc.filter', $chuyenMucCon->id) }}"
                                                       data-id="{{ $chuyenMucCon->id }}">
                                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                        {{ $chuyenMucCon->ten_chuyen_muc }}
                                                    </a>

                                                    @if ($chuyenMucCon->chuyenMucCons->count() > 0)
                                                        <ul class="dropdown-menu">
                                                            @foreach ($chuyenMucCon->chuyenMucCons as $chuyenMucConCon)
                                                                <li>
                                                                    <a href="{{ route('chuyen-muc.filter', $chuyenMucConCon->id) }}"
                                                                       data-id="{{ $chuyenMucConCon->id }}">
                                                                        <i class="fa fa-angle-right"
                                                                           aria-hidden="true"></i>
                                                                        {{ $chuyenMucConCon->ten_chuyen_muc }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <a href="{{ route('tim-kiem-sach') }}" class="nav-link">Danh sách</a>

                    <a href="{{route('phuc-loi-tac-gia')}}" class="nav-link">Phúc lợi</a>
                    <a href="{{ route('xep-hang-tac-gia') }}">Bảng Xếp Hạng</a>

                </nav>
            </div>
            <div class="bottom-trai">
                <ul class="navbar-nav">
                    <li style="list-style-type: none;" class="nav-item">
                        <a class="nav-link" href="{{ route('hoi-dap') }}">
                            <i class="iconfont icon-help"></i> <!-- Giữ icon cũ nếu nó đã đúng -->
                            <i class="fa fa-question-circle"></i> Hỏi đáp <!-- Thêm icon hỏi chấm -->
                        </a>
                    </li>
                    <li style="list-style-type: none;" class="nav-item">
                        <a class="nav-link " href="{{ route('hop-dong') }}">
                            <i class="iconfont icon-upload"></i> <!-- Giữ icon cũ nếu nó đã đúng -->
                            <i class="fa fa-book"></i> Đăng ký cộng tác viên <!-- Thêm icon quyển sách -->
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</header>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header {
        background-color: #ffffff;
        border-bottom: 1px solid #ccc;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        /* Đảm bảo header luôn nằm trên các phần tử khác */
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        /* Thêm đổ bóng */
    }

    .bell-icon-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px; /* Kích thước của khung hình tròn */
        height: 40px; /* Kích thước của khung hình tròn */
        background-image: url({{asset("public/assets/client/bell-ring.png")}}) !important;
        color: rgb(17, 16, 16); /* Màu của icon */
        border-radius: 50%; /* Làm tròn khung */
        font-size: 15px; /* Kích thước của icon */
    }

    .fa-bell {
        color: inherit; /* Kế thừa màu từ parent */
    }

    .user-avatar {
        width: 40px;
        /* Kích thước của ảnh đại diện */
        height: 40px;
        /* Kích thước của ảnh đại diện */
        border-radius: 50%;
        /* Làm tròn ảnh */
        object-fit: cover;
        /* Đảm bảo ảnh được phủ kín */
        margin-right: 5px;
        /* Khoảng cách giữa ảnh và tên độc giả */
    }

    .search-box::placeholder {
        color: #b4b3b3;
        /* Màu xám nhạt cho placeholder */
    }


    .top-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px
    }

    .bottom-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    .bottom-row nav {
        display: flex;
        justify-content: space-around;
        /* Điều chỉnh này sẽ phân bổ đều các liên kết trên toàn bộ chiều ngang của nav */
        align-items: center;
        /* Căn giữa các liên kết theo chiều dọc */
    }

    .nav-link,
    .dropdown-toggle {
        font-size: 15px;
        /* Tăng kích thước chữ */
        padding-right: 20px;
        /* Thêm padding để tạo khoảng cách và kích thước vùng nhấp chuột */
        text-decoration: none;
        /* Loại bỏ gạch chân */
        color: #333;
        /* Đặt màu chữ, thay đổi theo yêu cầu của bạn */
        white-space: nowrap;
        /* Giữ cho chữ không bị wrap nếu không gian hẹp */
    }

    .dropdown {
        position: relative;
        /* Đặt vị trí tương đối cho dropdown để vị trí của menu được xác định dựa trên thẻ li này */
    }

    .dropdown-menu {
        position: absolute;
        /* Menu xổ xuống sẽ được định vị tuyệt đối so với thẻ li cha */
        top: 100%;
        /* Đặt menu ngay dưới thẻ li */
        left: 0;
        background-color: #fff;
        /* Nền trắng cho menu */
        border: 1px solid #ccc;
        /* Viền cho menu */
        border-radius: 5px;
        /* Bo góc cho menu */
        width: auto;
        /* Chiều rộng tự động theo nội dung */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        /* Thêm bóng cho menu */
        z-index: 1000;
    }

    .dropdown-menu li a {
        padding: 8px 15px;
        /* Padding cho các liên kết trong menu */
        display: block;
        /* Đảm bảo liên kết chiếm toàn bộ chiều rộng của li */
    }

    .special {
        color: #FF5722;
        /* Màu nổi bật cho liên kết đặc biệt, thay đổi theo yêu cầu của bạn */
    }

    .logo-container .logo {
        height: 40px;
    }

    .search-container {
        display: flex;
        border: 1px solid #dfdfdf;
        /* Màu viền xanh */
        align-items: center;
        border-radius: 4px;
        /* Bo góc */
        background-color: #ffffff;
        /* Màu nền xám nhạt cho container */

    }

    .search-box {
        border: none;
        outline: none;
        padding: 10px;
        width: 500px;
        font-size: 13px;
        /* Kích thước chữ */
        background-color: transparent;
        /* Nền trong suốt cho input */
        height: 40px;
        /* Chiều cao của search box */

    }


    .search-btn {
        background-color: #007BFF;
        /* Màu nền xanh cho nút */
        color: white;
        /* Màu chữ trắng */
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
        /* Bo góc cho nút: không bo ở góc trái, bo ở góc phải */
        height: 40px;
        /* Đặt chiều cao bằng với search box */
    }

    .search-btn:hover {
        background-color: #0056b3;
        /* Màu nền khi hover cho nút */
    }


    .author-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .user-container .user-info {
        margin-left: 10px;
    }

    .nav-link {
        margin: 0 10px;
        color: black;
        text-decoration: none;
    }

    .special {
        color: green;
        font-weight: bold;
    }
</style>

