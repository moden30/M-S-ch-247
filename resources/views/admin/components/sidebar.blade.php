<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            @if ((Auth::check() && Auth::user()->hasPermission('thong-ke-chung')) || (Auth::check() && Auth::user()->hasPermission('thong-ke-chung-cong-tac-vien')) )
            <li class="menu-title"><span data-key="t-menu">Quản trị</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                   role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-bar-chart-fill"></i> <span data-key="t-dashboards">Thống Kê</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarDashboards">
                    <ul class="nav nav-sm flex-column">
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-chung'))
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link" data-key="t-analytics">
                                    Quản lý</a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('cong-tac-vien'))
                            <li class="nav-item">
                                <a href="{{ route('cong-tac-vien.index') }}" class="nav-link" data-key="t-crm">
                                    Thống kê cộng tác viên </a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-doanh-thu'))
                            <li class="nav-item">
                                <a href="{{ route('thong-ke-doanh-thu.index') }}" class="nav-link"
                                   data-key="t-ecommerce"> Thống kê doanh thu tổng</a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-loi-nhuan'))
                            <li class="nav-item">
                                <a href="{{ route('thong-ke-admin.index') }}" class="nav-link" data-key="t-thongkesachdanhgia">Thống kê lợi nhuận</a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-don-hang'))
                            <li class="nav-item">
                                <a href="{{ route('thong-ke-don-hang.thongKeDonHang') }}" class="nav-link"
                                   data-key="t-ecommerce"> Thống kê đơn hàng</a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-danh-gia'))
                            <li class="nav-item">
                                <a href="{{ route('admin.sachDanhGiaCaoNhat') }}" class="nav-link"
                                   data-key="t-thongkesachdanhgia"> Thống kê đánh giá </a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->hasPermission('thong-ke-chung-cong-tac-vien'))
                            <li class="nav-item">
                                <a href="{{ route('thong-ke-chung-cong-tac-vien.index') }}" class="nav-link"
                                   data-key="t-thongkesachdanhgia"> Hoa hồng cộng tác viên </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->
            @endif
            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Quản lý </span>
            </li>

            @if (Auth::check() && Auth::user()->hasPermission('sach-index'))

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sach" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sach">
                        <i class="ri-honour-line "></i> <span data-key="t-authentication">Quản lý sách</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sach">
                        <ul class="nav nav-sm flex-column">
                            @if (Auth::check() && Auth::user()->hasPermission('sach-index'))
                                <li class="nav-item">
                                    <a href="{{ route('sach.index') }}" class="nav-link"
                                       data-key="t-analytics">
                                        Danh sách sách</a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth::user()->hasPermission('sach-store'))
                                <li class="nav-item">
                                    <a href="{{ route('sach.create') }}" class="nav-link" data-key="t-crm">
                                        Thêm mới sách</a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth::user()->hasPermission('the-loai-index'))
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('the-loai.index') }}">
                                        <span data-key="tydonhang">Quản lý thể loại</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth()->user()->hasRole(1) || Auth()->user()->hasRole(3))
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ route('chuong.index') }}">
                                        <span data-key="t-quanlychuong">Quản lý chương</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                </li>
            @endif

            {{--                        <li class="nav-item"> --}}
            {{--                            <a class="nav-link menu-link" href="{{ route('users.index') }}"> --}}
            {{--                                <i class="ri-account-circle-line"></i> <span data-key="t-quanlytaikhoan">Thành viên</span> --}}
            {{--                            </a> --}}
            @if (Auth::check() && Auth::user()->hasPermission('users-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#quanlythanhvien" data-bs-toggle="collapse"
                       role="button" aria-expanded="false" aria-controls="quanlythanhvien">
                        <i class=" ri-profile-fill"></i> <span
                            data-key="t-authentication">Quản lý thành viên</span>
                    </a>

                    <div class="collapse menu-dropdown" id="quanlythanhvien">
                        <ul class="nav nav-sm flex-column">
                            @if (Auth::check() && Auth::user()->hasPermission('users-index'))
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link"
                                       data-key="t-analytics">
                                        Danh sách thành viên</a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth::user()->hasPermission('roles-index'))
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link"
                                       data-key="t-crm">Danh sách vai
                                        trò</a>
                                </li>
                            @endif
                            @if (Auth::check() && Auth::user()->hasPermission('roles-index'))
                                <li class="nav-item">
                                    <a href="{{ route('users.index', ['role_id' => 4]) }}" class="nav-link"
                                       data-key="t-crm">Danh sách cộng tác viên</a>
                                </li>
                            @endif

                            {{--                                    <li class="nav-item"> --}}
                            {{--                                        <a href="{{ route('chuyen-muc.index') }}" class="nav-link" data-key="t-crm">Quản lý chuyên mục</a> --}}
                            {{--                                    </li> --}}
                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->hasPermission('bai-viet-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#quanlybaiviet" data-bs-toggle="collapse"
                       role="button" aria-expanded="false" aria-controls="quanlybaiviet">
                        <i class=" ri-quill-pen-line"></i> <span data-key="t-authentication">Quản lý bài
                                    viết</span>
                    </a>
                    <div class="collapse menu-dropdown" id="quanlybaiviet">
                        <ul class="nav nav-sm flex-column">
                            @if (Auth::check() && Auth::user()->hasPermission('bai-viet-index'))
                                <li class="nav-item">
                                    <a href="{{ route('bai-viet.index') }}" class="nav-link"
                                       data-key="t-analytics">
                                        Danh sách bài viết</a>
                                </li>
                            @endif

                            @if (Auth::check() && Auth::user()->hasPermission('bai-viet-store'))
                                <li class="nav-item">
                                    <a href="{{ route('bai-viet.create') }}" class="nav-link"
                                       data-key="t-crm">
                                        Thêm
                                        mới
                                        bài viết</a>
                                </li>
                            @endif

                            @if (Auth::check() && Auth::user()->hasPermission('chuyen-muc-index'))
                                <li class="nav-item">
                                    <a href="{{ route('chuyen-muc.index') }}" class="nav-link"
                                       data-key="t-crm">Quản
                                        lý
                                        chuyên mục</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->hasPermission('lien-he-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('lien-he.index') }}">
                        <i class=" ri-mail-send-line"></i> <span data-key="t-quanlylienhe">Quản lý liên
                                    hệ</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->hasPermission('don-hang-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('don-hang.index') }}">
                        <i class=" ri-shopping-cart-line"></i> <span data-key="t-quanlydonhang">Quản lý đơn
                                    hàng</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->hasPermission('binh-luan-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('binh-luan.index') }}">
                        <i class="ri-message-3-line"></i> <span data-key="t-quanlybinhluan">Quản lý bình luận
                                </span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->hasPermission('danh-gia-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('danh-gia.index') }}">
                        <i class=" ri-star-s-line"></i> <span data-key="t-quanlydonhang">Quản lý đánh
                                    giá</span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->hasPermission('banner-index'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('banner.index') }}">
                        <i class="ri-image-2-fill"></i> <span data-key="t-quanlybanner">Quản lý banner
                                </span>
                    </a>
                </li>
            @endif

            @if (Auth::check() && Auth::user()->hasPermission('kiem-duyet-cong-tac-vien'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('kiem-duyet-cong-tac-vien') }}">
                        <i class="ri-pages-line"></i>
                        <span data-key="t-quanlybanner">Kiểm duyệt cộng tác viên</span>
                    </a>
                </li>
            @endif

            {{-- Bắt đầu phần của CTV --}}
            @if(Auth()->user()->hasRole('4'))
                <li class="menu-title"><span data-key="t-menu">Cộng tác viên</span></li>
            @endif
            @if (Auth::check() && Auth::user()->hasPermission('rut-tien'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('rut-tien.rutTien') }}">
                        <i class="ri-wallet-3-line"></i>
                        <span data-key="t-quanlybanner">Rút tiền
                            </span>
                    </a>
                </li>
            @endif
            @if (Auth::check() && Auth::user()->hasPermission('yeu-cau-rut-tien'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('yeu-cau-rut-tien.index') }}">
                        <i class="ri-money-pound-circle-line"></i>
                        <span data-key="t-quanlybanner">Yêu cầu rút tiền
                            </span>
                    </a>
                </li>
            @endif
            <li class="menu-title"><span data-key="t-menu">Khác</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('noi-quy.index') }}">
                    <i class="ri-file-list-3-line"></i>
                    <span data-key="t-quanlybanner">Quy định về nội dung
                            </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="{{ route('cau-hoi-thuong-gap.index') }}">
                    <i class="ri-questionnaire-fill"></i>
                    <span data-key="t-quanlybanner">Hỏi đáp
                            </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>
