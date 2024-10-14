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
            <li class="breadcrumb-item"><a href="index.html">Tiên Hiệp</a></li>
        </ol>
    </div>
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12" id="heading_tax">
                <h1
                    data-term="{&quot;taxonomy&quot;:&quot;keyword&quot;,&quot;slug&quot;:&quot;tien-hiep&quot;,&quot;name&quot;:&quot;Ti\u00ean Hi\u1ec7p&quot;}">
                    Tiên Hiệp</h1>
                <div id="follow_tax"> <span class="btn btn-sm color-primary border-primary"><i
                            class="fa fa-plus-square fa-spin color-primary" aria-hidden="true"></i> BookMark</span>
                </div>
               
            </div>
            <div class="col-xs-12 col-md-8">





                <h2 class="heading ztop-30"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách Tiên Hiệp</h2>
                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <div id="slider-keyword"> <span class="tag active" id="current-keyword">Tiên Hiệp</span> <span
                            class="tag add" data-keywordslug="1x1" data-keywordname="1x1">1x1 <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="bach-hop"
                            data-keywordname="Bách Hợp">Bách Hợp <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="co-dai" data-keywordname="Cổ Đại">Cổ Đại <i
                                class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="dam-my" data-keywordname="Đam Mỹ">Đam Mỹ <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="di-gioi"
                            data-keywordname="Dị Giới">Dị Giới <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="di-nang" data-keywordname="Dị Năng">Dị Năng <i
                                class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="do-thi" data-keywordname="Đô Thị">Đô Thị <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="dong-nhan"
                            data-keywordname="Đồng Nhân">Đồng Nhân <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="hac-bang" data-keywordname="Hắc Bang">Hắc Bang <i
                                class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="hai-huoc" data-keywordname="Hài Hước">Hài Hước <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="he-thong"
                            data-keywordname="Hệ Thống">Hệ Thống <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="huyen-huyen" data-keywordname="Huyền Huyễn">Huyền Huyễn
                            <i class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="kiem-hiep" data-keywordname="Kiếm Hiệp">Kiếm Hiệp <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="ky-huyen"
                            data-keywordname="Kỳ Huyễn">Kỳ Huyễn <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="linh-di" data-keywordname="Linh Dị">Linh Dị <i
                                class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="mat-the" data-keywordname="Mạt Thế">Mạt Thế <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="ngon-tinh"
                            data-keywordname="Ngôn Tình">Ngôn Tình <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="np" data-keywordname="NP">NP <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="quan-truong"
                            data-keywordname="Quan Trường">Quan Trường <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="sac"
                            data-keywordname="Sắc">Sắc <i class="fa fa-plus" aria-hidden="true"></i></span> <span
                            class="tag add" data-keywordslug="trinh-tham" data-keywordname="Trinh Thám">Trinh Thám <i
                                class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="trong-sinh" data-keywordname="Trọng Sinh">Trọng Sinh <i class="fa fa-plus"
                                aria-hidden="true"></i></span> <span class="tag add" data-keywordslug="vong-du"
                            data-keywordname="Võng Du">Võng Du <i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="tag add" data-keywordslug="xuyen-khong" data-keywordname="Xuyên Không">Xuyên Không
                            <i class="fa fa-plus" aria-hidden="true"></i></span> <span class="tag add"
                            data-keywordslug="zombie" data-keywordname="Zombie">Zombie <i class="fa fa-plus"
                                aria-hidden="true"></i></span> </div>
                    <hr />
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left"> 2479 truyện </div>
                            <div class="pull-right">
                                <div class="form-group"> <select id="filter_keyword_tax" class="form-control">
                                        <option value="new-chap">Mới Cập Nhật</option>
                                        <option value="ticket_new">Mới Được Đẩy</option>
                                        <option value="new">Truyện Mới</option>
                                        <option value="new-full">Hoàn Thành</option>
                                        <option value="top-ticket-week">🏆Top Đề Cử - Tuần</option>
                                        <option value="top-ticket-month">🏆Top Đề Cử - Tháng</option>
                                        <option value="top-ticket-total">🏆Top Đề Cử - Tất Cả</option>
                                        <option value="top-revenue-week">💸Top Doanh Thu - Tuần</option>
                                        <option value="top-revenue-month">💸Top Doanh Thu - Tháng</option>
                                    </select> </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <table class="theloai-thumlist">
                            <tbody>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/van-co-de-nhat-than/index.html" class="thumbnail"
                                            title="Vạn Cổ Đệ Nhất Thần"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2022/11/8472651.jpg"
                                                alt="Vạn Cổ Đệ Nhất Thần" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/van-co-de-nhat-than/index.html"
                                                title="Vạn Cổ Đệ Nhất Thần" itemprop="url"> Vạn Cổ Đệ Nhất Thần </a>
                                        </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/phong-thanh-duong%e2%80%8b/index.html"
                                                        rel="tag">Phong Thanh Dương​</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Lý Thiên Mệnh nằm mơ đều cười
                                                tỉnh, thú nuôi nhà hắn đều là Cự Thú Hỗn Độn Thái Cổ.Gà của hắn là
                                                Phượng Hoàng Luyện Ngục Vĩnh Hằng&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/ta-cung-vai-ac-song-nuong-tua-lan-nhau/index.html"
                                            class="thumbnail" title="Ta Cùng Vai Ác Sống Nương Tựa Lẫn Nhau"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2021/05/ta-cung-vai-ac-song-nuong-tua-lan-nhau.jpg"
                                                alt="Ta Cùng Vai Ác Sống Nương Tựa Lẫn Nhau" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/ta-cung-vai-ac-song-nuong-tua-lan-nhau/index.html"
                                                title="Ta Cùng Vai Ác Sống Nương Tựa Lẫn Nhau" itemprop="url"> Ta Cùng
                                                Vai Ác Sống Nương Tựa Lẫn Nhau </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/ho-do/index.html"
                                                        rel="tag">Hồ Đồ</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Đây là hành trình xuyên 3000
                                                thế giới của nữ chủ ngốc bạch ngọt để cứu vớt Boss phản diện chậm rãi
                                                buông xuống tâm lý âm u, sống&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/moi-nguoi-tu-tien-ta-lam-ruong/index.html"
                                            class="thumbnail" title="Mọi Người Tu Tiên, Ta Làm Ruộng"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2023/06/moi-nguoi-tu-tien-ta-lam-ruong.jpg"
                                                alt="Mọi Người Tu Tiên, Ta Làm Ruộng" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/moi-nguoi-tu-tien-ta-lam-ruong/index.html"
                                                title="Mọi Người Tu Tiên, Ta Làm Ruộng" itemprop="url"> Mọi Người Tu
                                                Tiên, Ta Làm Ruộng </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/trieu-van-dao/index.html" rel="tag">Triêu
                                                        Văn Đạo</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Lục Huyền tỉnh dậy, trở thành
                                                một tán tu Linh thực sư phổ thông trong phường thị, trông coi một mẫu ba
                                                phần linh điền, sống tạm tại giới&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/ta-tu-tien-tai-gia-toc/index.html" class="thumbnail"
                                            title="Ta Tu Tiên Tại Gia Tộc"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2022/09/ta-tu-tien-tai-gia-toc-1663791301.jpg"
                                                alt="Ta Tu Tiên Tại Gia Tộc" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/ta-tu-tien-tai-gia-toc/index.html"
                                                title="Ta Tu Tiên Tại Gia Tộc" itemprop="url"> Ta Tu Tiên Tại Gia Tộc
                                            </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/tieu-bach-bien-lao-bach/index.html"
                                                        rel="tag">Tiểu Bạch Biến Lão Bạch</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Trùng sinh trở thành một tiểu
                                                tu sĩ của một gia tộc lụi tàn toạ lạc tại Song Hồ đảo, Trần Đạo Huyền
                                                vốn cho rằng nhân sinh của&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/toan-dan-chuyen-chuc-tu-linh-phap-su-ta-chinh-la-thien-tai/index.html"
                                            class="thumbnail"
                                            title="Toàn Dân Chuyển Chức: Tử Linh Pháp Sư! Ta Chính Là Thiên Tai"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/03/toan-dan-chuyen-chuc-tu-linh-phap-su-ta-chinh-la-thien-tai.jpg"
                                                alt="Toàn Dân Chuyển Chức: Tử Linh Pháp Sư! Ta Chính Là Thiên Tai"
                                                itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/toan-dan-chuyen-chuc-tu-linh-phap-su-ta-chinh-la-thien-tai/index.html"
                                                title="Toàn Dân Chuyển Chức: Tử Linh Pháp Sư! Ta Chính Là Thiên Tai"
                                                itemprop="url"> Toàn Dân Chuyển Chức: Tử Linh Pháp Sư! Ta Chính Là Thiên
                                                Tai </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/man-do-dich-tru/index.html" rel="tag">Man Đồ
                                                        Đích Trư</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Nhóm Dịch: Dũng Mãnh Phi
                                                ThườngTrò chơi phủ xuống thực tế, quy tắc thế giới bị phá vỡ, nhân loại
                                                tiến vào thời đại toàn dân chuyển chức.Ma vật&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/nghe-len-tieng-long-toan-tong-phao-hoi-cung-hac-hoa/index.html"
                                            class="thumbnail"
                                            title="Nghe Lén Tiếng Lòng, Toàn Tông Pháo Hôi Cùng Hắc Hóa"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/10/nghe-len-tieng-long-toan-tong-phao-hoi-cung-hac-hoa-1727823180.jpg"
                                                alt="Nghe Lén Tiếng Lòng, Toàn Tông Pháo Hôi Cùng Hắc Hóa"
                                                itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/nghe-len-tieng-long-toan-tong-phao-hoi-cung-hac-hoa/index.html"
                                                title="Nghe Lén Tiếng Lòng, Toàn Tông Pháo Hôi Cùng Hắc Hóa"
                                                itemprop="url"> Nghe Lén Tiếng Lòng, Toàn Tông Pháo Hôi Cùng Hắc Hóa
                                            </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/tieu-mien-duong-bat-mien/index.html"
                                                        rel="tag">Tiểu Miên Dương Bất Miên</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Chu Lục Lục học người ta ngự
                                                kiếm phi hành, kết quả lại chơi lớn mà xuyên vào trong tiểu thuyết tu
                                                tiên, trở thành một thành viên trong&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/nhan-vat-chinh-van-nhan-me-yeu-tham-toi-da-tro-nen-co-chap/index.html"
                                            class="thumbnail"
                                            title="Nhân Vật Chính Vạn Nhân Mê Yêu Thầm Tôi Đã Trở Nên Cố Chấp"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/07/nhan-vat-chinh-van-nhan-me-yeu-tham-toi-da-tro-nen-co-chap-1721228577.jpg"
                                                alt="Nhân Vật Chính Vạn Nhân Mê Yêu Thầm Tôi Đã Trở Nên Cố Chấp"
                                                itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/nhan-vat-chinh-van-nhan-me-yeu-tham-toi-da-tro-nen-co-chap/index.html"
                                                title="Nhân Vật Chính Vạn Nhân Mê Yêu Thầm Tôi Đã Trở Nên Cố Chấp"
                                                itemprop="url"> Nhân Vật Chính Vạn Nhân Mê Yêu Thầm Tôi Đã Trở Nên Cố
                                                Chấp </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/chuoc-dang/index.html"
                                                        rel="tag">Chước Đăng</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Mộc Huyền xuyên không vào một
                                                cuốn tiểu thuyết đam mỹ vạn nhân mê.Nhân vật chính trong truyện, Trì Vân
                                                Kính, có tài sắc tuyệt đỉnh, làm các nhân&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"
                                            class="thumbnail" title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11759157-1728028123.jpg"
                                                alt="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng"
                                                itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"
                                                title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng" itemprop="url">
                                                Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/hoa-nhat-v/index.html"
                                                        rel="tag">Hòa Nhật V</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">[Nhiều nam chính + Tu la tràng
                                                + Cạnh tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều
                                                xuyên sách rồi, nhiệm vụ là cùng lúc công&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/khong-lam-nu-xung-trong-tieu-thuyet-ngot-sung/index.html"
                                            class="thumbnail" title="Không Làm Nữ Xứng Trong Tiểu Thuyết Ngọt Sủng">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/10/khong-lam-nu-xung-trong-tieu-thuyet-ngot-sung-1728632752.jpg"
                                                alt="Không Làm Nữ Xứng Trong Tiểu Thuyết Ngọt Sủng" itemprop="image" />
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/khong-lam-nu-xung-trong-tieu-thuyet-ngot-sung/index.html"
                                                title="Không Làm Nữ Xứng Trong Tiểu Thuyết Ngọt Sủng" itemprop="url">
                                                Không Làm Nữ Xứng Trong Tiểu Thuyết Ngọt Sủng </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/tong-on/index.html"
                                                        rel="tag">Tòng Ôn</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Niên Triều Tịch xuyên vào một
                                                cuốn tiểu thuyết ngọt sủng.Nàng là nữ xứng sống không quá một chương,
                                                được nuông chiều khiến cho người khác không vừa mắt.Nghĩa&nbsp;&hellip;
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/khi-dai-lao-max-cap-xuyen-thanh-thanh-phu/index.html"
                                            class="thumbnail" title="Khi Đại Lão Max Cấp Xuyên Thành Thánh Phụ"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/04/10869902.jpg"
                                                alt="Khi Đại Lão Max Cấp Xuyên Thành Thánh Phụ" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/khi-dai-lao-max-cap-xuyen-thanh-thanh-phu/index.html"
                                                title="Khi Đại Lão Max Cấp Xuyên Thành Thánh Phụ" itemprop="url"> Khi
                                                Đại Lão Max Cấp Xuyên Thành Thánh Phụ </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/thien-tan-hoan/index.html" rel="tag">Thiên
                                                        Tẫn Hoan</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Lúc Cố Diệp Phong đọc tiểu
                                                thuyết, ghét nhất là thấy nhân vật chính hở chút là phát điên, nổi khùng
                                                gì đó.Làm thánh mẫu không phải tốt hơn&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/the-ga/index.html" class="thumbnail" title="Thế Gả"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11630028.jpg"
                                                alt="Thế Gả" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/the-ga/index.html" title="Thế Gả" itemprop="url"> Thế
                                                Gả </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/quy-son-ngoc/index.html"
                                                        rel="tag">Quy Sơn Ngọc</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Phụ thân nói, thân thể của a
                                                tỷ nàng không tốt, Thanh Châu quá xa, nàng ta không thể đi được.A tỷ
                                                nói, ta thích sư tôn của muội,&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/van-nguoi-ngai-han-khong-nghi-han-tro-lai/index.html"
                                            class="thumbnail" title="Vạn Người Ngại Hắn, Không Nghĩ Hắn Trở Lại"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11813118-1728754244.jpg"
                                                alt="Vạn Người Ngại Hắn, Không Nghĩ Hắn Trở Lại" itemprop="image" />
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <span
                                                class="label-title label-new"></span> <a
                                                href="../../truyen/van-nguoi-ngai-han-khong-nghi-han-tro-lai/index.html"
                                                title="Vạn Người Ngại Hắn, Không Nghĩ Hắn Trở Lại" itemprop="url"> Vạn
                                                Người Ngại Hắn, Không Nghĩ Hắn Trở Lại </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/van-hanh-vu-thi/index.html" rel="tag">Vân
                                                        Hành Vũ Thi</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">[Vạn người e ngại, nhưng lại
                                                có vạn kẻ mê muội hắn.]An Cửu là một nhân vật trong truyện tu tiên, đóng
                                                vai trò một pháo hôi ác độc.Vì&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/tro-choi-cung-cac-tien-tu/index.html" class="thumbnail"
                                            title="Trò Chơi Cùng Các Tiên Tử"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/04/tro-choi-cung-cac-tien-tu-1714306488.jpg"
                                                alt="Trò Chơi Cùng Các Tiên Tử" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/tro-choi-cung-cac-tien-tu/index.html"
                                                title="Trò Chơi Cùng Các Tiên Tử" itemprop="url"> Trò Chơi Cùng Các Tiên
                                                Tử </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/son-trung-kho-cot/index.html" rel="tag">Sơn
                                                        Trung Khô Cốt</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Lý Mộc Dương xuyên không, tin
                                                tốt là có hệ thống, còn tin xấu là hệ thống này chỉ có thể để chơi trò
                                                chơi. Bỏ đi, chơi trò&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/son-hai-de-dang/index.html" class="thumbnail"
                                            title="Sơn Hải Đề Đăng"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/09/son-hai-de-dang-1727262327.jpg"
                                                alt="Sơn Hải Đề Đăng" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/son-hai-de-dang/index.html" title="Sơn Hải Đề Đăng"
                                                itemprop="url"> Sơn Hải Đề Đăng </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/duoc-thien-sau/index.html" rel="tag">Dược
                                                        Thiên Sầu</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Nữ nhân cầm tay thiếu niên,
                                                hướng dẫn hắn viết ra chữ &quot;Sư&quot;, thế là thiếu niên có họ. Đốt
                                                đèn soi sơn hải, khát vọng tỏa sáng không&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/tieu-su-de-van-nhan-me-chi-muon-giu-nam-duc/index.html"
                                            class="thumbnail" title="Tiểu Sư Đệ Vạn Nhân Mê Chỉ Muốn Giữ Nam Đức"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/07/11308750.jpg"
                                                alt="Tiểu Sư Đệ Vạn Nhân Mê Chỉ Muốn Giữ Nam Đức" itemprop="image" />
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/tieu-su-de-van-nhan-me-chi-muon-giu-nam-duc/index.html"
                                                title="Tiểu Sư Đệ Vạn Nhân Mê Chỉ Muốn Giữ Nam Đức" itemprop="url"> Tiểu
                                                Sư Đệ Vạn Nhân Mê Chỉ Muốn Giữ Nam Đức </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/thu-me%cc%83-thu-me%cc%83-tho%cc%89/index.html"
                                                        rel="tag">Thu Mễ Thu Mễ Thỏ</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Là tiểu sư đệ xinh đẹp nhất
                                                trong Hợp Hoan Cung, Đào Khanh là một vạn nhân mê chính hiệu, người mến
                                                mộ nhiều như cá diếc qua sông.&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/xuyen-thanh-de-de-cua-tru-vuong/index.html"
                                            class="thumbnail" title="Xuyên Thành Đệ Đệ Của Trụ Vương"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/06/xuyen-thanh-de-de-cua-tru-vuong-1717814612.jpg"
                                                alt="Xuyên Thành Đệ Đệ Của Trụ Vương" itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/xuyen-thanh-de-de-cua-tru-vuong/index.html"
                                                title="Xuyên Thành Đệ Đệ Của Trụ Vương" itemprop="url"> Xuyên Thành Đệ
                                                Đệ Của Trụ Vương </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/van-tieu-yx/index.html"
                                                        rel="tag">Vân Tiêu YX</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Đế nhị đại Tử Thăng vô cùng
                                                vừa lòng vì mình xuyên qua.Cậu vừa sinh ra đã ngồi lên vị trí cực kỳ tôn
                                                quý, đến cả đế vương&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/tieu-su-muoi-phan-nghich-khong-muon-doi-noi-thay-nu-chu-nua/index.html"
                                            class="thumbnail"
                                            title="Tiểu Sư Muội Phản Nghịch Không Muốn Đội Nồi Thay Nữ Chủ Nữa"> <img
                                                src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/03/tieu-su-muoi-phan-nghich-khong-muon-doi-noi-thay-nu-chu-nua-1711421617.jpg"
                                                alt="Tiểu Sư Muội Phản Nghịch Không Muốn Đội Nồi Thay Nữ Chủ Nữa"
                                                itemprop="image" /> </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/tieu-su-muoi-phan-nghich-khong-muon-doi-noi-thay-nu-chu-nua/index.html"
                                                title="Tiểu Sư Muội Phản Nghịch Không Muốn Đội Nồi Thay Nữ Chủ Nữa"
                                                itemprop="url"> Tiểu Sư Muội Phản Nghịch Không Muốn Đội Nồi Thay Nữ Chủ
                                                Nữa </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a
                                                        href="../../tac-gia/nguyet-ha-chap-dang/index.html"
                                                        rel="tag">Nguyệt Hạ Chấp Đăng</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Lục Linh Du xuyên thành một nữ
                                                xứng pháo hôi trong một quyển tu tiên văn đoàn sủng.Nguyên chủ không làm
                                                gì hết, nhưng lại là người chuyên bị&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                    <td>
                                        <meta itemprop="bookFormat" content="EBook" /> <a
                                            href="../../truyen/su-ty-noi-dien-quay-duc-nuoc-toan-tu-chan-gioi/index.html"
                                            class="thumbnail" title="Sư Tỷ Nổi Điên Quậy Đục Nước Toàn Tu Chân Giới">
                                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                                data-src="https://truyenhdt.com/wp-content/uploads/2024/09/su-ty-noi-dien-quay-duc-nuoc-toan-tu-chan-gioi-1726319165.jpg"
                                                alt="Sư Tỷ Nổi Điên Quậy Đục Nước Toàn Tu Chân Giới" itemprop="image" />
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2" itemprop="name"> <a
                                                href="../../truyen/su-ty-noi-dien-quay-duc-nuoc-toan-tu-chan-gioi/index.html"
                                                title="Sư Tỷ Nổi Điên Quậy Đục Nước Toàn Tu Chân Giới" itemprop="url">
                                                Sư Tỷ Nổi Điên Quậy Đục Nước Toàn Tu Chân Giới </a> </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả:
                                                <span itemprop="author"> <a href="../../tac-gia/thua-nha/index.html"
                                                        rel="tag">Thừa Nha</a> </span> </p>
                                            <p class="crop-text-2" itemprop="description">Một ngày nọ Tạ Khuynh xuyên
                                                sách, xuyên thành nữ phụ pháo hôi trong sách, sống trong tông môn vừa
                                                nghèo vừa yếu.Ai muốn đối nghịch với nữ chủ?&nbsp;&hellip;</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center"><span class="btn-primary-border font-12 font-oswald"
                                data-maxpage="138">Xem Thêm Truyện →</span></div>
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

@endpush
