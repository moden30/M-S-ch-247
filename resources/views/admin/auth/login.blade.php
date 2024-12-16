<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 16:54:19 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Đăng nhập trang quản trị mê sách 247</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/client/logo.png') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden card-bg-fill galaxy-border-none">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.html" class="d-block">
                                                    <img src="{{ asset('assets/admin/images/logo.png') }}"
                                                        alt="" height="55px">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">“Sách cũng giống như những người
                                                                bạn thâm tình. Rằng sách sẽ xuất hiện trong cuộc đời khi
                                                                bạn cần chúng nhất.” – Emma Thompson
                                                            </p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">“Sách là phép màu độc nhất và
                                                                diệu kỳ trong đời thực” – Stephen King</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">“Sách là món quà mà bạn có thể
                                                                mở đi mở lại nhiều lần.” – Garrison Kellor</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Chào mừng trở lại!</h5>
                                            <p class="text-muted">Đăng nhập để tiếp tục đến MeSach247.</p>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-4">
                                            <form action="{{ route('login') }}" method="post" id="loginForm">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="email" placeholder="Nhập email">
                                                </div>

                                                <div class="mb-3">
                                                    {{--                                                    <div class="float-end"> --}}
                                                    {{--                                                        <a href="auth-pass-reset-cover.html" class="text-muted">Quên mật --}}
                                                    {{--                                                            khẩu?</a> --}}
                                                    {{--                                                    </div> --}}
                                                    <label class="form-label" for="password-input">Mật khẩu</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input"
                                                            placeholder="Nhập mật khẩu" name="password"
                                                            id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <style>
                                                    .g-recaptcha {
                                                        transform: scale(0.85);
                                                        transform-origin: 0 0;
                                                    }
                                                </style>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Captcha</label>
                                                    {!! NoCaptcha::renderJs() !!}
                                                    {!! NoCaptcha::display() !!}
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Nhớ tôi
                                                        nhé</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Đăng
                                                        Nhập</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Nếu không đăng nhập được hãy liên
                                                            hệ chúng tôi</h5>
                                                    </div>

                                                    <div>
                                                        <a target="_blank"
                                                            href="https://www.facebook.com/profile.php?id=100030410919087&sk=about"
                                                            class="btn btn-info btn-icon waves-effect waves-light"><i
                                                                class="ri-facebook-fill fs-16"></i></a>
                                                        <a href="mailto:mesach247@gmail.com"
                                                            class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                                class="ri-mail-line fs-16"></i></a>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">>------------------------------------------------------<
                                                    </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer galaxy-border-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> MeSach247. <i class="mdi mdi-heart text-danger"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script>
        const emailInput = document.getElementById('username');
        const rememberMeCheckbox = document.getElementById('auth-remember-check');
        const loginForm = document.getElementById('loginForm');

        // Khi trang tải, kiểm tra xem có email đã lưu hay không
        window.onload = function() {
            const savedEmail = localStorage.getItem('savedEmail');
            if (savedEmail) {
                emailInput.value = savedEmail;
                rememberMeCheckbox.checked = true; // Tự động tick checkbox
            }
        };

        // Xử lý khi người dùng submit form đăng nhập
        loginForm.onsubmit = function(event) {
            if (rememberMeCheckbox.checked) {
                // Nếu người dùng muốn lưu thông tin, lưu email vào localStorage
                localStorage.setItem('savedEmail', emailInput.value);
            } else {
                // Nếu không, xóa email đã lưu trước đó
                localStorage.removeItem('savedEmail');
            }
        };
    </script>


    <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins.js') }}"></script>

    <!-- password-addon init -->
    <script src="{{ asset('assets/admin/js/pages/password-addon.init.js') }}"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 16:54:19 GMT -->

</html>
