<form method="POST" action="{{ route('cai-dat-bao-mat', $user->id) }}" id="change-password-form">
    @csrf
    @method('PUT')

    <div class="form-group position-relative">
        <label for="old_password">Mật khẩu hiện tại:</label>
        <div class="position-relative">
            <input type="password" class="form-control" id="old_password" name="old_password" autocomplete="off">
            <button type="button" class="btn btn-link text-muted toggle-password" data-target="old_password">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </button>
        </div>
        <span class="text-danger" id="error-old_password"></span>
    </div>

    <div class="form-group position-relative">
        <label for="new_password">Mật khẩu mới:</label>
        <div class="position-relative">
            <input type="password" class="form-control" id="new_password" name="new_password" autocomplete="off">
            <button type="button" class="btn btn-link text-muted toggle-password" data-target="new_password">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </button>
        </div>
        <span class="text-danger" id="error-new_password"></span>
    </div>

    <div class="form-group position-relative">
        <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
        <div class="position-relative">
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                autocomplete="off">
            <button type="button" class="btn btn-link text-muted toggle-password"
                data-target="new_password_confirmation">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </button>
        </div>
        <span class="text-danger" id="error-new_password_confirmation"></span>
    </div>
    <div class="form-group position-relative">
        <label for="captcha">Xác nhận captcha:</label>
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        <span class="text-danger" id="error-captcha"></span>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#change-password-form').on('submit', function(e) {
            e.preventDefault(); // Ngừng gửi form mặc định

            // Xóa các thông báo lỗi cũ
            $('span.text-danger').text('');

            // Gửi yêu cầu AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Đăng nhập lại'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href =
                                '/cli/auth/login';
                        }
                    });
                },
                error: function(xhr) {
                    console.log('Status:', xhr.status); // Log status code
                    console.log('Response Text:', xhr
                        .responseText); // Log toàn bộ text trả về

                    // Kiểm tra xem server có trả về dữ liệu JSON không
                    var response = xhr.responseJSON ? xhr.responseJSON : JSON.parse(xhr
                        .responseText);

                    if (response && response.errors) {
                        var errors = response.errors;
                        // Kiểm tra lỗi từng trường và hiển thị thông báo
                        for (var field in errors) {
                            if (errors.hasOwnProperty(field)) {
                                if (field == 'g-recaptcha-response') {
                                    // Hiển thị lỗi CAPTCHA vào phần tử có id 'error-captcha'
                                    $('#error-captcha').text(errors[field].join(', '));
                                } else {
                                    $('#error-' + field).text(errors[field].join(', '));
                                }
                            }
                        }

                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Vui lòng kiểm tra lại thông tin mật khẩu của bạn.',
                            icon: 'error',
                            confirmButtonText: 'Thử lại'
                        });
                    } else {
                        // Nếu không có lỗi chi tiết, hiển thị lỗi chung
                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Có lỗi xảy ra. Vui lòng thử lại sau.',
                            icon: 'error',
                            confirmButtonText: 'Thử lại'
                        });
                    }
                }
            });
        });
    });
</script>

<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');

            if (input.getAttribute('type') === 'password') {
                input.setAttribute('type', 'text');
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.setAttribute('type', 'password');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .swal2-popup {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 12px;
    }

    .swal2-title {
        color: #333;
    }

    .swal2-button {
        background-color: #4A90E2;
        color: white;
    }

    .position-relative {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        padding: 0;
        border: none;
        background: none;
        font-size: 1.25rem;
        cursor: pointer;
    }

    input.form-control {
        padding-right: 40px;
    }
</style>
