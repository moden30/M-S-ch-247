<div id="layout-wrapper">
    <!-- Header -->
    @include('admin.components.header')
    <!-- End Header -->

    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.jso)}}" trigger="loop"
                                   colors="primary:#f7b84b,secondary:#f06548"
                                   style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                            It!
                        </button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a target="_blank" href="{{route('home')}}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="40">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div class="dropdown sidebar-user m-1 rounded">
            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center gap-2">
                    <img class="rounded header-profile-user"
                         src="{{ asset('assets/admin/images/user/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="text-start">
                        <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                        <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                                class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                                class="align-middle">Online</span></span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome Anna!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="apps-chat.html"><i
                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Messages</span></a>
                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Taskboard</span></a>
                <a class="dropdown-item" href="pages-faqs.html"><i
                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Help</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Balance : <b>$5971.67</b></span></a>
                <a class="dropdown-item" href="pages-profile-settings.html"><span
                        class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Settings</span></a>
                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                        screen</span></a>
                <a class="dropdown-item" href="auth-logout-basic.html"><i
                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                                                                                             data-key="t-logout">Logout</span></a>
            </div>
        </div>

        <!-- Sidebar -->
        @include('admin.components.sidebar')
        <!-- Sidebar -->

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div
                            class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">@yield('title')</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('start-point')</a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © MeSach247
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            MeSach247
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>

<script>
    let currentCount = 5; // Số lượng thông báo đã hiển thị
    const incrementCount = 5; // Số lượng thông báo mỗi lần hiển thị thêm

    function viewMore(type, totalNotifications) {
        const notificationList = document.getElementById(`notification-list-${type}`);
        const notifications = notificationList.getElementsByClassName('notification-item');

        for (let i = currentCount; i < currentCount + incrementCount && i < totalNotifications; i++) {
            notifications[i].style.display = 'block'; // Hiển thị thêm thông báo
        }

        currentCount += incrementCount; // Cập nhật số lượng đã hiển thị

        // Ẩn nút "Xem Thêm" nếu không còn thông báo nào để hiển thị
        if (currentCount >= totalNotifications) {
            document.getElementById(`view-more-btn-${type}`).style.display = 'none';
        }
    }
</script>
<style>
    .custom-status {
        opacity: 0.7;
    }
</style>
