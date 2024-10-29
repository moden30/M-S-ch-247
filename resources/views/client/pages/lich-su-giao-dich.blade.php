<h1>Lịch Sử Giao Dịch</h1>
<div class="timeline">
    <div class="line text-muted"></div>
    <article class="panel panel-info panel-outline">
        <div class="panel-heading icon">
            <i class="fa fa-history" aria-hidden="true"></i>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người thanh toán</th>
                        <th>Tên sách</th>
                        <th>Số Tiền</th>
                        <th>Ngày</th>
                        <th>Trạng Thái</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody id="lichSuGiaoDichContainer">
                    @foreach ($lichSuGiaoDich as $key => $giaoDich)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $giaoDich->user->ten_doc_gia }}</td>
                            <td>{{ $giaoDich->sach->ten_sach }}</td>
                            <td>{{ number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.') }} VND</td>
                            <td>{{ $giaoDich->created_at->format('d-m-Y') }}</td>
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
            <div class="modal-header">
                <h3 class="modal-title mb-0" id="myModalLabel">Thông tin chi tiết</h3>
            </div>
            <div class="modal-body clearfix">
                <table class="table">
                    <tbody id="modalContent">

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
                $('#modalContent').html(`
                    <tr>
                        <td><strong>Người thanh toán:</strong></td>
                        <td >${data.ten_doc_gia}</td>
                    </tr>
                    <tr>
                        <td><strong>Gmail:</strong></td>
                        <td>${data.email}</td>
                    </tr>
                     <tr>
                        <td><strong>Số điện thoại:</strong></td>
                        <td>${data.so_dien_thoai}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày:</strong></td>
                        <td>${data.ngay_thanh_toan}</td>
                    </tr>
                    <tr>
                        <td><strong>Số tiền:</strong></td>
                        <td>${data.tong_tien} VND</td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức:</strong></td>
                        <td>${data.phuong_thuc}</td>
                    </tr>
                    <tr>
                        <td><strong>Sách:</strong></td>
                        <td>${data.ten_sach}</td>
                    </tr>
                    <div class"space"></div>
                    <tr>
                        <td><strong>Tác giả</strong></td>
                        <td>${data.tac_gia}</td>
                    </tr>
                    <br></br>
                   
                    
                `);
                $('#myModal').modal('show');
            },
            error: function(xhr) {
                alert(xhr.responseJSON.error || 'Đã xảy ra lỗi');
            }
        });
    }
</script>
<style>
    .modal-body td {
        margin: 3px;
        padding: 7px !important;
        line-height: normal !important;
        vertical-align: baseline !important;
        border-top: none !important;
    }
</style>
