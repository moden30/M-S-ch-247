<style>
    .no-data-row {
        font-weight: bold;
        color: #999;
        text-align: center;
        padding: 20px 0;
        line-height: 1.5;
    }
</style>
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
                            <img src="{{ Storage::url($yeuThich->sach->anh_bia_sach) }}" width="40" height="60"
                                style="margin-right: 5px;" />
                            {{ $yeuThich->sach->ten_sach }}</a>
                    </th>
                    <th>{{ $yeuThich->sach->user->but_danh ?  $yeuThich->sach->user->but_danh :  $yeuThich->sach->user->ten_doc_gia }}</th>
                    <th>{{ number_format($yeuThich->sach->gia_goc, 0, ',', '.') }} VNĐ</th>
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

<style>
    .delete-btn {
        background: none;
        border: none;
        text-decoration: none;
        cursor: pointer;
        padding-right: 10px;
    }
</style>

<ul class="pagination text-center" id="id_pagination">
    <!-- Nút trang trước -->
    @if ($danhSachYeuThich->currentPage() > 1)
        <li><a href="{{ $danhSachYeuThich->previousPageUrl() }}">«</a></li>
    @endif

    <!-- Các nút trang số -->
    @for ($i = 1; $i <= $danhSachYeuThich->lastPage(); $i++)
        <li class="{{ $i == $danhSachYeuThich->currentPage() ? 'active' : '' }}">
            <a href="{{ $danhSachYeuThich->url($i) }}">{{ $i }}</a>
        </li>
    @endfor

    <!-- Nút trang tiếp theo -->
    @if ($danhSachYeuThich->hasMorePages())
        <li><a href="{{ $danhSachYeuThich->nextPageUrl() }}">»</a></li>
    @endif
</ul>
