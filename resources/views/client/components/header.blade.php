<div class="container" >
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle
                        navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span> </button>
                <h1><a class="header-logo" href="{{ route('home') }}" title="Đọc Truyện">Doc Truyen</a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">Danh Sách <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('tim-kiem') }}"><span class="fa fa-search"></span> Tìm Kiếm Nâng
                                    Cao</a></li>
                            <li><a href="rank/index.html"><i class="fa fa-free-code-camp" aria-hidden="true"></i>
                                    Bảng Xếp Hạng</a></li>
                            <li><a href="truyen-sang-tac/index.html"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i> Truyện Sáng Tác</a></li>
                            <li><a href="truyen-dich/index.html"><i class="fa fa-language" aria-hidden="true"></i>
                                    Truyện Dịch/Edit</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">Thể Loại<span
                                class="caret"></span></a>
                        <ul class="multi-column dropdown-menu row" role="menu">
                            @foreach ($theLoais as $item)
                                <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/xuyen-nhanh/index.html"><i
                                            class="fa fa-angle-double-right"
                                            aria-hidden="true"></i>{{ $item->ten_the_loai }}</a>
                                </li>
                            @endforeach

                            {{-- <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/bach-hop/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Bách Hợp <i
                                        class="fa fa-venus-double c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/can-dai/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Cận Đại</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/co-dai/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Cổ Đại</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/di-gioi/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Dị Giới</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/di-nang/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Dị Năng</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/huyen-huyen/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Huyền Huyễn <i
                                        class="fa fa-magic c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/hai-huoc/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Hài Hước</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/hac-bang/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Hắc Bang</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/he-thong/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Hệ Thống <i
                                        class="fa fa-universal-access c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/khoa-huyen/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Khoa Huyễn <i
                                        class="fa fa-space-shuttle c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/kiem-hiep/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Kiếm Hiệp</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/ky-huyen/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Kỳ Huyễn</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/linh-di/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Linh Dị</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/mat-the/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Mạt Thế</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/ngon-tinh/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Ngôn Tình <i
                                        class="fa fa-heartbeat c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/nguoc/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Ngược</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/nu-cuong/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Nữ Cường</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/nu-phu/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Nữ Phụ</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/phuong-tay/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Phương Tây</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/quan-nhan/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Quân Nhân</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/showbiz/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Showbiz</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/sung/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Sủng <i
                                        class="fa fa-heartbeat c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="{{ route('the-loai') }}"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Tiên Hiệp</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/trinh-tham/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Trinh Thám</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/teen/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Truyện Teen <i
                                        class="fa fa-child c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/trong-sinh/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Trọng Sinh</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/tuong-lai/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Tương Lai</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/tong-tai/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Tổng Tài</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/vong-du/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Võng Du <i
                                        class="fa fa-gamepad c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/vuon-truong/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Vườn Trường</a>
                            </li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/xuyen-khong/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Xuyên Không <i
                                        class="fa fa-history c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/xuyen-nhanh/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Xuyên Nhanh</a>
                            </li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/dam-my/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Đam Mỹ <i
                                        class="fa fa-mars-double c-d-d" aria-hidden="true"></i></a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/dien-van/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Điền Văn</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/do-thi/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Đô Thị</a></li>
                            <li class="col-xs-6 col-sm-4 col-md-4"><a href="keyword/dong-nhan/index.html"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i> Đồng Nhân <i
                                        class="fa fa-bullseye c-d-d" aria-hidden="true"></i></a></li> --}}
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form action="https://truyenhdt.com/tim-kiem/" method="get" class="navbar-form navbar-left"
                        role="search">
                        <div class="form-group"> <input class="form-control" name="title" type="text" value
                                placeholder="Nhập Tên Truyện..." aria-label role="search" /> <input
                                class="btn btn-primary" type="submit" value="Tìm kiếm" role="search" /> </div>
                    </form>

                    @auth
                        <li class="dropdown close"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="true"> <span
                                    id="user_display_name">{{ auth()->user()->ten_doc_gia }} </span> <span
                                    class="fa fa-user"></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" id="d_u">
                                <li id="d_u_login"><a href="{{ route('trang-ca-nhan') }}"><i class="fa fa-user"></i>
                                        Profile</a></li>
                                <li><a href="/user/dang-truyen"><i class="fa fa-upload"></i> Đăng Truyện</a></li>
                                <li><a href="/user/quan-ly-truyen/?q=1#h1"><i class="fa fa-list-alt"></i> Quản Lý
                                        Truyện</a></li>
                                <li><a href="/user/tin-nhan/#h1"><i class="fa fa-envelope"></i> Tin Nhắn</a></li>
                                <li><a href="/user/deposit#h1"><i class="fa fa-money"></i> Nạp Vàng</a></li>
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); if (confirm('Bạn muốn đăng xuất ?')) document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Đăng xuất
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        </li>
                    @else
                        <div>
                            <a href="#">Đăng nhập</a>
                            <a href="#">Đăng ký</a>
                        </div>
                    @endauth


                </ul>
            </div>
        </div>
    </nav>
</div>
