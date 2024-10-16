<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                <h2 class="title">Đăng nhập</h2>
                @include('client.auth.customer.svg-container-login-register')
                <div class="error"></div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off"/>
                    <span class="indicator"></span>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"/>
                </div>
                <div class="d-flex">
                    <input type="submit" value="Đăng nhập" class="btn solid"/>
                    <input type="button" value="Quên mật khẩu" class="btn" id="forgot-password-btn" style="background-color: rgb(219, 194, 0)"/>
                </div>
                <a href="{{ route('trang-chu') }}" class="social-text" style="text-decoration:none; padding-bottom:0 !important;">Quay lại trang chủ</a>
            </form>


            <form class="sign-up-form" autocomplete="off">
                <h2 class="title">Đăng ký</h2>
                <div class="error"></div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" id="name-signup" autocomplete="off"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" id="email-signup" autocomplete="off"/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" id="password-signup" autocomplete="off"/>
                </div>
                <input type="submit" class="btn" value="Đăng ký"/>
            </form>


            <form class="forgot-password-form" style="display: none;">
                <h2 class="title">Quên mật khẩu</h2>
                <div class="error"></div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" id="email-forgot" autocomplete="off"/>
                </div>
                <input type="submit" class="btn" value="Gửi yêu cầu"/>
                <a href="#" class="social-text" id="back-to-login" style="text-decoration:none; padding-bottom:0 !important;">Quay lại đăng nhập</a>
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
            <img src="https://demo.nqtcomics.site/images/log.png" class="image" alt=""/>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Bạn đã có tài khoản ?</h3>
                <p>
                    Hãy đăng nhập để tiếp tục đọc truyện tranh yêu thích của bạn.
                </p>
                <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
            </div>
            <img src="https://demo.nqtcomics.site/images/register.png" class="image" alt=""/>
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
                url: "https://demo.nqtcomics.site/auth-login",
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: "dXAycXLI0OugQtFu7cyIcLma4Oe82GOj5qHdorRO"
                },
                success: function (data) {
                    window.location.href = "/";
                }, error: function (data, status, error) {
                    var html = '<span>Tài khoản hoặc mật khẩu không chính xác!</span>';
                    $('.error').html(html);
                }
            });
        });

        $('.sign-up-form').submit(function (e) {
            e.preventDefault();
            var username = $('#name-signup').val();
            var email = $('#email-signup').val();
            var password = $('#password-signup').val();
            $.ajax({
                url: "https://demo.nqtcomics.site/auth-register",
                type: 'POST',
                data: {
                    name: username,
                    email: email,
                    password: password,
                    _token: "dXAycXLI0OugQtFu7cyIcLma4Oe82GOj5qHdorRO"
                },
                success: function (data) {
                    alert(data.message);
                    $('#name-signup').val('');
                    $('#email-signup').val('');
                    $('#password-signup').val('');
                    $('.error').html('');
                }, error: function (data, status, error) {
                    var errors = data.responseJSON.errors;
                    var html = '';
                    $.each(errors, function (key, value) {
                        html += '<span>' + value + '</span>';
                    });
                    $('.error').html(html);
                }
            });
        });

        $('.forgot-password-form').submit(function (e) {
            e.preventDefault();
            var email = $('#email-forgot').val();
            $.ajax({
                url: "https://demo.nqtcomics.site/auth-forgot-password",
                type: 'POST',
                data: {
                    email: email,
                    _token: "dXAycXLI0OugQtFu7cyIcLma4Oe82GOj5qHdorRO"
                },
                success: function (data) {
                    alert('Yêu cầu đặt lại mật khẩu đã được gửi đến email của bạn.');
                    $('#email-forgot').val('');
                    $('.error').html('');
                }, error: function (data, status, error) {
                    var errors = data.responseJSON.errors;
                    var html = '';
                    $.each(errors, function (key, value) {
                        html += '<span>' + value + '</span>';
                    });
                    $('.error').html(html);
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
        });
    });
</script>
</body>
</html>
