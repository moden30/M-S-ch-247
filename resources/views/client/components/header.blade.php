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
                                <li class="col-xs-6 col-sm-4 col-md-4">
                                    <a href="{{ route('the-loai', ['id' => $item->id]) }}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $item->ten_the_loai }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Bài Viết<span class="caret"></span>
                        </a>
                        <ul class="multi-column dropdown-menu row" role="menu">
                            @foreach ($baiviet as $item)
                                <li class="col-xs-6 col-sm-4 col-md-4">
                                    <a href="{{ route('bai-viet', ['id' => $item->id]) }}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $item->tieu_de }}
                                    </a>
                                </li>
                            @endforeach
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
