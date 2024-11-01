<div class="book">
    <a href="{{ route('chi-tiet-sach', $book->id) }}">
        <img src="{{ Storage::url($book->anh_bia_sach) }}" alt="Cover Image">
        <div class="price-tag">
            {{ number_format(!empty($book->gia_khuyen_mai) ? $book->gia_khuyen_mai : $book->gia_goc, 0, ',', '.') }} VNĐ
        </div>
        <div class="book-info" style="display: flex;justify-content: start">
            <h4 class="book-title" style="font-weight: bold; font-size: larger">{{ $book->ten_sach }}</h4>
        </div>
    </a>
</div>
