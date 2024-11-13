<style>
    .no-data-row {
        font-weight: bold;
        color: #999;
        text-align: center;
        padding: 20px 0;
        line-height: 1.5;
    }

    .delete-btn {
        background: none;
        border: none;
        text-decoration: none;
        cursor: pointer;
        padding-right: 10px;
    }
</style>
<form id="filter" method="get">
    <div class="list-group-item list-group-item-info d-flex">
        <strong class="font-16">Sách yêu thích ({{ $danhSachYeuThich->total() }})</strong>
        <div class="d-flex justify-content-between">
            <div class="input-group">
                <input name="sach_yeu_thich" type="text" class="form-control" placeholder="Nhập tên sách"
                    value="{{ request('sach_yeu_thich') }}" id="tim_kiem_yeu_thich" />
                <div class="input-group-btn">
                    <button class="btn btn-primary color-white" type="button" id="searchButton">
                        <span class="fa fa-search"></span> Tìm Kiếm
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="list-group-item">
    <div style="overflow-x:auto;">

        <div id="yeu-thich-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Truyện</th>
                        <th>Tác giả</th>
                        <th>Giá tiền</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($danhSachYeuThich == null || $danhSachYeuThich->isEmpty())
                        <tr class="text-center">
                            <td colspan="6" class="no-data-row">Bạn chưa có mục yêu thích nào</td>
                        </tr>
                    @else
                        @foreach ($danhSachYeuThich as $key => $yeuThich)
                            <tr>
                                <th>
                                    <a href="{{ route('chi-tiet-sach', $yeuThich->sach->id) }}">
                                        <img src="{{ Storage::url($yeuThich->sach->anh_bia_sach) }}" width="40"
                                            height="60" style="margin-right: 5px;" />
                                        {{ $yeuThich->sach->ten_sach }}</a>
                                </th>
                                <th>{{ $yeuThich->sach->user->but_danh ? $yeuThich->sach->user->but_danh : $yeuThich->sach->user->ten_doc_gia }}
                                </th>
                                <th>{{ number_format($yeuThich->sach->gia_khuyen_mai, 0, ',', '.') }} VNĐ</th>
                                <th>
                                    @if ($yeuThich->sach->tinh_trang_cap_nhat == 'da_full')
                                        <span class="text-success">Hoàn Thành</span>
                                    @else
                                        <span class="text-warning">Đang cập nhật</span>
                                    @endif
                                </th>
                                <th style="text-align: center;">
                                    <form action="{{ route('xoa-yeu-thich', $yeuThich->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-link text-danger delete-btn">
                                            <div class="d-flex justify-content-center">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </div>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<ul class="pagination text-center" id="id_pagination">
    <!-- Nút trang trước -->
    @if ($danhSachYeuThich->currentPage() > 1)
        <li><a href="{{ $danhSachYeuThich->previousPageUrl() }}&sach_yeu_thich={{ request('sach_yeu_thich') }}">«</a>
        </li>
    @endif

    <!-- Các nút trang số -->
    @for ($i = 1; $i <= $danhSachYeuThich->lastPage(); $i++)
        <li class="{{ $i == $danhSachYeuThich->currentPage() ? 'active' : '' }}">
            <a
                href="{{ $danhSachYeuThich->url($i) }}&sach_yeu_thich={{ request('sach_yeu_thich') }}">{{ $i }}</a>
        </li>
    @endfor

    <!-- Nút trang tiếp theo -->
    @if ($danhSachYeuThich->hasMorePages())
        <li><a href="{{ $danhSachYeuThich->nextPageUrl() }}&sach_yeu_thich={{ request('sach_yeu_thich') }}">»</a></li>
    @endif
</ul>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>
<script>
    $(document).ready(function() {
        // Khởi tạo biến global để kiểm tra yêu cầu Ajax cũ
        var currentRequest = null;

        // Sử dụng lodash debounce để trì hoãn việc gọi Ajax
        var debounceSearch = _.debounce(function() {
            var searchQuery = $('#tim_kiem_yeu_thich').val(); // Lấy giá trị người dùng nhập

            // Lưu lại vị trí con trỏ (caret) trong ô nhập liệu
            var cursorPosition = $('#tim_kiem_yeu_thich')[0].selectionStart;

            // Hủy yêu cầu Ajax cũ nếu đang có
            if (currentRequest) {
                currentRequest.abort();
            }

            // Gửi yêu cầu Ajax mới
            currentRequest = $.ajax({
                url: '{{ route('trang-ca-nhan') }}', // Đảm bảo đường dẫn đúng
                method: 'GET',
                data: {
                    sach_yeu_thich: searchQuery, // Truyền tham số tên sách yêu thích
                    section: 'yeu-thich', // Section để xác định phần cần cập nhật
                    page: 1 // Giữ trang 1 để tải lại từ đầu
                },
                success: function(response) {
                    // Cập nhật lại phần nội dung danh sách sách yêu thích
                    $('#yeu-thich-content').html(response);

                    // Sau khi Ajax hoàn thành, giữ lại giá trị trong ô nhập liệu và vị trí con trỏ
                    $('#tim_kiem_yeu_thich').val(
                        searchQuery); // Đảm bảo giá trị ô nhập liệu không bị thay đổi

                    // Đặt lại vị trí con trỏ sau khi cập nhật
                    setTimeout(function() {
                        $('#tim_kiem_yeu_thich')[0].setSelectionRange(
                            cursorPosition, cursorPosition);
                    }, 0); // Đảm bảo gọi sau khi DOM được cập nhật
                }
            });
        }, 500); // 500ms - thời gian debounce

        // Lắng nghe sự kiện keyup khi người dùng nhập vào ô tìm kiếm
        $('#tim_kiem_yeu_thich').on('keyup', function() {
            debounceSearch(); // Gọi debounce khi người dùng thả phím
        });

        // Đảm bảo sau khi chuyển trang, ô tìm kiếm vẫn có giá trị đã nhập
        var initialSearchValue = '{{ request('sach_yeu_thich') }}';
        if (initialSearchValue) {
            $('#tim_kiem_yeu_thich').val(initialSearchValue);
        }

        // Giữ focus sau khi lọc
        $('#tim_kiem_yeu_thich').focus();
    });
</script>
