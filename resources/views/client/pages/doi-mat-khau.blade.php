<form method="POST" action="{{ route('cai-dat-bao-mat', $user->id) }}" id="change-password-form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="old_password">Mật khẩu hiện tại:</label>
        <input type="password" class="form-control" id="old_password" name="old_password" autocomplete="off">
        <span class="text-danger" id="error-old_password"></span>
    </div>

    <div class="form-group">
        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" class="form-control" id="new_password" name="new_password" autocomplete="off">
        <span class="text-danger" id="error-new_password"></span>
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
            autocomplete="off">
        <span class="text-danger" id="error-new_password_confirmation"></span>
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
                data: $(this).serialize(), // Lấy dữ liệu từ form
                // beforeSend: function(request) {
                //     request.setRequestHeader("X-HTTP-Method-Override",
                //         "PUT"); 
                // },
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
                                $('#error-' + field).text(errors[field].join(', '));
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
</style>
