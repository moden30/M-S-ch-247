@extends('client.layouts.app')
@section('content')
@push('styles')
<style>
    .header-logo {
        display: block;
        width: 150px;
        height: 50px;
        background: url('../wp-content/themes/truyenfull/echo/img/logo/truyenhd.png');
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: center;
        text-indent: -9999px;
        white-space: nowrap;
        outline: 0
    }

    .link-color,
    .link-color a,
    a.link-color {
        color: #6495ed
    }

    .link-under,
    .link-under a,
    a.link-under {
        color: #282c06;
        border-bottom: 1px dotted
    }

    .container-breadcrumb .breadcrumb {
        margin-top: 0
    }

    .ztop-50,
    .ztop-mb-50,
    .ztop-xs-50,
    ,
    .ztop-sm-50 {
        padding-top: 50px
    }

    .ztop-30,
    .ztop-mb-30 {
        padding-top: 30px
    }

    .ztop-20,
    .ztop-mb-20 {
        padding-top: 20px
    }

    .ztop-15,
    .ztop-mb-15 {
        padding-top: 15px
    }

    .ztop-10,
    .ztop-mb-10 {
        padding-top: 10px
    }

    .ztop-5,
    .ztop-mb-5 {
        padding-top: 5px
    }

    .zbottom-30,
    .zbottom-mb-30 {
        padding-bottom: 30px
    }

    .zbottom-20,
    .zbottom-mb-20 {
        padding-bottom: 20px
    }

    .zbottom-15,
    .zbottom-mb-15 {
        padding-bottom: 15px
    }

    .zbottom-10,
    .zbottom-mb-10 {
        padding-bottom: 10px
    }

    .zbottom-5,
    .zbottom-mb-5 {
        padding-bottom: 5px
    }

    .zbottom-pc-10,
    .zbottom-pc-15,
    .zbottom-pc-20,
    .zbottom-pc-30 {
        padding-bottom: 0px
    }

    .ztop-pc-10,
    .ztop-pc-15,
    .ztop-pc-20,
    .ztop-pc-30 {
        padding-bottom: 0px
    }

    @media (min-width:992px) {

        .zbottom-mb-10,
        .zbottom-mb-15,
        .zbottom-mb-20,
        .zbottom-mb-30 {
            padding-bottom: 0px
        }

        .ztop-mb-10,
        .ztop-mb-15,
        .ztop-mb-20,
        .ztop-mb-30,
        .ztop-mb-50,
        .ztop-sm-50 {
            padding-top: 0px
        }

        .ztop-pc-30 {
            padding-top: 30px
        }

        .ztop-pc-20 {
            padding-top: 20px
        }

        .ztop-pc-15 {
            padding-top: 15px
        }

        .ztop-pc-10 {
            padding-top: 10px
        }

        .ztop-pc-5 {
            padding-top: 5px
        }

        .zbottom-pc-30 {
            padding-bottom: 30px
        }

        .zbottom-pc-20 {
            padding-bottom: 20px
        }

        .zbottom-pc-15 {
            padding-bottom: 15px
        }

        .zbottom-pc-10 {
            padding-bottom: 10px
        }

        .zbottom-pc-5 {
            padding-bottom: 5px
        }
    }

    @media (min-width:768px) {
        .ztop-xs-50 {
            padding-top: 0px
        }
    }

    #footer .list-link a:after {
        margin: 0px 10px;
        content: "-";
    }

    #footer .list-link a:last-child:after {
        margin: 0px;
        content: unset;
    }

    ins.adsbygoogle[data-ad-status="unfilled"] {
        display: none !important;
    }

    .alert-primary {
        background: linear-gradient(to right, #1ebbf045, #39dfaa1c);
        border-color: #1ebbf0;
        color: black;
    }

    .navbar {
        margin-bottom: 10px;
    }

    nav.navbar form.navbar-form {
        padding: unset;
        margin-left: unset;
        margin-right: unset;
    }

    nav.navbar form.navbar-form .form-group {
        display: flex;
        margin-left: 15px;
        margin-right: 15px;
    }

    nav.navbar form.navbar-form .form-group .form-control {
        margin-right: 5px;
    }

    @media (min-width: 768px) {
        nav.navbar form.navbar-form .form-group input.form-control {
            width: 140px;
        }

        nav.navbar form.navbar-form .form-group {
            display: flex;
            margin-left: 0px;
        }
    }

    .btn-secondary {
        background: rgba(0, 0, 0, 0.05);
    }

    .btn-secondary2 {
        background: rgb(205 205 205);
    }

    .icon-img {
        width: 17px;
        height: 17px;
    }

    .justify-content-between {
        justify-content: space-between !important;
    }

    .justify-content-evenly {
        justify-content: space-evenly !important;
    }

    .justify-content-around {
        justify-content: space-around !important;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .align-items-center {
        align-items: center;
    }

    .align-items-end {
        align-items: flex-end;
    }

    .flex-column {
        flex-direction: column;
    }

    .d-flex {
        display: flex !important;
    }

    .me-1 {
        margin-right: 0.25rem !important;
    }

    .me-2 {
        margin-right: 0.5rem !important;
    }

    .me-3 {
        margin-right: 1rem !important;
    }

    .me-4 {
        margin-right: 1.5rem !important;
    }

    .me-5 {
        margin-right: 3rem !important;
    }

    .mt-5 {
        margin-top: 3rem !important;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mt-2 {
        margin-top: 0.5rem !important;
    }

    .mt-1 {
        margin-top: 0.25rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }

    .mb-1 {
        margin-bottom: 0.25rem !important;
    }

    .ms-5 {
        margin-left: 3rem !important;
    }

    .ms-4 {
        margin-left: 1.5rem !important;
    }

    .ms-3 {
        margin-left: 1rem !important;
    }

    .ms-2 {
        margin-left: 0.5rem !important;
    }

    .ms-1 {
        margin-left: 0.25rem !important;
    }

    .font-17 {
        font-size: 17px;
    }

    .font-18 {
        font-size: 18px;
    }

    .font-19 {
        font-size: 19px;
    }

    .font-20 {
        font-size: 20px;
    }

    .sidebar-right h3 {
        font-family: Oswald;
        font-size: 16px;
        border-style: solid;
        border-bottom-width: 3px;
        margin: 0 auto;
        -webkit-border-image: -webkit-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
        border-image-slice: 1;
        border-top: 0;
        border-right: 0;
        border-left: 0;
        padding-top: 10px;
    }

    .sidebar-right .h2-child {
        display: inline-flex;
        margin: 0
    }

    .sidebar-right .h2-child .title-child {
        font-family: Oswald;
        font-size: 16px
    }

    .sidebar-right a {
        border-bottom: 1px dashed #000
    }

    .sidebar-right span a {
        border-bottom: unset
    }

    .sidebar-right .btn-black-border a {
        display: flex;
        justify-content: center;
        align-items: center
    }

    .sidebar-right .btn-black-border a span {
        margin-left: 5px
    }

    .load_more_tax {
        cursor: pointer;
        margin-top: 10px
    }

    .tax #title-result {
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    .tax #title-result .pull-left {
        font-weight: 700
    }

    .tax #title-result .form-group {
        margin-bottom: 0
    }

    .tax hr {
        margin-top: 10px;
        margin-bottom: 10px
    }

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
        background: transparent url(../wp-content/themes/truyenfull/echo/img/full-label.png) no-repeat
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

    .sidebar-right .h2-child {
        margin: 10px 0px;
    }

    .sidebar-right .h2-child {
        display: block
    }

    input[type="checkbox"][id="button_click_1"] {
        display: none;

    }

    label[for="button_click_1"] {
        display: block;
        margin-left: 10px;
        padding: 4px;
    }

    #category input[type="checkbox"] {

        display: none;
    }

    #category input[type="checkbox"]+label {
        width: calc((100% - 40px) / 2 * 1);
        margin: 5px 10px;
        float: left;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    #category input[type="checkbox"]+label span {
        display: inline-block;
        width: 19px;
        height: 19px;
        margin: -2px 10px 0 0;
        vertical-align: middle;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/check_radio_sheet.png) left top no-repeat;
        cursor: pointer;
    }

    #category input[type="checkbox"]:checked+label span {
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/check_radio_sheet.png) -19px top no-repeat;
    }

    #category label {
        font-size: 15px;
        font-weight: unset;
    }

    .theloai-thumlist {
        margin-top: 10px;
    }

    .alert {
        margin-bottom: 5px;
    }

    #slider-keyword {
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0;
        margin: 10px 0px;
        white-space: nowrap;
        text-align: center;
        position: relative;
    }

    .tf_hidden {
        display: none;
    }

    .top-15 {
        margin-top: 15px;
    }

    @media only screen and (min-width: 1025px) and (max-width: 1280px) {}

    @media only screen and (min-width: 768px) and (max-width: 1024px) {
        #category input[type="checkbox"]+label {
            width: calc((100% - 80px) / 4 * 1);
        }

        .alert-first {
            margin-top: 15px;
        }
    }

    @media only screen and (min-width: 414px) and (max-width: 767px) {
        .alert-first {
            margin-top: 15px;
        }
    }

    @media only screen and (max-width: 413px) {
        .alert-first {
            margin-top: 15px;
            margin-bottom: 5px;
        }
    }
</style>
@endpush
<div class="container tax">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html"><span class="fa fa-home"></span> Home</a></li>
        <li class="breadcrumb-item"><a href="../indexffd2.html?page_id=48645">Tìm Kiếm</a></li>
    </ol>
</div>
<div class="container tax"> </div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 sidebar-right">
            <form method="GET" action="https://truyenhdt.com/tim-kiem/">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group"> <input name="title" type="text" class="form-control"
                                placeholder="Nhập tên truyện" value />
                            <div class="input-group-btn"> <button class="btn btn-primary color-white" type="submit">
                                    <span class="fa fa-search"></span> Tìm Kiếm </button> </div>
                        </div>
                        <div id="show_button_collapse" class="tf_hidden text-center"> <span class="btn btn-black"
                                data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Hiển Thị Mở Rộng</span> </div>
                        <div class="collapse2" id="collapseExample">
                            <div class="category" id="category">
                                <div class="clearfix">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Tìm Kiếm Mở Rộng</span> </div> <input
                                        type="checkbox" id="author_yes" value="yes" name="author" checked><label
                                        for="author_yes"><span></span>Thêm Tác Giả</label> <input type="checkbox"
                                        id="keyword_yes" value="yes" name="keyword" checked><label
                                        for="keyword_yes"><span></span>Thêm Từ Khóa</label> <input type="checkbox"
                                        id="he_liet_yes" value="yes" name="he_liet" checked><label
                                        for="he_liet_yes"><span></span>Thêm Hệ Liệt</label> <input type="checkbox"
                                        id="exactly_no" value="yes" name="exactly"><label
                                        for="exactly_no"><span></span>Chính Xác</label>
                                </div>
                                <div class="clearfix">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Thời Gian, Không Gian</span> </div> <input
                                        type="checkbox" id="do-thi" value="do-thi" name="cate[]"><label
                                        for="do-thi"><span></span>Đô Thị</label><input type="checkbox" id="dan-quoc"
                                        value="dan-quoc" name="cate[]"><label for="dan-quoc"><span></span>Dân
                                        Quốc</label><input type="checkbox" id="can-dai" value="can-dai"
                                        name="cate[]"><label for="can-dai"><span></span>Cận Đại</label><input
                                        type="checkbox" id="co-dai" value="co-dai" name="cate[]"><label
                                        for="co-dai"><span></span>Cổ Đại</label><input type="checkbox" id="di-gioi"
                                        value="di-gioi" name="cate[]"><label for="di-gioi"><span></span>Dị
                                        Giới</label><input type="checkbox" id="xuyen-khong" value="xuyen-khong"
                                        name="cate[]"><label for="xuyen-khong"><span></span>Xuyên
                                        Không</label><input type="checkbox" id="xuyen-nhanh" value="xuyen-nhanh"
                                        name="cate[]"><label for="xuyen-nhanh"><span></span>Xuyên
                                        Nhanh</label><input type="checkbox" id="trong-sinh" value="trong-sinh"
                                        name="cate[]"><label for="trong-sinh"><span></span>Trọng Sinh</label>
                                </div>
                                <div class="clearfix">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Chọi</span> </div> <input type="checkbox" id="1x1"
                                        value="1x1" name="cate[]"><label for="1x1"><span></span>1x1</label><input
                                        type="checkbox" id="np" value="np" name="cate[]"><label
                                        for="np"><span></span>NP</label>
                                </div>
                                <div class="clearfix">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Văn</span> </div> <input type="checkbox" id="sung"
                                        value="sung" name="cate[]"><label for="sung"><span></span>Sủng</label><input
                                        type="checkbox" id="nguoc" value="nguoc" name="cate[]"><label
                                        for="nguoc"><span></span>Ngược</label><input type="checkbox" id="nguoc-tra"
                                        value="nguoc-tra" name="cate[]"><label for="nguoc-tra"><span></span>Ngược
                                        Tra</label><input type="checkbox" id="thanh-thuy-van" value="thanh-thuy-van"
                                        name="cate[]"><label for="thanh-thuy-van"><span></span>Thanh Thủy</label>
                                </div>
                                <div class="clearfix">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Thể Loại</span> </div> <input type="checkbox"
                                        id="vong-du" value="vong-du" name="cate[]"><label
                                        for="vong-du"><span></span>Võng Du</label><input type="checkbox"
                                        id="di-nang" value="di-nang" name="cate[]"><label
                                        for="di-nang"><span></span>Dị Năng</label><input type="checkbox"
                                        id="dong-nhan" value="dong-nhan" name="cate[]"><label
                                        for="dong-nhan"><span></span>Đồng Nhân</label><input type="checkbox"
                                        id="huyen-huyen" value="huyen-huyen" name="cate[]"><label
                                        for="huyen-huyen"><span></span>Huyền Huyễn</label><input type="checkbox"
                                        id="khoa-huyen" value="khoa-huyen" name="cate[]"><label
                                        for="khoa-huyen"><span></span>Khoa Huyễn</label><input type="checkbox"
                                        id="ky-huyen" value="ky-huyen" name="cate[]"><label
                                        for="ky-huyen"><span></span>Kỳ Huyễn</label><input type="checkbox"
                                        id="kiem-hiep" value="kiem-hiep" name="cate[]"><label
                                        for="kiem-hiep"><span></span>Kiếm Hiệp</label><input type="checkbox"
                                        id="lich-su" value="lich-su" name="cate[]"><label
                                        for="lich-su"><span></span>Lịch Sử</label><input type="checkbox"
                                        id="linh-di" value="linh-di" name="cate[]"><label
                                        for="linh-di"><span></span>Linh Dị</label><input type="checkbox"
                                        id="mat-the" value="mat-the" name="cate[]"><label
                                        for="mat-the"><span></span>Mạt Thế</label><input type="checkbox"
                                        id="ngon-tinh" value="ngon-tinh" name="cate[]"><label
                                        for="ngon-tinh"><span></span>Ngôn Tình</label><input type="checkbox"
                                        id="nu-phu" value="nu-phu" name="cate[]"><label for="nu-phu"><span></span>Nữ
                                        Phụ</label><input type="checkbox" id="nu-cuong" value="nu-cuong"
                                        name="cate[]"><label for="nu-cuong"><span></span>Nữ Cường</label><input
                                        type="checkbox" id="nam-cuong" value="nam-cuong" name="cate[]"><label
                                        for="nam-cuong"><span></span>Nam Cường</label><input type="checkbox"
                                        id="hoi-ky" value="hoi-ky" name="cate[]"><label
                                        for="hoi-ky"><span></span>Hồi Ký</label><input type="checkbox" id="quan-su"
                                        value="quan-su" name="cate[]"><label for="quan-su"><span></span>Quân
                                        Sự</label><input type="checkbox" id="quan-truong" value="quan-truong"
                                        name="cate[]"><label for="quan-truong"><span></span>Quan
                                        Trường</label><input type="checkbox" id="tien-hiep" value="tien-hiep"
                                        name="cate[]"><label for="tien-hiep"><span></span>Tiên Hiệp</label><input
                                        type="checkbox" id="trinh-tham" value="trinh-tham" name="cate[]"><label
                                        for="trinh-tham"><span></span>Trinh Thám</label><input type="checkbox"
                                        id="teen" value="teen" name="cate[]"><label
                                        for="teen"><span></span>Teen</label><input type="checkbox" id="hac-bang"
                                        value="hac-bang" name="cate[]"><label for="hac-bang"><span></span>Hắc
                                        Bang</label><input type="checkbox" id="bach-hop" value="bach-hop"
                                        name="cate[]"><label for="bach-hop"><span></span>Bách Hợp</label><input
                                        type="checkbox" id="dam-my" value="dam-my" name="cate[]"><label
                                        for="dam-my"><span></span>Đam Mỹ</label>
                                </div>
                                <div class="form-group">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Tình Trạng Truyện</span> </div> <select
                                        class="form-control" id="status" name="status">
                                        <option value="all">Tất Cả</option>
                                        <option value="hoan_thanh">Hoàn Thành</option>
                                        <option value="dang_cap_nhat">Đang Cập Nhật</option>
                                        <option value="tam_ngung">Tạm Ngưng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="h2-child"> <span class="the7-list">></span> <span
                                            class="title-child">Thời Gian</span> </div> <select class="form-control"
                                        id="status" name="time">
                                        <option value="update">Chương mới nhất trước</option>
                                        <option value="new">Truyện mới nhất trước</option>
                                        <option value="rand">Ngẫu Nhiên</option>
                                    </select>
                                </div>
                                <div class="-ginputr"> <button class="btn btn-primary color-white btn-block"
                                        type="submit"> <span class="fa fa-search"></span> Tìm Kiếm </button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <div class="alert-first"></div>
            <div class="alert alert-info alert-dismissible" role="alert"> Tìm thấy <strong>57749</strong> truyện
            </div>
            <div class="theloai-thumlist">
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/xuyen-thanh-tra-a-sau-dem-phan-dien-danh-dau/index.html" class="thumbnail"
                        title="Xuyên Thành Tra A Sau Đem Phản Diện Đánh Dấu"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/06/11142298-1717285149.jpg"
                            alt="Xuyên Thành Tra A Sau Đem Phản Diện Đánh Dấu" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/xuyen-thanh-tra-a-sau-dem-phan-dien-danh-dau/index.html"
                                title="Xuyên Thành Tra A Sau Đem Phản Diện Đánh Dấu"> Xuyên Thành Tra A Sau Đem Phản
                                Diện Đánh Dấu </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/tu-quy-vo-uu/index.html" rel="tag">Tứ Quý
                                        Vô Ưu</a> </span> </p>
                            <p class="crop-text-2">Cố Tri Cảnh là một bá tổng, nhưng cô xuyên sách, không may xuyên
                                vào một cuốn tiểu thuyết ABO, càng xui xẻo chính là nhân vật cô xuyên&nbsp;&hellip;
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/toi-tro-nen-noi-tieng-sau-khi-lam-bao-mau-cho-mot-nhom-nhac-nam-hang-dau/index.html"
                        class="thumbnail"
                        title="Tôi Trở Nên Nổi Tiếng Sau Khi Làm Bảo Mẫu Cho Một Nhóm Nhạc Nam Hàng Đầu"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2023/08/toi-tro-nen-noi-tieng-sau-khi-lam-bao-mau-cho-mot-nhom-nhac-nam-hang-dau.jpg"
                            alt="Tôi Trở Nên Nổi Tiếng Sau Khi Làm Bảo Mẫu Cho Một Nhóm Nhạc Nam Hàng Đầu" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/toi-tro-nen-noi-tieng-sau-khi-lam-bao-mau-cho-mot-nhom-nhac-nam-hang-dau/index.html"
                                title="Tôi Trở Nên Nổi Tiếng Sau Khi Làm Bảo Mẫu Cho Một Nhóm Nhạc Nam Hàng Đầu">
                                Tôi Trở Nên Nổi Tiếng Sau Khi Làm Bảo Mẫu Cho Một Nhóm Nhạc Nam Hàng Đầu </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/doanh-tu/index.html" rel="tag">Doanh Từ</a>
                                </span> </p>
                            <p class="crop-text-2">Tên gốc: Cấp đỉnh lưu nam đoàn đương bảo mẫu sau ta bạo hồngEdit-
                                Beta: SayuChuyên mục: &quot;Nhân vật phản diện mong manh, Coco Love!&quot; dành cho
                                bộ sưu&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/nhat-ky-kinh-doanh-tiem-tap-hoa-thien-su/index.html" class="thumbnail"
                        title="Nhật Ký Kinh Doanh Tiệm Tạp Hóa Thiên Sứ"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11757694.jpg"
                            alt="Nhật Ký Kinh Doanh Tiệm Tạp Hóa Thiên Sứ" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/nhat-ky-kinh-doanh-tiem-tap-hoa-thien-su/index.html"
                                title="Nhật Ký Kinh Doanh Tiệm Tạp Hóa Thiên Sứ"> Nhật Ký Kinh Doanh Tiệm Tạp Hóa
                                Thiên Sứ </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/duong-chu-tram/index.html" rel="tag">Dương
                                        Chu Trầm</a> </span> </p>
                            <p class="crop-text-2">Vùng đầm lầy Ánh Trăng nằm ở ngoại vi của Long Cốc, được người
                                chơi gọi là khu vực nguy hiểm nhất ở Tây Đại Lục. Ở đây có&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/doc-sung-tieu-phu-lang-la-ngu-dan/index.html" class="thumbnail"
                        title="Độc Sủng Tiểu Phu Lang Là Ngư Dân"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11707024.jpg"
                            alt="Độc Sủng Tiểu Phu Lang Là Ngư Dân" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/doc-sung-tieu-phu-lang-la-ngu-dan/index.html"
                                title="Độc Sủng Tiểu Phu Lang Là Ngư Dân"> Độc Sủng Tiểu Phu Lang Là Ngư Dân </a>
                        </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/co-co-phat-tu/index.html" rel="tag">Cô Cô
                                        Phất Tư</a> </span> </p>
                            <p class="crop-text-2">Văn án:Chung Minh sinh ra ở ven biển, bơi lội rất giỏi, lặn xuống
                                biển như cá, có thể nín thở bằng thời gian một nén hương. Ở kiếp&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/tro-choi-truc-tuyen-xay-dung-thanh-pho-am-thuc/index.html" class="thumbnail"
                        title="[Trò Chơi Trực Tuyến] Xây Dựng Thành Phố Ẩm Thực"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11795539.jpg"
                            alt="[Trò Chơi Trực Tuyến] Xây Dựng Thành Phố Ẩm Thực" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <span class="label-title label-new"></span> <a
                                href="../truyen/tro-choi-truc-tuyen-xay-dung-thanh-pho-am-thuc/index.html"
                                title="[Trò Chơi Trực Tuyến] Xây Dựng Thành Phố Ẩm Thực"> [Trò Chơi Trực Tuyến] Xây
                                Dựng Thành Phố Ẩm Thực </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/quy-that-hoan/index.html" rel="tag">Quý
                                        Thất Hoan</a> </span> </p>
                            <p class="crop-text-2">200.000 người được chọn để gắn bó với một trò chơi xây dựng cơ sở
                                hạ tầng.Mỗi người được phân vào một thành phố nhỏ xíu.Những người chơi
                                khác&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/kim-chi-nam-giup-nu-phu-happy-ending-xuyen-nhanh/index.html"
                        class="thumbnail" title="Kim Chỉ Nam Giúp Nữ Phụ Happy Ending (Xuyên Nhanh)"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/07/11317433.jpg"
                            alt="Kim Chỉ Nam Giúp Nữ Phụ Happy Ending (Xuyên Nhanh)" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/kim-chi-nam-giup-nu-phu-happy-ending-xuyen-nhanh/index.html"
                                title="Kim Chỉ Nam Giúp Nữ Phụ Happy Ending (Xuyên Nhanh)"> Kim Chỉ Nam Giúp Nữ Phụ
                                Happy Ending (Xuyên Nhanh) </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/lo-tham/index.html" rel="tag">Lộ Thâm</a>
                                </span> </p>
                            <p class="crop-text-2">Cảnh Chiêu là một nhân viên của bộ phận xuyên nhanh, công việc
                                của cô là đóng vai bạn gái đầu tiên của nam chính trong mỗi thế giới&nbsp;&hellip;
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a href="../truyen/thanh-am-tu-tam-hon/index.html"
                        class="thumbnail" title="Thanh Âm Từ Tâm Hồn"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11763639-1728160614.jpg"
                            alt="Thanh Âm Từ Tâm Hồn" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a href="../truyen/thanh-am-tu-tam-hon/index.html"
                                title="Thanh Âm Từ Tâm Hồn"> Thanh Âm Từ Tâm Hồn </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/mong-ly-truong/index.html" rel="tag">Mộng
                                        Lý Trường</a> </span> </p>
                            <p class="crop-text-2">Sát thủ cấp A Giải Hằng Không nhận được một nhiệm vụ uỷ thác. Đột
                                nhập vào viện nghiên cứu Mạn Đức và lấy đi đối tượng thí nghiệm&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/thap-nien-70-xuyen-hien-dai-phai-lam-giau-moi-hop-ly-chu/index.html"
                        class="thumbnail" title="Thâp Niên 70 Xuyên Hiện Đại Phải Làm Giàu Mới Hợp Lý Chứ"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11631430.jpg"
                            alt="Thâp Niên 70 Xuyên Hiện Đại Phải Làm Giàu Mới Hợp Lý Chứ" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/thap-nien-70-xuyen-hien-dai-phai-lam-giau-moi-hop-ly-chu/index.html"
                                title="Thâp Niên 70 Xuyên Hiện Đại Phải Làm Giàu Mới Hợp Lý Chứ"> Thâp Niên 70 Xuyên
                                Hiện Đại Phải Làm Giàu Mới Hợp Lý Chứ </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/ta-nguyet/index.html" rel="tag">Tà
                                        Nguyệt</a> </span> </p>
                            <p class="crop-text-2">Dư Mẫn là cô gái lớn lên ở thập niên 70, nhưng cô không phải là
                                một cô gái dễ bị ức hiếp. Người ngoài đều cho rằng cô&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/toi-song-sot-nho-mang-nho-nam-trong-tay-nam-chinh/index.html"
                        class="thumbnail" title="Tôi Sống Sót Nhờ Mạng Nhỏ Nằm Trong Tay Nam Chính"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11762170.jpg"
                            alt="Tôi Sống Sót Nhờ Mạng Nhỏ Nằm Trong Tay Nam Chính" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/toi-song-sot-nho-mang-nho-nam-trong-tay-nam-chinh/index.html"
                                title="Tôi Sống Sót Nhờ Mạng Nhỏ Nằm Trong Tay Nam Chính"> Tôi Sống Sót Nhờ Mạng Nhỏ
                                Nằm Trong Tay Nam Chính </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/van-phi-ta/index.html" rel="tag">Vân Phi
                                        Tà</a> </span> </p>
                            <p class="crop-text-2">Văn án:Một lần xuyên không, Lâm Thanh Dạng xuyên thành pháo hôi
                                bia đỡ đạn trong văn bạo quân! Trong nguyên tác, bia đỡ đạn đoạn tụ vì
                                thèm&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a href="../truyen/nhung-cach-su-dung-anh-de/index.html"
                        class="thumbnail" title="Những Cách Sử Dụng Ảnh Đế"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11776355-1728331414.jpg"
                            alt="Những Cách Sử Dụng Ảnh Đế" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/nhung-cach-su-dung-anh-de/index.html"
                                title="Những Cách Sử Dụng Ảnh Đế"> Những Cách Sử Dụng Ảnh Đế </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/my-gia-gia-bang/index.html" rel="tag">Mỹ
                                        Già Gia Băng</a> </span> </p>
                            <p class="crop-text-2">Couple: Điều tra viên nhân cách phân liệt, ban ngày lạnh lùng,
                                ban đêm nổi điên thụ * Ảnh đế mỹ nhân ham thích diễn kịch, siêu nhiều
                                áo&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/tam-gia-phu-nhan-lai-di-cau-vuot-bay-quan/index.html" class="thumbnail"
                        title="Tam Gia, Phu Nhân Lại Đi Cầu Vượt Bày Quán"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2022/08/8153836.jpg"
                            alt="Tam Gia, Phu Nhân Lại Đi Cầu Vượt Bày Quán" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/tam-gia-phu-nhan-lai-di-cau-vuot-bay-quan/index.html"
                                title="Tam Gia, Phu Nhân Lại Đi Cầu Vượt Bày Quán"> Tam Gia, Phu Nhân Lại Đi Cầu
                                Vượt Bày Quán </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/y-nhan-vi-hoa/index.html" rel="tag">Y Nhân
                                        Vi Hoa</a> </span> </p>
                            <p class="crop-text-2">Kiếp trước, Tần Nguyễn rơi vào vực sâu tranh đấu gia tộc, bị
                                người hãm hại, chết không nhắm mắt.Khi tái sinh trở về, cô cầm giấy khám
                                thai&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/me-ruot-pha-dao-trong-tieu-thuyet-me-ke/index.html" class="thumbnail"
                        title="Mẹ Ruột Phá Đảo Trong Tiểu Thuyết Mẹ Kế"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11612225.jpg"
                            alt="Mẹ Ruột Phá Đảo Trong Tiểu Thuyết Mẹ Kế" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/me-ruot-pha-dao-trong-tieu-thuyet-me-ke/index.html"
                                title="Mẹ Ruột Phá Đảo Trong Tiểu Thuyết Mẹ Kế"> Mẹ Ruột Phá Đảo Trong Tiểu Thuyết
                                Mẹ Kế </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/han-doa-doa/index.html" rel="tag">Hàn Đóa
                                        Đóa</a> </span> </p>
                            <p class="crop-text-2">Thiên kim nhà giàu Thẩm Duận Nghi đã thành công lên nắm quyền,
                                trong tay có cả tiền tài lẫn thời gian, sự nghiệp phát triển rực rỡ.
                                Bỗng&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/mi-vuong-sung-the-y-phi-kinh-the/index.html" class="thumbnail"
                        title="Mị Vương Sủng Thê (Y Phi Kinh Thế)"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2023/10/mi-vuong-sung-the-y-phi-kinh-the.jpg"
                            alt="Mị Vương Sủng Thê (Y Phi Kinh Thế)" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/mi-vuong-sung-the-y-phi-kinh-the/index.html"
                                title="Mị Vương Sủng Thê (Y Phi Kinh Thế)"> Mị Vương Sủng Thê (Y Phi Kinh Thế) </a>
                        </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/co-nhiem-cam/index.html" rel="tag">Cố Nhiễm
                                        Cẩm</a> </span> </p>
                            <p class="crop-text-2">Thật sự thì nàng vốn có thực lực rất cường hãn, lại có thêm gia
                                chủ thế gia có y thuật siêu quần.Nhưng bỗng vào một ngày sáng sớm&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/xuyen-vao-nien-dai-van-dua-vao-he-thong-va-mat-nu-chu-cam-ly/index.html"
                        class="thumbnail" title="Xuyên Vào Niên Đại Văn, Dựa Vào Hệ Thống Vả Mặt Nữ Chủ Cẩm Lý">
                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/xuyen-vao-nien-dai-van-dua-vao-he-thong-va-mat-nu-chu-cam-ly-1726809554.jpg"
                            alt="Xuyên Vào Niên Đại Văn, Dựa Vào Hệ Thống Vả Mặt Nữ Chủ Cẩm Lý" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/xuyen-vao-nien-dai-van-dua-vao-he-thong-va-mat-nu-chu-cam-ly/index.html"
                                title="Xuyên Vào Niên Đại Văn, Dựa Vào Hệ Thống Vả Mặt Nữ Chủ Cẩm Lý"> Xuyên Vào
                                Niên Đại Văn, Dựa Vào Hệ Thống Vả Mặt Nữ Chủ Cẩm Lý </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/phu-sinh-dieu-due/index.html" rel="tag">Phù
                                        Sinh Diêu Duệ</a> </span> </p>
                            <p class="crop-text-2">Tần Trúc Tây, một người bình thường mang trong mình năng lực đặc
                                biệt thuộc hệ không gian, lại sở hữu sức mạnh phi thường. Trong một nhiệm
                                vụ,&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/nhat-ky-truong-thanh-cua-nu-oa/index.html" class="thumbnail"
                        title="Nhật Ký Trưởng Thành Của Nữ Oa"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2022/04/nhat-ky-truong-thanh-cua-nu-oa-1650376903.jpg"
                            alt="Nhật Ký Trưởng Thành Của Nữ Oa" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/nhat-ky-truong-thanh-cua-nu-oa/index.html"
                                title="Nhật Ký Trưởng Thành Của Nữ Oa"> Nhật Ký Trưởng Thành Của Nữ Oa </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/lang-vu-thuy-tu/index.html" rel="tag">Lăng
                                        Vũ Thủy Tụ</a> </span> </p>
                            <p class="crop-text-2">Bạn muốn tìm ai? Long Vương? A! Hôm nay siêu thị giảm giá, hắn đã
                                đi tranh thủ...Nhị Lang Thần? Hôm nay có tiệc xem mắt, hắn dám cãi&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/xuyen-nhanh-nu-phu-phao-hoi-lua-chon-lam-ruong/index.html" class="thumbnail"
                        title="Xuyên Nhanh Nữ Phụ Pháo Hôi Lựa Chọn Làm Ruộng"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11631492.jpg"
                            alt="Xuyên Nhanh Nữ Phụ Pháo Hôi Lựa Chọn Làm Ruộng" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/xuyen-nhanh-nu-phu-phao-hoi-lua-chon-lam-ruong/index.html"
                                title="Xuyên Nhanh Nữ Phụ Pháo Hôi Lựa Chọn Làm Ruộng"> Xuyên Nhanh Nữ Phụ Pháo Hôi
                                Lựa Chọn Làm Ruộng </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/tich-trinh/index.html" rel="tag">Tịch
                                        Trinh</a> </span> </p>
                            <p class="crop-text-2">Từ Nhân mang theo hệ thống hỗ trợ cuộc sống, xuyên vào hàng ngàn
                                thế giới tiểu thuyết mà cô từng chấm điểm âm, hơn nữa đều là những&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a
                        href="../truyen/minh-vuong-te-te-ba-tuoi-ruoi/index.html" class="thumbnail"
                        title="Minh Vương – Tể Tể Ba Tuổi Rưỡi"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/06/minh-vuong-te-te-ba-tuoi-ruoi-1717828395.jpg"
                            alt="Minh Vương – Tể Tể Ba Tuổi Rưỡi" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a
                                href="../truyen/minh-vuong-te-te-ba-tuoi-ruoi/index.html"
                                title="Minh Vương – Tể Tể Ba Tuổi Rưỡi"> Minh Vương – Tể Tể Ba Tuổi Rưỡi </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/doa-me-dai-nhan/index.html" rel="tag">Đóa
                                        Mễ Đại Nhân</a> </span> </p>
                            <p class="crop-text-2">Nhà họ Hoắc là đệ nhất gia tộc ở nước Hoa, người cầm quyền đã
                                nhận nuôi một cô bé có tính tình rất kì lạ, nhưng rất đáng&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-sm-6 col-xs-12"> <a href="../truyen/xuyen-may-mu-pha-an/index.html"
                        class="thumbnail" title="Xuyên Mây Mù Phá Án"> <img
                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                            data-src="https://truyenhdt.com/wp-content/uploads/2024/01/10380787-1706487651.jpg"
                            alt="Xuyên Mây Mù Phá Án" /> </a>
                    <div class="text">
                        <h2 class="crop-text-2" itemprop="name"> <a href="../truyen/xuyen-may-mu-pha-an/index.html"
                                title="Xuyên Mây Mù Phá Án"> Xuyên Mây Mù Phá Án </a> </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray"> <span class="fa fa-user"></span> Tác giả: <span
                                    itemprop="name"> <a href="../tac-gia/lo-bach-bach/index.html" rel="tag">Lộ Bạch
                                        Bạch</a> </span> </p>
                            <p class="crop-text-2">Truyện xoay quanh 10 vụ án được phá giải bởi một nữ cảnh sát trẻ
                                Tiền Y Hứa mới vào ngành, dù không có bàn tay vàng nhưng với&nbsp;&hellip;</p>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</div>
<div class="container tax">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.html"><span class="fa fa-home"></span> Home</a></li>
        <li class="breadcrumb-item"><a href="../indexffd2.html?page_id=48645">Tìm Kiếm</a></li>
    </ol>
</div>
@endsection

@push('scripts')

@endpush
