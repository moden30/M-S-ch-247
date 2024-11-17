<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt=""
                                     height="17">
                            </span>
                    </a>

                    <a target="_blank" href="{{route('home')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="17">
                            </span>
                    </a>
                </div>

                <button type="button"
                        class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    {{--                        <div class="position-relative">--}}
                    {{--                            <input type="text" class="form-control" placeholder="Tìm kiếm..." autocomplete="off"--}}
                    {{--                                   id="search-options" value="">--}}
                    {{--                            <span class="mdi mdi-magnify search-widget-icon"></span>--}}
                    {{--                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"--}}
                    {{--                                  id="search-close-options"></span>--}}
                    {{--                        </div>--}}
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to
                                    setup <i class="mdi mdi-magnify ms-1"></i></a>
                                <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons
                                    <i class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/user/avatar-2.jpg') }}"
                                             class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/user/avatar-3.jpg') }}"
                                             class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/admin/images/user/avatar-5.jpg') }}"
                                             class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All
                                Results <i class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button"
                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                           aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                            data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                    <button type="button"
                            class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-bell fs-22'></i>
                        @if($tong > 0)
                            <span
                                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
                                    {{ $tong }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-notifications-dropdown">

                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"> Thông Báo </h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                        @if($tong > 0)
                                            <span
                                                class="badge bg-light text-body fs-13">{{ $tong }} Thông Báo Mới</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="px-2 pt-2">
                                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                    id="notificationItemsTab" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#alerts-tab"
                                           role="tab" aria-selected="false">
                                            Tất cả
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#all-noti-tab"
                                           role="tab" aria-selected="true">
                                            Sách ({{ $tongTBS }})
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-tab"
                                           role="tab" aria-selected="false">
                                            Tiền ({{ $tongTBT }})
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="tab-content position-relative" id="notificationItemsTabContent">
                            {{-- Tab thông báo CTV --}}
                            <div class="tab-pane fade active show p-4" id="alerts-tab" role="tabpanel"
                                 aria-labelledby="alerts-tab">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    @if($notificationCTV->isEmpty())
                                        <p>Không có thông báo nào về đăng ký cộng tác viên</p>
                                    @else
                                        <div id="notification-list-tien">
                                            @foreach($notificationCTV as $index => $notification)
                                                <div
                                                    class="text-reset notification-item d-block dropdown-item position-relative {{ $notification->trang_thai == 'da_xem' ? 'custom-status' : '' }}"
                                                    data-notification-id="{{ $notification->id }}"
                                                    style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                                            <span
                                                                class="avatar-title bg-info-subtle {{ $notification->trang_thai == 'da_xem' ? 'text-success' : 'text-info' }} rounded-circle fs-16">
                                                                <i class="bx bx-user-plus"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            @if(isset($notification->url))
                                                                <a href="{{ $notification->url }}"
                                                                   class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                </a>
                                                            @else
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                            @endif
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase d-flex justify-content-between text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                <span><i
                                                                        class="{{ $notification->trang_thai == 'da_xem' ? 'ri-checkbox-circle-fill' : ' ri-error-warning-fill' }}"></i> {{ $notification->trang_thai == 'da_xem' ? 'Đã xem' : 'Chưa xem' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="my-3 text-center view-all">
                                        <p>Hết</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab thông báo sách -->
                            <div class="tab-pane fade py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    @if($notificationsSach->isEmpty())
                                        <p>Không có thông báo nào về sách</p>
                                    @else
                                        <div id="notification-list-sach">
                                            @foreach($notificationsSach as $index => $notification)
                                                <div
                                                    class="text-reset notification-item d-block dropdown-item position-relative {{ $notification->trang_thai == 'da_xem' ? 'custom-status' : '' }}"
                                                    data-notification-id="{{ $notification->id }}"
                                                    style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                    <span
                                        class="avatar-title bg-info-subtle {{ $notification->trang_thai == 'da_xem' ? 'text-success' : 'text-info' }} rounded-circle fs-16">
                                        <i class=" bx bx-book"></i>
                                    </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            @if(isset($notification->url))
                                                                <a href="{{ $notification->url }}"
                                                                   class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                </a>
                                                            @else
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                            @endif
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted d-flex justify-content-between">
                                                                <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                <span><i
                                                                        class="{{ $notification->trang_thai == 'da_xem' ? 'ri-checkbox-circle-fill' : ' ri-error-warning-fill' }}"></i> {{ $notification->trang_thai == 'da_xem' ? 'Đã xem' : 'Chưa xem' }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="my-3 text-center view-all">
                                        <p>Hết</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab thông báo tiền -->
                            <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    @if($notificationsTien->isEmpty())
                                        <p>Không có thông báo nào về tiền</p>
                                    @else
                                        <div id="notification-list-tien">
                                            @foreach($notificationsTien as $index => $notification)
                                                <div
                                                    class="text-reset notification-item d-block dropdown-item position-relative {{ $notification->trang_thai == 'da_xem' ? 'custom-status' : '' }}"
                                                    data-notification-id="{{ $notification->id }}"
                                                    style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                    <div class="d-flex">
                                                        <div class="avatar-xs me-3 flex-shrink-0">
                                    <span
                                        class="avatar-title bg-info-subtle {{ $notification->trang_thai == 'da_xem' ? 'text-success' : 'text-info' }} rounded-circle fs-16">
                                        <i class="bx bx-money"></i>
                                    </span>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            @if(isset($notification->url))
                                                                <a href="{{ $notification->url }}"
                                                                   class="stretched-link">
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                </a>
                                                            @else
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                            @endif
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase d-flex justify-content-between text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                <span><i
                                                                        class="{{ $notification->trang_thai == 'da_xem' ? 'ri-checkbox-circle-fill' : ' ri-error-warning-fill' }}"></i> {{ $notification->trang_thai == 'da_xem' ? 'Đã xem' : 'Chưa xem' }}</span>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="my-3 text-center view-all">
                                        <p>Hết</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                @if (auth()->check())
                                    <img style="object-fit: cover" class="rounded-circle header-profile-user"
                                         src="{{ auth()->user()->hinh_anh ? Storage::url(auth()->user()->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                         alt="Header Avatar">
                                @endif

                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                        @if (auth()->check())
                                            {{ auth()->user()->ten_doc_gia }}
                                        @endif
                                    </span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                        @if (auth()->check())
                                            <!-- Lặp qua các vai trò và hiển thị tên vai trò -->
                                            @foreach (auth()->user()->vai_tros as $vaiTro)
                                                {{ $vaiTro->ten_vai_tro }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>
                                </span>
                            </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Chào mừng @if (auth()->check())
                                {{ auth()->user()->ten_doc_gia }}
                            @endif
                        </h6>
                        <a class="dropdown-item"
                           href="{{ route('users.showProfile', ['user' => auth()->user()->id]) }}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Hồ sơ</span></a>
                        <a class="dropdown-item" href="{{ route('faqs.index') }}"><i
                                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Giúp đỡ</span></a>
                        <div class="dropdown-divider"></div>
                        @if(auth()->user()->hasRole('4'))
                            <a class="dropdown-item" href="{{ route('rut-tien.rutTien') }}"><i
                                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Ví : <b>{{ number_format(auth()->user()->so_du) }} VNĐ</b></span></a>
                        @endif
                        <a class="dropdown-item"
                           href="#" data-bs-toggle="offcanvas"
                           data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"><span
                                class="badge bg-success-subtle text-success mt-1 float-end"></span><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Cài đặt</span></a>
                        {{-- <div class="customizer-setting d-none d-md-block">
                            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2">
                                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
                            </div>
                        </div> --}}
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Đăng xuất</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
