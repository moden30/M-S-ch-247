<div class="book">
    <a href="{{ route('chi-tiet-sach', $book->id) }}">
        <img class="custom-image-home" src="{{ Storage::url($book->anh_bia_sach) }}" alt="Cover Image">
        <div
            class="price-tag   @if($book->checkVaiTro) da-mua @elseif($book->isPurchased) da-mua @elseif($book->gia_goc === 0) gia-goc @elseif($book->gia_khuyen_mai) gia-khuyen-mai @endif">
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
        <div class="book-info" style="display: flex;justify-content: start">
            <h4 class="book-title" style="font-weight: bold; font-size: larger">{{ $book->ten_sach }}</h4>
        </div>
    </a>
</div>
