@extends('client.layouts.app')
@section('content')
@push('styles')
<style>



    #slider-keyword {
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0;
        margin: 0;
        white-space: nowrap;
        text-align: center;
        position: relative
    }

    #slider-keyword .btn-primary-border:hover,
    #slider-keyword .btn-primary-border:hover a {
        background: #fff;
        color: #1ebbf0;
        background-clip: padding-box
    }

    #slider-keyword .tag {
        font-weight: 400;
        font-family: Oswald;
        font-size: 12px;
        position: relative;
        padding: .6rem 1rem;
        box-sizing: border-box;
        color: #1ebbf0;
        background: #fff;
        background-clip: padding-box;
        border: solid 1px transparent;
        border-radius: 4px;
        margin: 4px 2px;
        display: inline-block
    }

    #slider-keyword .tag:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -1;
        margin: -1px;
        border-radius: inherit;
        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%)
    }

    #slider-keyword .tag.active {
        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
        color: #fff
    }

    #slider-keyword .tag.active:hover {
        color: #fff;
        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
        background-clip: padding-box
    }

    h1 {
        margin-bottom: 0
    }

    .btn.border-primary,
    .btn.border-primary:hover {
        color: #1ebbf0
    }

    .btn-r {
        background-image: linear-gradient(135deg, red 30%, #fe9a2e 100%)
    }

    .btn-r:hover {
        background-image: linear-gradient(135deg, #fe9a2e 30%, red 100%)
    }

    .col-line-last {
        height: 40px;
        line-height: 40px;
        border-bottom: 1px dashed #ccc
    }

    .sidebar-right .col-line-last a {
        text-decoration: none;
        border-bottom: unset
    }

    .sidebar-right h3 a {
        text-decoration: none;
        border-bottom: unset
    }

    ul.theloai-thumlist {
        padding-left: 0
    }

    table.theloai-thumlist tbody {
        width: 100%;
        display: table;
    }

    table.theloai-thumlist {
        margin-top: 15px;
        display: block
    }

    .theloai-thumlist>li,
    .theloai-thumlist tr {
        display: block;
        padding-left: 0;
        margin-bottom: 10px
    }

    .theloai-thumlist h2 {
        padding-left: 10px;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px
    }

    @media (min-width:1200px) {
        .theloai-thumlist h3 {
            min-height: 45px
        }
    }

    .theloai-thumlist p {
        margin-bottom: 4px;
        margin-top: 4px
    }

    .theloai-thumlist .thumbnail {
        width: 74px;
        height: 111px;
        float: left;
        box-shadow: 0 2px 8px rgba(1, 3, 3, .16);
        position: relative
    }

    .theloai-thumlist .thumbnail img {
        width: 74px;
        height: 111px
    }

    .theloai-thumlist .rating {
        position: absolute;
        bottom: 0;
        left: 0;
        background: #eac100;
        color: #fff;
        font-size: 13px;
        font-weight: 300;
        padding: 2px 8px
    }

    .theloai-thumlist .content {
        overflow: hidden;
        padding-left: 10px;
        font-size: 13px
    }

    .theloai-thumlist .text {
        max-height: 135px;
        overflow: hidden
    }

    .theloai-thumlist .crop-text-2 {
        height: 36px
    }

    .theloai-thumlist h2.crop-text-2 {
        height: 43px
    }

    ul.pagination li {
        list-style: none;
        display: inline-flex;
        padding-bottom: 5px;
        margin-right: 3px
    }

    .pagination li.active,
    .pagination li.disabled {
        pointer-events: none;
        cursor: default;
        text-decoration: none
    }

    .pagination li:hover a {
        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%) !important;
        color: #fff !important;
        border: solid 1px #337ab7 !important
    }

    .pagination li.active a {
        background: linear-gradient(135deg, #39dfaa 30%, #1ebbf0 100%) !important;
        color: #fff !important;
        border: solid 1px #337ab7 !important
    }

    .pagination li a {
        border: solid 1px #000;
        color: #000;
        padding: .7rem 1.2rem
    }

    .full-label {
        width: 34px;
        height: 50px;
        position: absolute;
        display: block;
        top: 0;
        left: -7px;
        z-index: 1;
        background: transparent url({{ asset('assets/client/themes/truyenfull/echo/img/full-label.png')}}) no-repeat
    }

    .label-new {
        border: 1px solid #1ebbf0;
        color: #1ebbf0
    }

    .label-full {
        border: 1px solid #39dfaa;
        color: #39dfaa
    }

    .label-title {
        padding: 0px 3px;
        font-size: 13px;
        vertical-align: bottom;
        margin-left: 5px
    }

    .label-new:before {
        content: "New"
    }

    .label-full:before {
        content: "Full"
    }
</style>

@endpush
 <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item active">Từ Khóa</li>
            <li class="breadcrumb-item"><a href="index.html">{{ $theLoai->ten_the_loai }}</a></li>
        </ol>
    </div>
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h2 class="heading ztop-30"><i class="fa fa-list" aria-hidden="true"></i> Thể Loại {{ $theLoai->ten_the_loai }}</h2>
                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left">Có {{ $sach->count() }} cuốn sách</div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <select id="filter_keyword_tax" class="form-control">
                                        <option value="new-chap">Sách Mới</option>
                                        <option value="ticket_new">Đã Full </option>
                                        <option value="new">Đang Cập Nhật</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @if($sach->isEmpty())
                            <p>Không có sách nào thuộc thể loại này.</p>
                        @else
                            @foreach($sach as $item)
                                <div class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <table class="theloai-thumlist">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <meta itemprop="bookFormat" content="EBook" />
                                                <a href="" class="thumbnail" title="{{ $item->ten_sach }}">
                                                    <img src="{{ $item->anh_bia_sach }}" alt="{{ $item->ten_sach }}" itemprop="image" />
                                                </a>
                                            </td>
                                            <td class="text">
                                                <h2 class="crop-text-2" itemprop="name">
                                                    <a href="" title="{{ $item->ten_sach }}" itemprop="url">{{ $item->ten_sach }}</a>
                                                </h2>
                                                <div class="content">
                                                    <p class="crop-text-1 color-gray">
                                                        <span class="fa fa-user"></span> Tác giả:
                                                        <span itemprop="author">
                                                            <a href="" rel="tag">{{ $item->user->ten_doc_gia }}</a>
                                                        </span>
                                                    </p>
                                                    <p class="crop-text-2" itemprop="description">{{ $item->description }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach

                        @endif

                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center">
                            <span class="btn-primary-border font-12 font-oswald" data-maxpage="138">Xem Thêm Truyện →</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <style type="text/css">
                    /*-------------------------------------------------------------------------- | layout bxh truyện |--------------------------------------------------------------------------*/
                    .nav-tabs>li.active>a,
                    .nav-tabs>li.active>a:hover,
                    .nav-tabs>li.active>a:focus {
                        background: -webkit-linear-gradient(135deg, #39dfaa 10%, #1ebbf0 100%);
                        text-align: center;
                        color: white;
                        border: unset;
                    }

                    .nav-tabs {
                        margin-bottom: 10px;
                        font-size: 12px;
                        border-bottom: 1px solid #1ebbf0;
                    }

                    .nav.nav-tabs-css>li>a {
                        padding: 5px 5px;
                        font-weight: 600;
                        text-align: center;
                    }

                    .nav-tabs>li>a {
                        border-radius: unset;
                    }

                    .nav-tabs>li {
                        margin-bottom: -3px;
                        width: 25%;
                    }

                    .nav-tabs>li>a:hover {
                        border-color: transparent;
                    }

                    .nav>li>a:hover,
                    .nav>li>a:focus {
                        background: -webkit-linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        color: transparent;
                        -webkit-background-clip: text;
                        text-decoration: none;
                    }

                    .row-heading .form-group {
                        margin-bottom: 0px;
                    }
                </style>
                <div class="row row-heading">
                    <div class="col-xs-7">
                        <h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i> Tiên Hiệp Hay </h2>
                    </div>
                    <div class="col-xs-5">
                        <div class="pull-right">
                            <div class="form-group"> <select class="form-control select-bxh select-topdanhvong"
                                    data-id="topdanhvong">
                                    <option value="week">Tuần Này</option>
                                    <option value="month">Tháng Này</option>
                                </select> </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-tabs-css nav-topdanhvong" data-id="topdanhvong">
                    <li role="presentation" data-date="ticket" class="active"><a>Kim Bài</a></li>
                    <li role="presentation" data-date="revenue"><a>Thánh Bảng</a></li>
                </ul>
                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        <li class="item">
                            <div class="index index-1"><i class="icon-medal-1"></i></div>
                            <div class="content media">
                                <div class="info"><strong class="crop-text-2"><a
                                            href="../../truyen/ta-lam-phu-than-chet-tham-cua-long-ngao-thien-xuyen-thu/index.html"
                                            class="d-block">Ta Làm Phụ Thân Chết Thảm Của Long Ngạo Thiên [Xuyên
                                            Thư]</a></strong>
                                    <div class="view color-gray"><i class="fa fa-ticket" aria-hidden="true"></i> 1.3M
                                    </div>
                                    <div class="crop-text-1 color-gray"></div>
                                </div>
                                <div class="thumb">
                                    <div class="book-cover"><a
                                            href="../../truyen/ta-lam-phu-than-chet-tham-cua-long-ngao-thien-xuyen-thu/index.html"
                                            title="Ta Làm Phụ Thân Chết Thảm Của Long Ngạo Thiên [Xuyên Thư]"
                                            class="book-cover-link"><img
                                                src="{{ asset('assets/client/uploads/2024/09/ta-lam-phu-than-chet-tham-cua-long-ngao-thien-xuyen-thu-1725615749.jpg')}}"
                                                alt="Ta Làm Phụ Thân Chết Thảm Của Long Ngạo Thiên [Xuyên Thư]"></a><span
                                            class="book-cover-shadow"></span></div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-2"></i></div>
                            <div class="content media"><a
                                    href="../../truyen/nguoi-khac-tu-tien-ta-tu-menh-menh-nu-chu-cung-khong-cung-bang-ta/index.html"
                                    class="crop-text-1">Người Khác Tu Tiên Ta Tu Mệnh, Mệnh Nữ Chủ Cũng Không Cứng Bằng
                                    Ta</a><span class="color-gray item-number">1.1M</span></div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-3"></i></div>
                            <div class="content media"><a
                                    href="../../truyen/vai-chinh-luon-muon-cuop-co-duyen-cua-ta/index.html"
                                    class="crop-text-1">Vai Chính Luôn Muốn Cướp Cơ Duyên Của Ta</a><span
                                    class="color-gray item-number">445K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">4</div>
                            <div class="content media"><a
                                    href="../../truyen/nghe-len-tieng-long-toan-tong-phao-hoi-cung-hac-hoa/index.html"
                                    class="crop-text-1">Nghe Lén Tiếng Lòng, Toàn Tông Pháo Hôi Cùng Hắc Hóa</a><span
                                    class="color-gray item-number">230K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">5</div>
                            <div class="content media"><a
                                    href="../../truyen/xuyen-thanh-tinh-dich-long-ngao-thien/index.html"
                                    class="crop-text-1">Xuyên Thành Tình Địch Long Ngạo Thiên</a><span
                                    class="color-gray item-number">217K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">6</div>
                            <div class="content media"><a
                                    href="../../truyen/tuyet-the-than-y-nghich-thien-ma-phi/index.html"
                                    class="crop-text-1">Tuyệt Thế Thần Y: Nghịch Thiên Ma Phi</a><span
                                    class="color-gray item-number">210K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">7</div>
                            <div class="content media"><a
                                    href="../../truyen/tieu-su-muoi-la-bao-boi-cua-thien-dao/index.html"
                                    class="crop-text-1">Tiểu Sư Muội Là Bảo Bối Của Thiên Đạo</a><span
                                    class="color-gray item-number">175K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">8</div>
                            <div class="content media"><a
                                    href="../../truyen/nhan-vat-chinh-van-nhan-me-yeu-tham-toi-da-tro-nen-co-chap/index.html"
                                    class="crop-text-1">Nhân Vật Chính Vạn Nhân Mê Yêu Thầm Tôi Đã Trở Nên Cố
                                    Chấp</a><span class="color-gray item-number">99K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">9</div>
                            <div class="content media"><a
                                    href="../../truyen/xuyen-qua-di-the-chi-xuat-sac-sinh-hoat/index.html"
                                    class="crop-text-1">Xuyên Qua Dị Thế Chi Xuất Sắc Sinh Hoạt</a><span
                                    class="color-gray item-number">90K</span></div>
                        </li>
                        <li class="item">
                            <div class="index">10</div>
                            <div class="content media"><a
                                    href="../../truyen/toan-tong-mon-deu-la-cho-liem-chi-co-ta-la-cho-that/index.html"
                                    class="crop-text-1">Toàn Tông Môn Đều Là Chó Liếm, Chỉ Có Ta Là Chó Thật</a><span
                                    class="color-gray item-number">80K</span></div>
                        </li>
                    </ul>
                </div>
                <div id="sidebar-tax" class="sidebar-right sidebar-more">
                    <h2 class="heading ztop-15"><i class="fa fa-info-circle" aria-hidden="true"></i> Có Thể Hữu Ích?
                    </h2>
                    <p><strong>Tiên Hiệp</strong> thường kể về tam giới: Tiên &#8211; Nhân &#8211; Ma.<br /> Truyện Tiên
                        Hiệp, là thế giới tưởng tượng tiếp theo của <a href="../kiem-hiep/index.html">Kiếm Hiệp</a>, các
                        nhân vật tu luyện những tâm pháp cao hơn sử dụng linh khí (linh lực, tiên lực, thần lực), ở <a
                            href="../di-gioi/index.html">Dị Giới</a>, <a href="../huyen-huyen/index.html">Huyền
                            Huyễn</a> thì tu luyện ma pháp.</p>
                    <p>Trong truyện tiên hiệp thường chia ra những cấp bậc tu luyện trước khi thành tiên như sau:</p>
                    <ul class="info">
                        <li>Luyện Khí</li>
                        <li>Khai Quang</li>
                        <li>Trúc Cơ</li>
                        <li>Ích Cốc</li>
                        <li>Kết Đan (Kim Đan)</li>
                        <li>Nguyên Anh</li>
                        <li>Hóa Thần (Phân Thần)</li>
                        <li>Hợp Thể</li>
                        <li>Độ Kiếp</li>
                        <li>Đại Thừa</li>
                    </ul>
                    <p>Sau khi thành tiên thì có những cấp bậc:</p>
                    <ul class="info">
                        <li>Tán Tiên</li>
                        <li>Tiên Nhân</li>
                        <li>Địa Tiên</li>
                        <li>Thiên Tiên</li>
                        <li>Thượng Tiên</li>
                        <li>Kim Tiên</li>
                        <li>Huyền Tiên</li>
                        <li>Đại La Kim Tiên</li>
                        <li>Tiên Vương</li>
                        <li>Tiên Tôn</li>
                        <li>Tiên Đế</li>
                    </ul>
                    <p>Ngoài ra còn có những cấp độ ngoài tiên như Bán Thánh, Vô Cực Thánh Nhân,.. dựa theo trí tưởng
                        tượng của tác giả.</p>
                    <p>Một số tác phẩm Tiên Hiệp tiêu biểu như <a href="../../truyen/tru-tien/index.html">Tru Tiên</a>.
                    </p> <span class="btn-black-border font-14"><a href="../co-dien-tien-hiep/index.html">Cổ Điển Tiên
                            Hiệp</a></span><span class="btn-black-border font-14"><a
                            href="../co-tien-hiep/index.html">Cổ Tiên Hiệp</a></span><span
                        class="btn-black-border font-14"><a href="../tien-hiep-tu-chan/index.html">Tiên hiệp tu
                            chân</a></span><span class="btn-black-border font-14"><a
                            href="../tieu-thuyet-tien-hiep/index.html">Tiểu Thuyết Tiên Hiệp</a></span><span
                        class="btn-black-border font-14"><a href="../vien-tuong-tien-hiep/index.html">viễn tưởng tiên
                            hiệp</a></span><span class="btn-black-border font-14"><a href="xuyen-khong/index.html">Xuyên
                            Không</a></span><span class="btn-black-border font-14"><a
                            href="sac/index.html">Sắc</a></span><span class="btn-black-border font-14"><a
                            href="he-thong/index.html">Hệ Thống</a></span><span class="btn-black-border font-14"><a
                            href="hai-huoc/index.html">Hài Hước</a></span>
                </div>
            </div>
        </div>
        <style type="text/css">
            .book-cover {
                transform: perspective(70px);
            }

            .tax-slide {
                overflow-x: auto;
                overflow-y: hidden;
                margin: 0;
                white-space: nowrap;
                text-align: center;
                position: relative;
                margin-bottom: 10px;
            }

            #follow_tax {
                display: inline-block;
                float: right;
            }

            h1 {
                display: inline-block;
                width: calc(100% - 100px);
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            @media screen and (min-width: 768px) {
                #heading_tax {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 15px
                }

                h1 {
                    order: 1;
                    width: unset;
                }

                #follow_tax {
                    order: 3
                }

                .tax-slide {
                    order: 2
                }

                #follow_tax {
                    margin-left: 20px;
                }
            }
        </style>
    </div>
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-8"> </div>
            <div class="col-xs-12 col-md-4 sidebar-right"> </div>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item active">Từ Khóa</li>
            <li class="breadcrumb-item"><a href="index.html">Tiên Hiệp</a></li>
        </ol>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tags = document.querySelectorAll('.tag.add');
        tags.forEach(tag => {
            tag.addEventListener('click', function() {
                const genreId = this.dataset.keywordslug;
                fetch(`{{ url('the-loai') }}?id=${genreId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const contentKeyword = document.getElementById('content-keyword');
                        contentKeyword.innerHTML = '';
                        const totalBooks = data.total;
                        document.querySelector('.pull-left').textContent = `${totalBooks} truyện`;
                        if (totalBooks > 0) {
                            let row;
                            data.sach.forEach((sach, index) => {
                                if (index % 2 === 0) {
                                    row = document.createElement('div');
                                    row.classList.add('row');
                                    contentKeyword.appendChild(row);
                                }
                                const col = document.createElement('div');
                                col.classList.add('col-md-6', 'col-sm-6', 'col-xs-12');
                                col.innerHTML = `
                            <table class="theloai-thumlist">
                                <tbody>
                                    <tr itemscope itemtype="https://schema.org/Book">
                                        <td>
                                            <meta itemprop="bookFormat" content="EBook" />
                                            <a href="" class="thumbnail" title="${sach.ten_sach}">
                                                <img src="${sach.anh_bia_sach}" alt="${sach.ten_sach}" itemprop="image" />
                                            </a>
                                        </td>
                                        <td class="text">
                                            <h2 class="crop-text-2" itemprop="name">
                                                <a href="" title="${sach.ten_sach}" itemprop="url">${sach.ten_sach}</a>
                                            </h2>
                                            <div class="content">
                                                <p class="crop-text-1 color-gray">
                                                    <span class="fa fa-user"></span> Tác giả:
                                                    <span itemprop="author">
                                                        <a href="" rel="tag">${sach.tac_gia}</a>
                                                    </span>
                                                </p>
                                                <p class="crop-text-2" itemprop="description">${sach.tom_tat}</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        `;
                                row.appendChild(col);
                            });
                        } else {
                            contentKeyword.innerHTML = '<p>Không có sách nào thuộc thể loại này.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Có lỗi xảy ra:', error);
                        contentKeyword.innerHTML = '<p>Không thể tải sách, vui lòng thử lại.</p>';
                    });
            });
        });
    });

</script>


@endpush
