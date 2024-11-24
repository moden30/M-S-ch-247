<style>
    .bell-icon-wrapper {
        position: relative;
        display: flex;
        opacity: 80%;
        justify-content: center;
        align-items: center;
        width: 45px; /* Kích thước của khung hình tròn */
        height: 45px; /* Kích thước của khung hình tròn */
        border-radius: 50%; /* Làm tròn khung */
        font-size: 15px; /* Kích thước của icon */
        padding: 5%;
    }

    .count {
        height: 44%;
        width: 44%;
        position: absolute;
        top: -1%;
        right: 3px;
        background-color: red;
        color: white;
        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>

<header class="header" style="margin-bottom: 100px;">
    <div class="container">
        <div class="top-row" style="padding-top: 0.5%">
            <h1><a class="header-logo" href="{{ route('home') }}" title="Mê Sách 247">Mê Sách 247</a></h1>

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
                <div class="col-btn-home-icon me-5" id="tab_home_2" style="padding-top: 0.4%">
                    <div style="display: flex;justify-content: space-around;align-items: center;width: 160%">
                        <a id="notificationLink" style="margin-right: 20%"
                           href="@auth
                            @else
                                {{ route('cli.auth.login') }}
                            @endauth" onmouseover="showModal()" onmouseout="hideModal()">
                            <div class="bell-icon-wrapper" data-value="tab_home_2">
                                <img style="width:100%;height: auto"
                                     src="{{asset('assets\gif\notification\icons8-bell.gif')}}"
                                     alt="" id="cli-bell-to-bounce">
                                <div class="count">
                                    <span class="" id="notification-count">{{ $countThongBaos }}</span>
                                </div>
                            </div>
                        </a>
                        <a style="margin-right: 20%" href="@auth {{ route('client.yeu-thich.index') }}
                        @else
                            {{ route('cli.auth.login') }}
                        @endauth">
                            <div class="bell-icon-wrapper" data-value="tab_home_2">
                                <img style="width: 80%;height: auto"
                                     src="{{asset('assets\gif\notification\icons8-heart.gif')}}" alt="">
                                <div class="count">
                                    <span class="" id="notification-count">{{ $countYeuThichs }}</span>
                                </div>

                            </div>
                        </a>
                    </div>


                </div>

                <div style="margin-left: 40px;padding-top: 0.6%">
                    @auth
                        <li style="list-style-type: none;" class="dropdown close">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="true">
                                <img
                                    src="{{ auth()->user()->hinh_anh ? Storage::url(auth()->user()->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                    class="user-avatar">
                                <span id="user_display_name">{{ auth()->user()->ten_doc_gia }}</span>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" id="d_u">
                                <li id="d_u_login"><a href="{{ route('trang-ca-nhan') }}"><i class="fa fa-user"></i>
                                        Trang cá nhân</a></li>
                                @if(Auth()->check() && auth()->user()->hasRole(4) || auth()->user()->hasRole(1))
                                    <li><a target="_blank" href="{{ route('sach.create') }}"><i class="fa fa-upload"></i> Đăng Sách</a>
                                    </li>
                                    <li><a target="_blank" href="{{ route('sach.index') }}"><i class="fa fa-list-alt"></i> Quản Lý
                                            Sách</a></li>
                                @endif
                                {{--                            <li><a href="/user/tin-nhan/#h1"><i class="fa fa-envelope"></i> Tin Nhắn</a></li>--}}
                                {{--                            <li><a href="/user/deposit#h1"><i class="fa fa-money"></i> Nạp Vàng</a></li>--}}
                                <li>
                                    <a href="#"
                                       onclick="handleLogout(event)">
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
                                <a href="{{ route('cli.auth.showLoginForm') }}" style="color: rgb(0, 0, 0);">Đăng
                                    nhập</a>
                                {{--                            <a href="{{ route('cli.auth.showLoginForm') }}" style="color: rgb(0, 0, 0);">Đăng ký</a>--}}
                            </div>
                        </li>
                    @endauth
                </div>
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
                            <li><a href="{{route('phuc-loi-tac-gia')}}"><span class="fa fa-gift" aria-hidden="true"></span> Phúc lợi</a></li>
                            <li><a href="{{ route('xep-hang-tac-gia') }}"><span class="fa fa-sellsy" aria-hidden="true"></span> Bảng Xếp Hạng</a></li>
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

<script>
    function handleLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Bạn muốn rời đi bây giờ sao😭',
            html: '<img src="{{ asset('assets/gif/khoc.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;">',
            showCancelButton: true,
            confirmButtonText: 'Đăng xuất',
            cancelButtonText: 'Hủy',
            reverseButtons: true,
            customClass: {
                popup: 'swal-popup-large-3'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

</script>
<script>
    // Modal thông báo
    function showModal() {
        var link = document.getElementById('notificationLink');
        var modal = document.getElementById('notificationModal');

        var rect = link.getBoundingClientRect();

        modal.style.top = (rect.bottom + window.scrollY) + "px";
        var modalWidth = modal.offsetWidth;  // Get the width of the modal
        var linkWidth = link.offsetWidth;  // Get the width of the link element
        modal.style.left = (rect.left + linkWidth / 2 - modalWidth / 2) + "px";
        modal.style.display = 'block';
    }

    function hideModal() {
        var link = document.getElementById('notificationLink');
        var modal = document.getElementById('notificationModal');

        var linkHovered = !link.matches(':hover');
        var modalHovered = !modal.matches(':hover');

        if (linkHovered && modalHovered) {
            modal.style.display = 'none';
        }
    }

    document.getElementById('notificationLink').addEventListener('mouseover', showModal);
    document.getElementById('notificationLink').addEventListener('mouseout', hideModal);
    document.getElementById('notificationModal').addEventListener('mouseover', showModal);
    document.getElementById('notificationModal').addEventListener('mouseout', hideModal);

</script>
<style>
    .modal-body {
        max-height: 400px; /* Giới hạn chiều cao nội dung */
        overflow-y: scroll; /* Cho phép cuộn dọc */
    }
    /* Thanh cuộn modal */
    #notificationModal::-webkit-scrollbar {
        display: none; /* Ẩn thanh cuộn */
    }
    #notificationModal .modal-body::-webkit-scrollbar {
        display: none; /* Ẩn thanh cuộn */
    }
    #notificationModal::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.3);
    }
    #notificationModal::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    #notificationModal::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Giới hạn chiều cao nội dung và cho phép cuộn */

</style>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .notification-item a:hover {
        background-color: #606266; /* Optional background color change on hover */
        border-radius: 8px;
    }

    .notification-item p,
    .notification-item span {
        opacity: 0.6;
    }

    /* Giới hạn h4 chỉ hiển thị 1 dòng */
    .notification-item h4 {
        font-size: 18px;
        overflow: hidden;          /* Ẩn phần vượt quá */
        text-overflow: ellipsis;   /* Hiển thị dấu "..." nếu bị cắt */
        white-space: nowrap;       /* Không xuống dòng */
    }

    /* Giới hạn p chỉ hiển thị 2 dòng */
    .notification-item p {
        overflow: hidden;          /* Ẩn phần vượt quá */
        text-overflow: ellipsis;   /* Hiển thị dấu "..." nếu bị cắt */
        display: -webkit-box;      /* Sử dụng flexbox kiểu cũ để giới hạn số dòng */
        -webkit-line-clamp: 2;     /* Giới hạn số dòng */
        -webkit-box-orient: vertical;  /* Hướng của box là theo chiều dọc */
        line-height: 1.5;           /* Thiết lập chiều cao dòng để tính dòng */
        max-height: 3em;           /* Giới hạn chiều cao của 2 dòng */
    }


    .swal-popup-large-3 {
        width: 450px;
        max-width: 90%;
        height: auto;
        font-size: 12px;
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

