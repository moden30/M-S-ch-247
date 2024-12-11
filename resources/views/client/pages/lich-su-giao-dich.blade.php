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

    .book3d-container {
        perspective: 1500px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .book3d {
        width: 75%;
        transform-style: preserve-3d;
        transition: transform 0.6s ease-in-out, box-shadow 0.3s ease;
        transform-origin: center;
    }

    .book3d:hover {
        transform: rotateY(20deg) rotateX(10deg);
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    }

    .book3d img {
        border-radius: 8px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
    }

</style>
<div class="timeline" id="lichSuGiaoDichContainer">
    <div class="line text-muted">
    </div>
    <article class="panel panel-info panel-outline">
        <div class="panel-heading icon">
            <i class="fa fa-history" aria-hidden="true"></i>
        </div>
        <h1>Lịch Sử Giao Dịch</h1>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Ảnh bìa sách</th>
                    <th>Tên sách</th>
                    <th>Số Tiền</th>
                    <th>Ngày</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lichSuGiaoDich as $key => $giaoDich)
                    <tr>
                        <td><img style="width: 90px;height: auto" src="{{Storage::url($giaoDich->sach->anh_bia_sach)}}"
                                 alt="" srcset=""></td>
                        <td>{{ $giaoDich->sach->ten_sach }}</td>
                        <td>{{ number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.') }} VND</td>
                        <td>{{ $giaoDich->created_at->format('d-m-Y') }}</td>
                        <td>
                            @if($giaoDich->trang_thai === 'that_bai')
                                <span class="text-danger">Thất bại</span>
                            @elseif($giaoDich->trang_thai === 'thanh_cong')
                                <span class="text-success">Thành công</span>
                            @else
                                <span id="order-{{$giaoDich->id}}" class="text-warning">Đang xử lý</span>
                            @endif
                        </td>
                        <td>
                            <div class="addcomment">
                                <button type="button" class="btn-toggle-response mb-2" style="color: #1ebbf0"
                                        onclick="showDetails({{ $giaoDich->id }})" data-toggle="modal"
                                        data-target="#modalDetails">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Xem chi tiết
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <ul class="pagination text-center" id="giaodich_pagination">
                <!-- Nút trang trước -->
                @if ($lichSuGiaoDich->currentPage() > 1)
                    <li><a href="{{ $lichSuGiaoDich->previousPageUrl() }}" data-section="lich-su-giao-dich">«</a>
                    </li>
                @endif

                <!-- Các nút trang số -->
                @for ($i = 1; $i <= $lichSuGiaoDich->lastPage(); $i++)
                    <li class="{{ $i == $lichSuGiaoDich->currentPage() ? 'active' : '' }}">
                        <a href="{{ $lichSuGiaoDich->url($i) }}"
                           data-section="lich-su-giao-dich">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Nút trang tiếp theo -->
                @if ($lichSuGiaoDich->hasMorePages())
                    <li><a href="{{ $lichSuGiaoDich->nextPageUrl() }}" data-section="lich-su-giao-dich">»</a></li>
                @endif
            </ul>

        </div>

    </article>
</div>

<div class="modal fade respond" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h3 class="modal-title mb-0" id="myModalLabel">Thông tin chi tiết</h3>
                <img id="statusIcon" src="" alt="" width="30px" height="30px">
            </div>
            <div class="modal-body clearfix">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table">
                            <tbody id="bookInfo">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tbody id="customerInfo">

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="d-flex justify-content-center mt-3 bg-white">
                    <button type="button" class="btn btn-primary"
                            data-dismiss="modal">Thoát
                    </button>
                    <button id="buyAgain" class="btn btn-danger" data-id="" style="margin-left: 2%; display: none">Mua
                        lại
                    </button>
                    <a id="contiBuy" class="btn btn-warning" style="margin-left: 2%; display: none">Thanh toán ngay</a>
                    <button id="cancelBuy" class="btn btn-danger" data-id="" style="margin-left: 2%; display: none">Hủy
                        giao dịch
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#giaodich_pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var section = $(this).data('section');

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                section: section
            },
            success: function (response) {
                $('#lichSuGiaoDichContainer').html(response);
            }
        });
    });
</script>


<script>
    document.getElementById('buyAgain').addEventListener('click', function () {
        // Lấy giá trị ID từ thuộc tính data-id
        const orderId = this.getAttribute('data-id');

        // Kiểm tra nếu ID không hợp lệ
        if (!orderId) {
            alert('Không tìm thấy ID đơn hàng!');
            return;
        }

        window.location.href = `thanh-toan/${orderId}`
    });

    document.getElementById('cancelBuy').addEventListener('click', () => {
        if (confirm('Bạn chắc chắn muốn hủy đơn ?')) {
            let orderId = document.getElementById('cancelBuy').getAttribute('data-id');

            $.ajax({
                url: 'api/don-hang/huy-don/' + orderId,
                method: 'PUT',
                success: function (data) {
                    if (data.success) {
                        $('#statusOder').text('Thất bại')
                        $('#statusOder').css({
                            'color': 'red'
                        })
                        console.log(data)
                        document.getElementById('buyAgain').setAttribute('data-id', data.order.sach_id);
                        $('#buyAgain').css({'display': ''});
                        $('#contiBuy').css({'display': 'none'});
                        $('#cancelBuy').css({
                            'display': 'none'
                        });
                        $(`#order-${data.order.id}`).text('Thất bại')
                        $(`#order-${data.order.id}`).css({
                            'color': 'red'
                        })
                    }
                },
                error: function (err) {
                    alert('có lỗi xảy ra, thử lại sau')
                }
            })
        }
    })


    function showDetails(id) {
        $.ajax({
            url: '/lich-su-giao-dich/' + id,
            method: 'GET',
            success: function (data) {
                // Thông tin sách
                $('#bookInfo').html(`
               <tr>
                    <strong>Ảnh sách</strong>
                </tr>
               <tr>
                  <td>
                    <img src="${data.hinh_anh}" alt="Ảnh sách" class="book-image" />
                </td>
                </tr>
            `);
                // Thông tin khách hàng
                $('#customerInfo').html(`
                <tr><td><strong>Người thanh toán</strong></td><td>${data.ten_doc_gia}</td></tr>
                <tr><td><strong>Gmail</strong></td><td>${data.email}</td></tr>
                <tr><td><strong>Số điện thoại</strong></td><td>${data.so_dien_thoai}</td></tr>
                <tr><td><strong>Ngày thanh toán</strong></td><td>${data.ngay_thanh_toan}</td></tr>
                <tr><td><strong>Số tiền</strong></td><td>${data.tong_tien} VND</td></tr>
                <tr><td><strong>Phương thức</strong></td><td>${data.phuong_thuc}</td></tr>
                 <tr><td><strong>Tên sách</strong></td><td>${data.ten_sach}</td></tr>
                <tr><td><strong>Tác giả</strong></td><td>${data.tac_gia}</td></tr>
                <tr>
                    <td><strong>Trạng thái</strong></td>
                    <td style="color: ${data.trang_thai === 'thanh_cong' ? 'green' : data.trang_thai === 'that_bai' ? 'red' : 'orange'};" id="statusOder">
                        ${data.trang_thai === 'thanh_cong' ? 'Thành công' : data.trang_thai === 'that_bai' ? 'Thất bại' : 'Đang xử lý'}
                    </td>
                </tr>
            `);
                if (data.trang_thai === 'that_bai') {
                    // Hiện nút "Mua lại" và gán id sách vào data-id
                    $('#buyAgain').css({
                        'display': 'block'
                    });
                    document.getElementById('buyAgain').setAttribute('data-id', data.id_sach);
                    $('#contiBuy').css({'display': 'none'});
                    $('#cancelBuy').css({
                        'display': 'none'
                    });
                } else if (data.trang_thai === 'dang_xu_ly') {
                    // Hiện nút "Tiếp tục mua" và gán liên kết thanh toán
                    $('#contiBuy').css({
                        'display': 'block'
                    });
                    $('#cancelBuy').css({
                        'display': 'block'
                    });
                    document.getElementById('cancelBuy').setAttribute('data-id', data.id);
                    document.getElementById('contiBuy').href = data.payment_link;
                    $('#buyAgain').css({'display': 'none'});
                } else {
                    // Hiện nút "Mua lại" trong trường hợp trạng thái khác
                    $('#buyAgain').css({'display': 'none'});
                    $('#contiBuy').css({'display': 'none'});
                    $('#cancelBuy').css({
                        'display': 'none'
                    });

                }

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
            error: function (xhr) {
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

    .book-image {
        width: 80%;
        height: auto;
        border-radius: 10px;
        box-shadow: 5px 5px 20px #333;
        transform: rotate(0deg); /* Optional: Adjust rotation if needed */
        transition: transform 0.3s ease-in-out;
    }


</style>
