<h1>Lịch Sử Giao Dịch</h1>
<div class="timeline">
    <div class="line text-muted"></div>
    <article class="panel panel-info panel-outline">
        <div class="panel-heading icon">
            <i class="fa fa-history" aria-hidden="true"></i>
        </div>
        <div class="panel-body">
            <!-- Nơi đặt bảng lịch sử giao dịch -->
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người thanh toán</th>
                        <th>Ngày</th>
                        <th>Số Tiền</th>
                        <th>Phương thức</th>
                        <th>Trạng Thái</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lichSuGiaoDich as $key => $giaoDich)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $giaoDich->user->ten_doc_gia }}</td>
                            <td>{{ $giaoDich->created_at->format('d-m-Y') }}</td>
                            <td>{{ number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.') }} VND</td>
                            <td>{{ $giaoDich->phuongThucThanhToan->ten_phuong_thuc }}</td>
                            <td>
                                @if ($giaoDich->trang_thai == 'thanh_cong')
                                    <span class="badge badge-success">Thành công</span>
                                @elseif ($giaoDich->trang_thai == 'dang_xu_ly')
                                    <span class="badge badge-warning">Đang xử lí</span>
                                @else
                                    <span class="badge badge-danger">Thất bại</span>
                                @endif
                            </td>
                            <td>
                                <span class="addcomment">
                                    <button type="button" onclick="showDetails({{ $giaoDich->id }})"
                                        class="btn btn-primary" data-toggle="modal" data-target="#modalDetails">
                                        Xem
                                    </button>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
</div>

<div class="modal fade respond" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h3 class="modal-title mb-0" id="myModalLabel">Thông tin chi tiết</h3>
                <!-- Sử dụng <span> để tạo nút "X" -->
                <span class="close" style="cursor: pointer; font-size: 1.5rem;" data-dismiss="modal" aria-label="Close">&times;</span>
            </div>
            <div class="modal-body clearfix">
                <table class="table">
                    <tbody id="modalContent">
                        <!-- Nội dung bảng sẽ được cập nhật bằng AJAX -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetails(id) {
        $.ajax({
            url: '/lich-su-giao-dich/' + id,
            method: 'GET',
            success: function(data) {
                // Cập nhật nội dung bảng trong modal
                $('#modalContent').html(`
                    <tr>
                        <td><strong>Người thanh toán:</strong></td>
                        <td>${data.user_name}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày:</strong></td>
                        <td>${data.date}</td>
                    </tr>
                    <tr>
                        <td><strong>Số tiền:</strong></td>
                        <td>${data.amount} VND</td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức:</strong></td>
                        <td>${data.payment_method}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái:</strong></td>
                        <td>${data.status}</td>
                    </tr>
                    <tr>
                        <td><strong>Chi tiết:</strong></td>
                        <td>${data.details}</td>
                    </tr>
                `);

                $('#myModal').modal('show');
            },
            error: function(xhr) {
                alert(xhr.responseJSON.error || 'Đã xảy ra lỗi');
            }
        });
    }
</script>
