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
                        <th>Người thanh toán</th>
                        <th>Tên sách</th>
                        <th>Số Tiền</th>
                        <th>Ngày</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody id="lichSuGiaoDichContainer">
                    @foreach ($lichSuGiaoDich as $key => $giaoDich)
                        <tr>
                            <td>{{ $giaoDich->user->ten_doc_gia }}</td>
                            <td>{{ $giaoDich->sach->ten_sach }}</td>
                            <td>{{ number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.') }} VND</td>
                            <td>{{ $giaoDich->created_at->format('d-m-Y') }}</td>

                            <td>
                                <span class="addcomment">
                                    <button type="button" onclick="showDetails({{ $giaoDich->id }})"
                                        class="btn btn-primary" data-toggle="modal" data-target="#modalDetails">
                                        Xem
                                    </button>
                                </span>
                            </td>
                            <td style="display: none;">
                                @php
                                    $chiTietTrangThai = $giaoDich->trang_thai;
                                @endphp
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
                <img id="statusIcon" src="" alt="" width="30px" height="30px">
            </div>
            <div class="modal-body clearfix">
                <table class="table">
                    <tbody id="modalContent">

                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" style="margin-top: 10px" class="btn btn-primary"
                        data-dismiss="modal">Thoát</button>
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
                        <td><strong>Người thanh toán</strong></td>
                        <td >${data.ten_doc_gia}</td>
                    </tr>
                    <tr>
                        <td><strong>Gmail</strong></td>
                        <td>${data.email}</td>
                    </tr>
                     <tr>
                        <td><strong>Số điện thoại</strong></td>
                        <td>${data.so_dien_thoai}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày</strong></td>
                        <td>${data.ngay_thanh_toan}</td>
                    </tr>
                    <tr>
                        <td><strong>Số tiền</strong></td>
                        <td>${data.tong_tien} VND</td>
                    </tr>
                    <tr>
                        <td><strong>Phương thức</strong></td>
                        <td>${data.phuong_thuc}</td>
                    </tr>
                    <tr>
                        <td><strong>Sách</strong></td>
                        <td>${data.ten_sach}</td>
                    <tr>
                        <td><strong>Tác giả</strong></td>
                        <td>${data.tac_gia}</td>
                    </tr>
                    <tr>
                        <td><strong>Trạng thái</strong></td>
                        <td style="color: ${data.trang_thai === 'thanh_cong' ? 'green' : data.trang_thai === 'that_bai' ? 'red' : 'orange'};">
                            ${data.trang_thai === 'thanh_cong' ? 'Thành công' : data.trang_thai === 'that_bai' ? 'Thất bại' : 'Đang xử lý'}
                        </td>
                    </tr>
               
                    
                `);
                let statusIcon;

                if (data.trang_thai === 'thanh_cong') {
                    statusIcon = 'https://cdn-icons-png.flaticon.com/512/190/190411.png';
                } else if (data.trang_thai === 'that_bai') {
                    statusIcon = 'https://cdn-icons-png.flaticon.com/512/1828/1828843.png';
                } else if (data.trang_thai === 'dang_xu_ly') {
                    statusIcon = 'https://cdn-icons-png.flaticon.com/512/7884/7884198.png';
                }
                $('#statusIcon').attr('src', statusIcon);

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

    .modal-header .modal-title {
        flex-grow: 1;
        text-align: left;
    }

    .modal-header img {
        margin-left: auto;
    }
</style>
