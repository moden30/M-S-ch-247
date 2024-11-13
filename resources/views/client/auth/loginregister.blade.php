<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập / Đăng ký</title>
    <meta property="og:title" content="Đăng nhập / Đăng ký">
    <meta name="robots" content="noindex, nofollow"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://demo.nqtcomics.site/assets/css/styleLoginSignup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
</head>

<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form class="sign-in-form" autocomplete="off">
                @csrf
                <h2 class="title">Đăng nhập</h2>
                @include('client.auth.customer.svg-container-login-register')
                <ul class="error-sign-in error"></ul>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off"/>
                    <span class="indicator"></span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password"
                           autocomplete="off"/>
                </div>
                <div class="d-flex">
                    <input type="submit" value="Đăng nhập" class="btn solid"/>
                    <input type="button" value="Quên mật khẩu" class="btn" id="forgot-password-btn"
                           style="background-color: rgb(219, 194, 0)"/>
                </div>
                <a href="{{ route('home') }}" class="social-text"
                   style="text-decoration:none; padding-bottom:0 !important;">Quay lại trang chủ</a>
            </form>


            <form class="sign-up-form" autocomplete="off">
                <h2 class="title">Đăng ký</h2>
                <ul class="error-sign-up error"></ul>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Tên của bạn" id="name-signup" autocomplete="off"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" id="email-signup" autocomplete="off"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mật khẩu" id="password-signup" autocomplete="off"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Nhập lại mật khẩu" id="password_confirmation"
                           autocomplete="off"/>
                </div>
                <input type="submit" class="btn" value="Đăng ký"/>
            </form>


            <form class="forgot-password-form" style="display: none;" method="post" autocomplete="on">
                @csrf
                <h2 class="title">Quên mật khẩu</h2>
                <ul class="error-forgot error"></ul>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Nhập email" id="email-forgot" autocomplete="off"/>
                </div>
                <input type="submit" class="btn" value="Gửi yêu cầu"/>
                <a href="#" class="social-text" id="back-to-login"
                   style="text-decoration:none; padding-bottom:0 !important;">Quay lại đăng nhập</a>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Bạn chưa có tài khoản ?</h3>
                <p>
                    Hãy đăng ký tài khoản ngay để đọc hàng ngàn bộ truyện tranh miễn phí.
                </p>
                <button class="btn transparent" id="sign-up-btn">Đăng ký</button>
            </div>
            <img src="{{ asset('assets/client/log.png')  }}" class="image" alt=""/>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Bạn đã có tài khoản ?</h3>
                <p>
                    Hãy đăng nhập để tiếp tục đọc truyện tranh yêu thích của bạn.
                </p>
                <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
            </div>
            <img src="{{ asset('assets/client/res.png')  }}" class="image" alt=""/>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://demo.nqtcomics.site/assets/js/login.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('.sign-in-form').submit(function (e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url: "/cli/auth/login",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email,
                    password: password,
                },
                success: function (data) {
                        window.location.href = "/";
                },
                error: function (data, status, error) {
                    var errors = data.responseJSON.errors;
                    console.log(errors)
                    var html = '';
                    $.each(errors, function (key, value) {
                        html += '<li style="list-style: none">' + value + '</li>';
                    });
                    $('.error-sign-in').html(html).css({
                        'padding': '3%'
                    });
                }
            });
        });

        $('.sign-up-form').submit(function (e) {
            e.preventDefault();
            var username = $('#name-signup').val();
            var email = $('#email-signup').val();
            var password = $('#password-signup').val();
            var password_confirmation = $('#password_confirmation').val();
            $.ajax({
                url: "/cli/auth/register",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: username,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation
                },
                success: function (data) {
                    alert(data.success)
                    $('#name-signup').val('');
                    $('#email-signup').val('');
                    $('#password-signup').val('');
                    $('#password_confirmation').val('');
                    $('.error').html('');
                },
                error: function (data, status, error) {
                    var errors = data.responseJSON.errors;
                    var html = '';
                    $.each(errors, function (key, value) {
                        html += '<li style="list-style: none">' + value + '</li>';
                    });
                    $('.error-sign-up').html(html).css({
                        'padding': '3%'
                    });
                }
            });
        });

        $('.forgot-password-form').submit(function (e) {
            e.preventDefault();
            var email = $('#email-forgot').val();
            $.ajax({
                url: "/cli/auth/forgot",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email,
                    // _token: "dXAycXLI0OugQtFu7cyIcLma4Oe82GOj5qHdorRO"
                },
                success: function (data) {
                    alert('Mật khẩu mới đã được gửi đến email của bạn.');
                    console.log(data);
                    $('#email-forgot').val('');
                    $('.error').html('');
                },
                error: function (data, status, error) {
                    var errors = data.responseJSON.errors;
                    var html = '';
                    $.each(errors, function (key, value) {
                        html += '<li style="list-style: none">' + value + '</li>';
                    });
                    $('.error-forgot').html(html).css({
                        'padding': '3%'
                    });
                }
            });
        });

        $('#forgot-password-btn').click(function () {
            $('.sign-in-form').hide();
            $('.sign-up-form').hide();
            $('.forgot-password-form').show();
        });

        $('#back-to-login').click(function () {
            $('.sign-in-form').show();
            $('.sign-up-form').hide();
            $('.forgot-password-form').hide();
            $('.error').html('').css({
                'padding': '0'
            });
        });

        $('#sign-up-btn').click(function () {
            $('.sign-up-form').show();
            $('.sign-in-form').hide();
            $('.forgot-password-form').hide();
            $('.error').html('').css({
                'padding': '0'
            });
        });

        $('#sign-in-btn').click(function () {
            $('.sign-in-form').show();
            $('.sign-up-form').hide();
            $('.forgot-password-form').hide();
            $('.error').html('').css({
                'padding': '0'
            });
        });

        $('input').on('input' ,() => {
            $('.error').html('').css({
                'padding': '0'
            });
        });
    });
</script>
</body>

</html>
