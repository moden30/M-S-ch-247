<div class="book" title="{{ $book->ten_sach }}">
    <a href="{{ route('chi-tiet-sach', $book->id) }}">
        <div class="image-container">
            <img class="custom-image-home" src="{{ Storage::url($book->anh_bia_sach) }}" alt="Cover Image">
            <div
                class="price-tag @if($book->checkVaiTro) da-mua @elseif($book->isPurchased) da-mua @elseif($book->gia_goc === 0) gia-goc @elseif($book->gia_khuyen_mai) gia-khuyen-mai @endif">
                @if($book->checkVaiTro)
                    Đã Sở Hữu
                @elseif($book->isPurchased)
                    Đã Mua
                @elseif($book->gia_goc === 0)
                    Miễn Phí
                @elseif(!empty($book->gia_khuyen_mai))
                    <span class="me-2" style="text-decoration: line-through; color: black;">
                    {{ number_format($book->gia_goc, 0, ',', '.') }} VNĐ
                </span>
                    <span>
                    {{ number_format($book->gia_khuyen_mai, 0, ',', '.') }} VNĐ
                </span>
                @elseif(!empty($book->gia_goc))
                    {{ number_format($book->gia_goc, 0, ',', '.') }}
                    VNĐ
                @endif
            </div>
            <div class="book-hover-details">
                <h2 style="color: #fff"> {{ $book->ten_sach }}</h2>
                <p style="color: #fff">Tác giả: {{ $book->but_danh  ? $book->but_danh : $book->ten_doc_gia }}</p>
                <p style="color: #fff">Thể loại: {{ $book->ten_the_loai }}</p>
                <p style="color: #fff">Tình trạng: <span
                        style="color: {{ $book->tinh_trang_cap_nhat == 'da_full' ? '#0af9e5 ' : 'yellow' }}">{{ $book->tinh_trang_cap_nhat == 'da_full' ? 'Hoàn thành' : 'Đang ra' }}</span>
                </p>
                <p style="color: #fff">Số chương: {{ $book->tong_chuong }} chương</p>
                <div class="d-flex">
                    <a onclick="event.preventDefault(); showFavoriteStatusHeart({{ $book->id }});" href="javascript:void(0);" class="btn btn-danger me-2" title="Yêu Thích"> <i class="fa fa-heart" aria-hidden="true"></i></a>
                    @if($book->checkVaiTro || $book->isPurchased)
                    @else
                    <a href="{{ route('thanh-toan', $book->id) }}" class="btn btn-primary" title="Mua Ngay">Mua Ngay</a>
                    @endif
                    <form id="yeu-thich-sach-{{ $book->id }}" action="{{ route('them-yeu-thich', $book->id) }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" value="{{ $book->id }}" name="sach_id">
                    </form>
                </div>

            </div>
        </div>
        <div class="book-info" style="display: flex;justify-content: start">
            <h4 class="book-title" style="font-weight: bold; font-size: larger">{{ $book->ten_sach }}</h4>
        </div>
    </a>
</div>
<script>
    // Thêm vào yêu thích
    function showFavoriteStatusHeart(bookId) {
        const form = document.getElementById('yeu-thich-sach-' + bookId);
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
            .then(response => response.json())
            .then(data => {
                Swal.close();
                Swal.fire({
                    title: data.status === 'success' ? 'Cảm ơn bạn đã yêu thích cuốn sách❤️' :
                        'Bạn đã thích cuốn sách này rồi❤️',
                    html: data.status === 'success' ?
                        `<img src="{{ asset('assets/gif/timtim.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;"><p>${data.message}</p>` :
                        `<img src="{{ asset('assets/gif/timtim2.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;"><p>${data.message}</p>`,
                    confirmButtonText: "Xem Danh Sách Yêu Thích",
                    customClass: {
                        popup: 'swal-popup-large-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('client.yeu-thich.index') }}";
                    }
                });
            })
            .catch(error => {
                Swal.close();
                Swal.fire({
                    title: "Bạn chưa đăng nhập!",
                    text: "Yêu cầu đăng nhập để thêm yêu thích",
                    confirmButtonText: "Đăng nhập ngay",
                    customClass: {
                        popup: 'swal-popup-large-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('cli.auth.showLoginForm') }}";
                    }
                });
            });
    }
</script>





