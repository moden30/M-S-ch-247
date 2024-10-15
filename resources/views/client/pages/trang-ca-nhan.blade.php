@extends('client.layouts.app')
@section('content')
@push('styles')
<style type="text/css">
    @media (max-width: 767px) {
        .panel-heading .pull-right {
            margin-top: 25px;
            margin-bottom: 10px;
            float: left !important;
        }
    }



    .timeline {
        position: relative;

        /*	    padding: 21px 0px 10px;
*/
        margin-top: 4px;
        margin-bottom: 30px;
    }

    .timeline .line {
        position: absolute;
        width: 4px;
        display: block;
        background: currentColor;
        top: 0px;
        bottom: 0px;
        margin-left: 30px;
        color: #a5d9ea;
    }

    .timeline .line::before {
        top: -4px;
    }

    .timeline .line::after {
        bottom: -4px;
    }

    .timeline .line::before,
    .timeline .line::after {
        content: '';
        position: absolute;
        left: -4px;
        width: 12px;
        height: 12px;
        display: block;
        border-radius: 50%;
        background: currentColor;
    }

    .timeline .panel {
        position: relative;
        margin: 10px 0px 21px 70px;
        clear: both;
    }

    @media (max-width: 413px) {
        .timeline .panel {
            margin: 20px 0px;
        }

        .timeline .line::before,
        .timeline .line::after {
            width: 0px;
        }

        .timeline .line {
            top: unset;
        }
    }


    .timeline .panel::before {
        position: absolute;
        display: block;
        top: 8px;
        left: -24px;
        content: '';
        width: 0px;
        height: 0px;
        border: inherit;
        border-width: 12px;
        border-top-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    }

    .timeline .panel .panel-heading.icon * {
        font-size: 20px;
        vertical-align: middle;
        line-height: 40px;
    }

    .timeline .panel .panel-heading.icon {
        position: absolute;
        left: -59px;
        display: block;
        width: 40px;
        height: 40px;
        padding: 0px;
        border-radius: 50%;
        text-align: center;
        float: left;
        background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
        color: white;
    }

    .timeline .panel-outline {
        border-color: transparent;
        background: transparent;
        box-shadow: none;
    }

    .timeline .panel-outline .panel-body {
        padding: 10px 0px;
    }

    .timeline .panel-outline .panel-heading:not(.icon),
    .timeline .panel-outline .panel-footer {
        display: none;
    }

    .panel-title {
        display: inline-block;
    }

    .user_card_info {
        width: 120px;
        float: left;
    }

    .user_card_info_0 {
        margin-bottom: 10px;
    }

    .panel-body .user_avatar_parent {

        border: 1px solid black;
        -webkit-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
        box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
        width: 152px;
        height: 152px;

        margin: auto;
        margin-bottom: 20px;
    }

    .panel-body .user_avatar_parent {
        width: 152px;
        height: 152px;
    }

    .panel-body .user_avatar_2 img {
        width: 150px;
        height: 150px;
        border-radius: unset;
    }


    @media (min-width: 768px) {
        .panel-body .user_avatar_parent {
            margin-left: unset;
            margin-right: unset;
        }
    }



    label[for="upload_avatar"] {
        position: absolute;
        bottom: -5px;
        width: 100%;
        padding: 5px 10px;
        border-radius: 30px;
        color: white;
        background-image: linear-gradient(135deg, #000000 30%, #746754 100%);
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        border: white 1px solid;
        text-align: center;
    }

    .valid-feedback {
        width: 100%;
        margin-bottom: 10px;
        font-size: 80%;
        color: #28a745;
    }

    .invalid-feedback {
        width: 100%;
        margin-bottom: 10px;
        font-size: 80%;
        color: #dc3545;
    }
</style>
@endpush
<div class="clearfix"></div>
<div class="container">
    <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
</div>
<div class="container tax">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <span class="fa fa-home"></span> <a href="/" itemprop="url">Home</a>
        </li>
        <li class="breadcrumb-item active">
            Profile
        </li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-xs-12">
            <div id="ss-user">
                <div class="user_avatar_parent">
                    <div class="user_avatar_2">
                        <img src="https://truyenhdt.com/img/user/106452434141372540143.jpg" />
                    </div>
                </div>
                <div class="ss-info zbottom-10">
                    <div class="user_nickname">
                        <a href="https://truyenhdt.com/author/1728740683/">
                            Nguyen Quang Son (FPL HN) </a>
                    </div>
                </div>
            </div>
            <div id="user-sidebar">
                <ul class="list-group">
                    <li class="list-group-item tf-active">
                        <a href="/user/profile#h1"><i class="fa fa-tachometer" aria-hidden="true"></i> Profile</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/dang-truyen#h1"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Đăng
                            Truyện</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/quan-ly-truyen/?q=1#h1"><i class="fa fa-list-alt" aria-hidden="true"></i>
                            Quản Lý Truyện</a>
                        <div class="pull-right">
                            <span class="badge">0</span>
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/event#h1"><i class="fa fa-gift" aria-hidden="true"></i> Event</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/tin-nhan/system#h1"><i class="fa fa-envelope" aria-hidden="true"></i> Tin
                            Nhắn</a>
                        <div class="pull-right">
                        </div>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/library#h1"><i class="fa fa-database" aria-hidden="true"></i> Tủ Truyện</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/nhiem-vu/?q=1#h1"><i class="fa fa-bullseye" aria-hidden="true"></i> Nhiệm
                            Vụ</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/deposit#h1"><i class="fa fa-money" aria-hidden="true"></i> Nạp Tiền</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/withdrawal#h1"><i class="fa fa-money" aria-hidden="true"></i> Rút Tiền</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/member#h1"><i class="fa fa-users" aria-hidden="true"></i> Thành Viên</a>
                    </li>
                    <li class="list-group-item ">
                        <a href="/user/setting#h1"><i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt Cá Nhân</a>
                    </li>
                    <li class="list-group-item">
                        <a
                            href="https://truyenhdt.com/wp-login.php?action=logout&#038;redirect_to=%2Fuser%2Fdang-nhap&#038;_wpnonce=367ee6b110"><i
                                class="fa fa-sign-out" aria-hidden="true"></i> Đăng Xuất</a>
                    </li>
                </ul>
            </div>

            <div class="modal fade" id="myModalDashboard" tabindex="-1" role="dialog"
                aria-labelledby="myModalDashboardLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalDashboardLabel">Chú ý:</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát!</button>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                h1 {
                    font-family: "Oswald";
                    font-weight: normal;
                    font-size: 26px;
                    text-align: center;
                }

                .user_nickname {
                    font-family: "Oswald";
                    font-size: 20px;
                    text-align: center;
                    margin: 0px 0px 0px 0px;
                }


                .user_avatar_parent,
                .user_avatar_2 img {
                    width: 100px;
                    height: 100px;
                }

                .user_avatar_parent {
                    position: relative;
                    display: block;
                }

                .user_avatar_2 img {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    border-radius: 50%;
                }

                .user-badge img {
                    width: 20px;
                }

                #ss-user {
                    display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                }

                .ss-info {
                    text-align: center;
                }

                .list-group-item.tf-active {
                    background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                    color: white;
                }

                .list-group-item.tf-active a {
                    color: white;
                }

                #user-sidebar .list-group-item {
                    border: 1px solid #1ebbf0;
                    width: 49%;
                    display: inline-block;
                    min-height: 44px;
                    max-height: 55px;
                }

                @media (min-width: 768px) {
                    #ss-user {
                        display: unset;
                    }

                    .theloai-thumlist h3 {
                        min-height: 45px;
                    }

                    .user_avatar_parent,
                    .user_avatar_2 img {
                        width: 150px;
                        height: 150px;
                    }

                    .user_avatar_2 img {
                        border-radius: unset;
                    }

                    .user_nickname {
                        margin: 12px 0px 0px 0px;
                    }

                    .user_avatar_parent {
                        margin-left: auto;
                        margin-right: auto;
                    }

                    #user-sidebar .list-group-item {
                        width: 33%
                    }
                }

                @media (min-width: 1200px) {
                    #user-sidebar .list-group-item {
                        width: 100%;
                        display: block;
                    }
                }

                ul.list-group li {}


                /** Top sidebar **/
                .hr-primary {
                    border-top-width: 5px;
                    margin: 0px 0px 20px 0px;
                    border-width: 0;
                    border-color: #1ebbf0;
                    -moz-border-image: -moz-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                    -webkit-border-image: -webkit-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                    border-image: linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                    border-image-slice: 1;
                    height: 2px;
                    border-style: solid;
                    border-width: 2px;
                    border-color: rgba(0, 0, 0, .08);
                    border-left: none;
                    border-right: none;
                    border-bottom: none;
                    line-height: 9px;
                }

                @media (min-width: 768px) {
                    .hr-primary {
                        height: 4px;
                        border-width: 4px;
                    }
                }

                .list-group.list-group-horizontal {
                    border-radius: 4px;
                    overflow-x: auto;
                    overflow-y: hidden;
                    white-space: nowrap;
                    position: relative;
                    margin-bottom: 0px;
                    margin-top: 30px;
                }

                .list-group-horizontal .list-group-item {
                    display: inline-block;
                    margin-bottom: -1px;
                    margin-right: -4px;
                    min-height: 44px;
                    /*		 	border-right-width: 0;
*/
                }

                .list-group-horizontal .list-group-item:first-child {
                    border-top-right-radius: 0;
                    border-bottom-left-radius: 4px;
                }

                .list-group-horizontal .list-group-item:last-child {
                    border-top-right-radius: 4px;
                    border-bottom-left-radius: 0;
                    border-right-width: 1px;
                }

                /*-------------------------------------------------
    |           Badge
    |-------------------------------------------------*/
                .badge {
                    display: inline-block;
                    padding: .25em .4em;
                    font-size: 75%;
                    font-weight: 700;
                    line-height: 1;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: baseline;
                    border-radius: .25rem;
                }

                .badge-success {
                    color: #fff;
                    background-color: #28a745;
                }

                .badge-info {
                    color: #fff;
                    background-color: #17a2b8;
                }

                .badge-warning {
                    color: #212529;
                    background-color: #ffc107;
                }

                .badge-danger {
                    color: #fff;
                    background-color: #dc3545;
                }

                .badge-secondary {
                    color: #fff;
                    background-color: #6c757d;
                }

                .pull-right .badge,
                a .badge,
                .tf-active .badge {
                    display: inline-block;
                    min-width: 10px;
                    padding: 3px 7px;
                    font-size: 12px;
                    font-weight: 700;
                    line-height: 1;
                    color: #fff;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    background-image: linear-gradient(135deg, #000000 30%, #746754 100%);
                    border-radius: 10px;
                    border: white 1px solid;
                    margin-bottom: 1px;
                }

                #tf-user ul.dropdown-menu i.fa {
                    width: 15px;
                }

                /*		@media (min-width: 1200px) {
        .pull-right .badge, a .badge, .tf-active .badge{
            padding: 3px 7px;
            font-size: 12px;
        }
    }*/
                /*-------------------------------------------------
    |            Button Ajax Loading
    |-------------------------------------------------*/
                .lds-ellipsis {
                    display: inline-block;
                    position: relative;
                    margin-bottom: 10px
                }

                .lds-ellipsis div {
                    position: absolute;
                    top: 0;
                    width: 13px;
                    height: 13px;
                    border-radius: 50%;
                    background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                    animation-timing-function: cubic-bezier(0, 1, 1, 0)
                }

                .lds-ellipsis div:nth-child(1) {
                    left: 8px;
                    animation: lds-ellipsis1 .6s infinite
                }

                .lds-ellipsis div:nth-child(2) {
                    left: 8px;
                    animation: lds-ellipsis2 .6s infinite
                }

                .lds-ellipsis div:nth-child(3) {
                    left: 32px;
                    animation: lds-ellipsis2 .6s infinite
                }

                .lds-ellipsis div:nth-child(4) {
                    left: 56px;
                    animation: lds-ellipsis3 .6s infinite
                }

                @keyframes lds-ellipsis1 {
                    0% {
                        transform: scale(0)
                    }

                    100% {
                        transform: scale(1)
                    }
                }

                @keyframes lds-ellipsis3 {
                    0% {
                        transform: scale(1)
                    }

                    100% {
                        transform: scale(0)
                    }
                }

                @keyframes lds-ellipsis2 {
                    0% {
                        transform: translate(0, 0)
                    }

                    100% {
                        transform: translate(24px, 0)
                    }
                }

                .text-center .lds-ellipsis {
                    margin-left: -75px
                }


                .list-group-item .dropdown-menu {
                    left: unset;
                    right: 0;
                }
            </style>
        </div>
        <div class="col-lg-9 col-xs-12">
            <h1 id="h1">Profile</h1>

            <div class="timeline">

                <div class="line text-muted"></div>

                <article class="panel panel-info panel-outline">
                    <div class="panel-heading icon">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <div class="user_avatar_parent">
                                    <div class="user_avatar_2">
                                        <img src="https://truyenhdt.com/img/user/106452434141372540143.jpg" />
                                    </div>
                                    <label for="upload_avatar">
                                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span><i
                                            class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                                        <input type="file" id="upload_avatar" style="display:none">
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5">
                                <div class="user_card_info_0">
                                    <span class="user_card_info">◉ Ngoại Hiệu:</span> Nguyen Quang Son (FPL HN)
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info crop-text">◉ Email:</span> <a
                                        href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="e5968a8b8b94958dd6d6d0d7d3a5839591cb808190cb938b">[email&#160;protected]</a>
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">◉ ID Thành Viên:</span> 838458
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">◉ Chức Vụ:</span> <span style="color:#000000">Thành
                                        Viên</span>
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i> Referral:
                                    </span>
                                    <a class="link-color" href="/user/member/referral"> 0 <i class="fa fa-user-plus"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-money" aria-hidden="true"></i> Vàng:
                                    </span>
                                    0
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-ticket" aria-hidden="true"></i> Ánh Kim:
                                    </span>
                                    0
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-diamond" aria-hidden="true"></i> Ruby:
                                    </span>
                                    0
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-bolt" aria-hidden="true"></i> Exp:
                                    </span>
                                    0
                                </div>
                                <div class="user_card_info_0">
                                    <span class="user_card_info">
                                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Vé bố cáo:
                                    </span>
                                    0
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3">
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <em><a href="/q-a/" class="link-color"><i class="fa fa-blind hidden-xs"
                                            aria-hidden="true"></i> Những câu hỏi thường gặp</a></em>
                            </div>
                        </div>
                    </div>
                </article>


                <article class="panel panel-default">
                    <div class="panel-heading icon">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title">Trích Dẫn Yêu Thích</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <textarea class="form-control" id="description0" rows="3"
                                placeholder="Nội dung này sẽ được hiển thị công khai ở trang cá nhân"></textarea>
                        </div>
                        <span id="description" class="tf_button_parent">
                            <span class="btn btn-default">Cập Nhật</span>
                        </span>
                        <div id="show_description"></div>
                    </div>
                </article>

                <article class="panel panel-default">
                    <div class="panel-heading icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title">Ngoại Hiệu</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="change_nickname" class="sr-only"></label>
                                <input type="text" class="form-control" id="change_nickname"
                                    placeholder="Nguyen Quang Son (FPL HN)">
                            </div>
                            <span id="change_display_name" class="tf_button_parent">
                                <span class="btn btn-default">Thay Đổi</span>
                            </span>
                            <span id="show_change_display_name"></span>
                        </div>
                    </div>
                </article>


                <article class="panel panel-default">
                    <div class="panel-heading icon">
                        <i class="fa fa-link" aria-hidden="true"></i>
                    </div>
                    <div class="panel-heading">
                        <h2 class="panel-title">Địa Chỉ Trang Cá Nhân</h2>
                        <div class="pull-right">
                            <a href="https://truyenhdt.com/author/1728740683/">
                                https://truyenhdt.com/author/1728740683/ </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="check_change_nicename">
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="input_change_nicename" class="sr-only"></label>
                                <input type="text" class="form-control" id="input_change_nicename"
                                    placeholder="1728740683">
                            </div>
                            <span id="change_nicename" class="tf_button_parent">
                                <span class="btn btn-default">Thay Đổi</span>
                            </span>
                            <span id="show_change_nicename"></span>
                        </div>
                    </div>
                </article>

            </div>

        </div>

    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Thông Báo</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đã Hiểu!</button>
            </div>
        </div>
    </div>
</div>
@endsection
