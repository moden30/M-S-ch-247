<style>
    .no-data-row {
        font-weight: bold;
        color: #999;
        text-align: center;
        padding: 20px 0;
        line-height: 1.5;
    }
</style>

<form id="filter" method="get">
    <div class="list-group-item list-group-item-info d-flex">
        <strong class="font-16">Sách đã mua ({{ $sachDaMua->total() }})</strong>
        <div class="d-flex justify-content-between">
            <div class="input-group">
                <input name="ten_sach" type="text" class="form-control" placeholder="Nhập tên sách"
                    value="{{ request('ten_sach') }}" id="search_input" />
                <div class="input-group-btn">
                    <button class="btn btn-primary color-white" type="submit">
                        <span class="fa fa-search"></span> Tìm Kiếm
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="list-group-item">
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Truyện</th>
                    <th>Tác giả</th>
                    <th>Giá tiền</th>
                    <th>Tình Trạng</th>
                </tr>
            </thead>
            <tbody>
                @if ($sachDaMua == null || $sachDaMua->isEmpty())
                    <tr class="text-center">
                        <td colspan="4" class="no-data-row">Không tìm thấy sách</td>
                    </tr>
                @else
                    @foreach ($sachDaMua as $key => $sachMua)
                        <tr>

                            <th>
                                <a href="{{ route('chi-tiet-sach', $sachMua->sach->id) }}">
                                    <img src="{{ Storage::url($sachMua->sach->anh_bia_sach) }}" width="40"
                                        height="60" style="margin-right: 5px;" />
                                    {{ $sachMua->sach->ten_sach }}
                                </a>
                            </th>
                            <th> {{ $sachMua->sach->user->ten_doc_gia }}</th>
                            <th>{{ number_format($sachMua->so_tien_thanh_toan, 0, ',', '.') }} VNĐ</th>
                            <th>
                                @if ($sachMua->sach->tinh_trang_cap_nhat == 'da_full')
                                    <p class="text-success">Hoàn Thành</p>
                                @else
                                    <p class="text-warning">Đang cập nhật</p>
                                @endif

                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <ul class="pagination text-center" id="id_pagination">
            @if ($sachDaMua->currentPage() > 1)
                <li><a href="{{ $sachDaMua->previousPageUrl() }}&section=purchased">«</a></li>
            @endif

            @for ($i = 1; $i <= $sachDaMua->lastPage(); $i++)
                <li class="{{ $i == $sachDaMua->currentPage() ? 'active' : '' }}">
                    <a
                        href="{{ $sachDaMua->url($i) }}&section=purchased&title={{ request('title') }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($sachDaMua->hasMorePages())
                <li><a href="{{ $sachDaMua->nextPageUrl() }}&section=purchased">»</a></li>
            @endif
        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>
<script>
    $(document).ready(function() {
        // Khởi tạo biến global để kiểm tra yêu cầu Ajax cũ
        var currentRequest = null;

        // Sử dụng lodash debounce để trì hoãn việc gọi Ajax
        var debounceSearch = _.debounce(function() {
            var searchQuery = $('#search_input').val(); // Lấy giá trị người dùng nhập

            // Lưu lại vị trí con trỏ (caret) trong ô nhập liệu
            var cursorPosition = $('#search_input')[0].selectionStart;

            // Hủy yêu cầu Ajax cũ nếu đang có
            if (currentRequest) {
                currentRequest.abort();
            }

            // Gửi yêu cầu Ajax mới
            currentRequest = $.ajax({
                url: '{{ route('trang-ca-nhan') }}', // Đảm bảo đường dẫn đúng
                method: 'GET',
                data: {
                    ten_sach: searchQuery, // Truyền tham số tên sách
                    section: 'purchased', // Section để xác định phần cần cập nhật
                    page: 1 // Giữ trang 1 để tải lại từ đầu
                },
                success: function(response) {
                    // Cập nhật lại phần nội dung danh sách sách đã mua
                    $('#sach-da-mua').html(response);

                    // Sau khi cập nhật xong, giữ vị trí con trỏ và focus trên ô nhập liệu
                    $('#search_input').focus();
                    $('#search_input')[0].setSelectionRange(cursorPosition, cursorPosition);
                }
            });
        }, 500); // 500ms - thời gian debounce

        // Lắng nghe sự kiện keyup khi người dùng nhập vào ô tìm kiếm
        $('#search_input').on('keyup', function() {
            debounceSearch(); // Gọi debounce khi người dùng thả phím
        });
    });
</script>
