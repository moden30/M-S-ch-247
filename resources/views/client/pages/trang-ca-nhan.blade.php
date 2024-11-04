@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>
            @media (max-width: 767px) {
                .panel-heading .pull-right {
                    margin-top: 25px;
                    margin-bottom: 10px;
                    float: left !important;
                }
            }

            #currently-reading-content {
                display: block;
                /* Hiển thị ngay khi trang tải */
            }

            #purchased-content,
            #favorites-content {
                display: none;
                /* Ẩn các phần khác */
            }

            .timeline {
                position: relative;
                */ margin-top: 4px;
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

            .img-bordered {
                border: 3px solid gray;
                border-radius: 50%;
            }

            .hidden-content {
                display: none;
            }
        </style>

        <style>
            #fqa .panel-body a {
                border-bottom: 1px dashed black;
            }

            h1 {
                font-size: 32px;
                padding-right: 15px;
                padding-left: 15px;
                font-family: "Oswald";
                font-weight: normal;
                margin-bottom: 20px;
            }

            .number {
                z-index: 5;
                text-align: center;
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #ebebeb;
                /* margin: 3px; */
                display: inline-flex;
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                border: 1px #1ebbf0 solid;
                font-size: 12px;
                margin-right: 7px;
            }

            .panel-default > .panel-heading {
                background-image: unset;
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
                <span class="fa fa-home"></span> <a href="/" itemprop="url">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" id="breadcrumb-text">
                Hồ sơ
            </li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div id="ss-user">
                    <div class="user_avatar_parent">
                        <div class="user_avatar_2">
                            <img style="object-fit: cover"
                                 src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                 alt="Avatar" class="img-bordered"/>
                        </div>
                    </div>
                    <div class="ss-info zbottom-10">
                        <div class="user_nickname">
                            <a href="https://truyenhdt.com/author/1728740683/">
                                {{ $user->ten_doc_gia }} ({{ $user->but_danh ? $user->but_danh : 'Chưa có bút danh' }}
                                ) </a>
                        </div>
                    </div>
                </div>
                <div id="user-sidebar">
                    <ul class="list-group">
                        <li class="list-group-item tf-active" id="menu-profile">
                            <a href="javascript:void(0)" class="menu-link" data-target="profile-content"
                               data-breadcrumb="Hồ sơ"><i class="fa fa-tachometer" aria-hidden="true"></i> Hồ sơ</a>
                        </li>
                        <li class="list-group-item" id="menu-upload">
                            <a href="javascript:void(0)" class="menu-link" data-target="upload-content"
                               data-breadcrumb="Tủ sách cá nhân"><i class="fa fa-list-alt" aria-hidden="true"></i> Tủ
                                sách
                                cá
                                nhân</a>
                        </li>
                        <li class="list-group-item" id="menu-notification">
                            <a href="" class="menu-link" data-target="notification-content"
                               data-breadcrumb="Thông báo"><i class="fa fa-bell" aria-hidden="true"></i> Thông báo</a>
                        </li>
                        <li class="list-group-item" id="menu-library">
                            <a href="javascript:void(0)" class="menu-link" data-target="library-content"
                               data-breadcrumb="Lịch sử giao dịch"><i class="fa fa-money" aria-hidden="true"></i> Lịch
                                sử
                                giao
                                dịch</a>
                        </li>
                        <li class="list-group-item" id="menu-security">
                            <a href="javascript:void(0)" class="menu-link" data-target="security-content"
                               data-breadcrumb="Cài đặt bảo mật"><i class="fa fa-lock" aria-hidden="true"></i> Cài đặt
                                bảo
                                mật</a>
                        </li>
                        <li class="list-group-item" id="menu-deactivation">
                            <a href="javascript:void(0)" class="menu-link" data-target="deactivation-content"
                               data-breadcrumb="Câu hỏi thường gặp"><i class="fa fa-question-circle"
                                                                       aria-hidden="true"></i> Câu hỏi thường gặp</a>
                        </li>
                        <li class="list-group-item" id="menu-activity-log">
                            <a href="javascript:void(0)" class="menu-link" data-target="activity-log-content"
                               data-breadcrumb="Nhật ký hoạt động"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                Đăng
                                xuất</a>
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

                    ul.list-group li {
                    }


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
                        /*background-image: linear-gradient(135deg, #000000 30%, #746754 100%);*/
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

                    #upload_avatar {
                        display: none;
                    }

                    .alert .close {
                        position: absolute;
                        top: 10px;
                        right: 15px;
                        width: auto;
                        height: auto;
                        line-height: normal;
                        background-color: transparent;
                        color: #555;
                        font-size: 20px;
                        opacity: 0.8;
                        border: none;
                        padding: 0;
                    }

                    .alert {
                        position: relative;
                        padding-right: 50px;
                    }

                    .d-flex {
                        display: flex;
                        align-items: center;
                        /* This ensures vertical center alignment of all flex items */
                    }

                    .align-items-center {
                        align-items: center;
                        /* This is technically redundant if already included in .d-flex */
                    }

                    .pull-right {
                        margin-left: auto;
                        /* This will push your form-group to the right */
                    }
                </style>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div id="content-area">

                    <div id="profile-content" class="menu-content">
                        <h1 id="h1">Thông tin cá nhân</h1>

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
                                                    <img style="object-fit: cover" id="avatar-preview"
                                                         src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                         alt="Avatar"/>
                                                </div>

                                                <input type="file" id="upload_avatar" accept="image/*">

                                                <label for="upload_avatar" class="user_avatar_upload_icon">
                                                    <span class="glyphicon glyphicon-folder-open"
                                                          aria-hidden="true"></span>
                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> Tải ảnh
                                                </label>
                                            </div>


                                        </div>
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="user_card_info_0">
                                                <span
                                                    class="user_card_info">◉ Họ và tên:</span> {{ $user->ten_doc_gia }}
                                                ({{ $user->but_danh ? $user->but_danh : 'Chưa có bút danh' }})
                                            </div>
                                            <div class="user_card_info_0">
                                                <span
                                                    class="user_card_info crop-text">◉ Email:</span> {{ $user->email }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Số điện thoại:</span>
                                                {{ $user->so_dien_thoai }}
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Ngày sinh:</span>
                                                {{ \Carbon\Carbon::parse($user->sinh_nhat)->format('d/m/Y') }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Giới tính:</span> {{ $user->gioi_tinh }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Số dư:</span>
                                                {{ number_format($user->so_du, 0, ',', '.') }} ₫
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3"></div>

                                    </div>

                                    <div class="col-xs-12 col-sm-9">
                                        <em><a href="{{ route('hoi-dap') }}" class="link-color"><i class="fa fa-blind hidden-xs"
                                                                                  aria-hidden="true"></i> Những câu hỏi
                                                thường gặp</a></em>
                                    </div>
                                </div>
                            </article>

                            <article class="panel panel-default">
                                <div class="panel-heading icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="panel-heading">
                                    <h2 class="panel-title">Cập nhật Thông Tin Cá Nhân</h2>
                                </div>
                                <div class="panel-body">
                                    {{-- Thông báo thành công --}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form id="avatar-upload-form"
                                          action="{{ route('trang-ca-nhan.update', $user->id) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="file" id="hidden_upload_avatar" name="hinh_anh"
                                               style="display:none" accept="image/*">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="fullName">Họ và Tên:</label>
                                                    <input type="text"
                                                           class="form-control @error('ten_doc_gia') is-invalid @enderror"
                                                           id="fullName" name="ten_doc_gia"
                                                           value="{{ old('ten_doc_gia', $user->ten_doc_gia) }}">
                                                    @error('ten_doc_gia')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="phone">Số điện thoại:</label>
                                                    <input type="text"
                                                           class="form-control @error('so_dien_thoai') is-invalid @enderror"
                                                           id="phone" name="so_dien_thoai"
                                                           value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
                                                    @error('so_dien_thoai')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="gender">Giới tính:</label>
                                                    <select name="gioi_tinh" id="gender"
                                                            class="form-control @error('gioi_tinh') is-invalid @enderror">
                                                        <option value="Nam"
                                                            {{ old('gioi_tinh', $user->gioi_tinh) == 'Nam' ? 'selected' : '' }}>
                                                            Nam
                                                        </option>
                                                        <option value="Nữ"
                                                            {{ old('gioi_tinh', $user->gioi_tinh) == 'Nữ' ? 'selected' : '' }}>
                                                            Nữ
                                                        </option>
                                                    </select>
                                                    @error('gioi_tinh')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="dob">Ngày sinh:</label>
                                                    <input type="date"
                                                           class="form-control @error('sinh_nhat') is-invalid @enderror"
                                                           id="dob" name="sinh_nhat"
                                                           max="{{ now()->format('Y-m-d') }}"
                                                           value="{{ old('sinh_nhat', $user->sinh_nhat ? \Carbon\Carbon::parse($user->sinh_nhat)->format('Y-m-d') : '') }}">
                                                    @error('sinh_nhat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="fullName">Bút danh:</label>
                                                    <input type="text"
                                                           class="form-control @error('but_danh') is-invalid @enderror"
                                                           id="fullName" name="but_danh"
                                                           value="{{ old('but_danh', $user->but_danh) }}">
                                                    @error('but_danh')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="email">Email:</label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email" name="email"
                                                           value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="address">Địa chỉ:</label>
                                                    <input type="text"
                                                           class="form-control @error('dia_chi') is-invalid @enderror"
                                                           id="address" name="dia_chi"
                                                           value="{{ old('dia_chi', $user->dia_chi) }}">
                                                    @error('dia_chi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="dob">Ngày tham gia:</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="created_at"
                                                           value="{{ $user->created_at->format('d-m-Y') }} ({{$user->created_at->diffForHumans()}})"
                                                           disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                                            <button type="reset" class="btn btn-secondary">Hủy bỏ</button>

                                        </div>
                                    </form>
                                </div>
                            </article>

                            {{--                  --}}

                        </div>
                    </div>
                    {{--                    end profile                    --}}

                    <div id="upload-content" class="menu-content hidden-content">
                        <style>
                            .list-group-item.tf-active1 {
                                background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                                color: white;
                            }

                            .list-group-item.tf-active1 a {
                                color: white;
                            }
                        </style>

                        <h1 id="">Tủ sách cá nhân</h1>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item tf-active1" id="menu-currently-reading"
                                data-target="#currently-reading">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book" aria-hidden="true"></i> Sách đang đọc
                                    <span class="badge total"></span>
                                </a>
                            </li>
                            <li class="list-group-item" id="menu-purchased" data-target="#purchased">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Sách đã mua
                                    <span class="badge">{{ $sachDaMua->total() }}</span>
                                </a>
                            </li>
                            <li class="list-group-item" id="menu-favorites" data-target="#favorites">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-heart" aria-hidden="true"></i> Yêu thích
                                    <span class="badge">{{ $danhSachYeuThich->total() }}</span>
                                </a>
                            </li>

                        </ul>

                        <div id="currently-reading-content" class="content-div" style="display: block;">
                            <div class="hr-primary"></div>
                            <form id="filter" method="get">
                                <div class="list-group-item list-group-item-info d-flex">
                                    <strong class="font-16">Sách đang đọc (<span class="total"></span>)</strong>
                                    <div class="d-flex justify-content-between">
                                        <div class="input-group">
                                            <input name="title" type="text" class="form-control"
                                                   placeholder="Nhập tên sách" value="{{ request('title') }}"
                                                   id="searchInput"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary color-white" type="button"
                                                        id="searchButton">
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
                                            <th>Chương đang đọc</th>
                                            <th>Chương mới ra</th>
                                            <th>Tình Trạng</th>
                                            <th>Thời gian</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tu_sach_ca_nhan">
                                        </tbody>
                                    </table>
                                    {{--                                    <ul class="pagination text-center" id="id_pagination">--}}
                                    {{--                                        <li class="active"><a href="/user/nhiem-vu/?q=1&x=1&n=1#h1">1</a></li>--}}
                                    {{--                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">2</a></li>--}}
                                    {{--                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=3#h1">3</a></li>--}}
                                    {{--                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=4#h1">4</a></li>--}}
                                    {{--                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=5#h1">5</a></li>--}}
                                    {{--                                        <li><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">»</a></li>--}}
                                    {{--                                    </ul>--}}
                                    <div id="pagination" class="">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="purchased-content" class="content-div" style="display: none;">
                            <div class="hr-primary"></div>
                            <div class="list-group-item list-group-item-info d-flex">
                                <strong class="font-16">Sách đã mua({{ $sachDaMua->total() }})</strong>
                            </div>
                            <div class="list-group-item">
                                <div style="overflow-x:auto;">

                                    <div id="sach-da-mua">
                                        @include('client.pages.sach-da-mua', [
                                            'sachDaMua' => $sachDaMua,
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="favorites-content" class="content-div" style="display: none;">
                            <div class="hr-primary"></div>
                            <div class="list-group-item list-group-item-info d-flex">
                                <strong class="font-16">Sách yêu thích ({{ $danhSachYeuThich->total() }})</strong>


                            </div>
                            <div class="list-group-item">
                                <div style="overflow-x:auto;">

                                    <div id="yeu-thich-content">
                                        @include('client.pages.sach-yeu-thich', [
                                            'danhSachYeuThich' => $danhSachYeuThich,
                                        ])

                                    </div>
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .pagination {
                                padding: 15px 0 0 0
                            }

                            ul.pagination li {
                                list-style: none;
                                display: inline-block;
                                margin: 10px 0
                            }

                            .pagination li:hover a {
                                background: linear-gradient(135deg, #848484 30%, #000 100%);
                                color: #fff
                            }

                            .pagination li.active a {
                                color: #fff;
                                background: linear-gradient(135deg, #000 30%, #848484 100%)
                            }

                            .pagination li.active:hover a,
                            .pagination li.disabled:hover a {
                                background: linear-gradient(135deg, #000 30%, #848484 100%);
                                cursor: not-allowed;
                                pointer-events: none
                            }

                            .pagination li a {
                                border: solid 1px #000;
                                color: #000;
                                padding: .6rem 1rem;
                                border-radius: 4px;
                                border: solid 1px #000;
                                margin: 4px 2px
                            }
                        </style>
                    </div>

                    {{--                    end đăng truyên                 --}}

                    <div id="library-content" class="menu-content hidden-content">
                        @include('client.pages.lich-su-giao-dich')
                    </div>

                    {{-- Security Settings Page --}}
                    <div id="security-content" class="menu-content hidden-content">
                        <h1>Đổi mật khẩu</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    @include('client.pages.doi-mat-khau')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Notification Settings Page --}}
                    <div id="notification-content" class="menu-content hidden-content">
                        <h1>Thông báo</h1>
                        <div class="filter">
                            {{-- <label for="notification-type">Lọc thông báo:</label>
                            <select id="notification-type" class="form-control" onchange="filterNotifications()">
                                <option value="all" {{ $type === 'all' ? 'selected' : '' }}>Tất cả thông báo</option>
                                <option value="sach" {{ $type === 'sach' ? 'selected' : '' }}>Thông báo về sách</option>
                                <option value="tien" {{ $type === 'tien' ? 'selected' : '' }}>Thông báo về giao dịch
                                    tiền</option>
                            </select> --}}
                        </div>
                        <div class="timeline">
                            @foreach ($thongBaos as $thongBao)
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last">
                                        <i class="fa fa-circle {{ $thongBao->trang_thai === 'chua_xem' ? 'text-danger' : 'text-success' }}"
                                           aria-hidden="true"></i>
                                        <a href="{{ route('chi-tiet-thong-bao', ['id' => $thongBao->id]) }}">
                                            <span
                                                class="notify-date">{{ $thongBao->created_at->format('d/m/Y') }}</span>
                                            {{ $thongBao->tieu_de }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Tạo phân trang với ul và li -->
                        <ul class="pagination text-center" id="id_pagination">
                            <!-- Nút quay lại trang trước -->
                            @if ($thongBaos->onFirstPage())
                                <li class="disabled"><span>«</span></li>
                            @else
                                <li><a href="{{ $thongBaos->previousPageUrl() }}">«</a></li>
                            @endif

                            <!-- Các trang -->
                            @for ($i = 1; $i <= $thongBaos->lastPage(); $i++)
                                @if ($i == $thongBaos->currentPage())
                                    <li class="active"><a href="#">{{ $i }}</a></li>
                                @else
                                    <li><a href="{{ $thongBaos->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            <!-- Nút chuyển đến trang sau -->
                            @if ($thongBaos->hasMorePages())
                                <li><a href="{{ $thongBaos->nextPageUrl() }}">»</a></li>
                            @else
                                <li class="disabled"><span>»</span></li>
                            @endif
                        </ul>

                        <style type="text/css">
                            .pagination {
                                padding: 15px 0 0 0
                            }

                            ul.pagination li {
                                list-style: none;
                                display: inline-block;
                                margin: 10px 0
                            }

                            .pagination li:hover a {
                                background: linear-gradient(135deg, #848484 30%, #000 100%);
                                color: #fff
                            }

                            .pagination li.active a {
                                color: #fff;
                                background: linear-gradient(135deg, #000 30%, #848484 100%)
                            }

                            .pagination li.active:hover a,
                            .pagination li.disabled:hover a {
                                background: linear-gradient(135deg, #000 30%, #848484 100%);
                                cursor: not-allowed;
                                pointer-events: none
                            }

                            .pagination li a {
                                border: solid 1px #000;
                                color: #000;
                                padding: .6rem 1rem;
                                border-radius: 4px;
                                border: solid 1px #000;
                                margin: 4px 2px
                            }
                        </style>
                    </div>

                </div>


                {{-- Account Deactivation Page --}}
                <div id="deactivation-content" class="menu-content hidden-content">

                    <h1 class="text-center crop-text-2">Những Câu Hỏi Thường Gặp</h1>
                    <h2 class="crop-text-2">Dành Cho Độc Giả</h2>
                    <div class="panel-group row" id="fqa">
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q1">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" aria-expanded="false">
                                            <span class="number">1</span>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            Website hỗ trợ những phương thức thanh toán nào?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Hiện tại, website hỗ trợ hai phương thức thanh toán là Momo và
                                        ZaloPay. Cả hai phương thức này đều an toàn và tiện lợi, giúp bạn hoàn tất đơn hàng dễ dàng.
                                        Khi chọn phương thức thanh toán, bạn sẽ được chuyển hướng đến giao diện bảo mật, đảm bảo an toàn thông tin tài chính.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q2">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse2" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">2</span>Làm thế nào để thanh toán qua Momo hoặc ZaloPay?</a></h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Để thanh toán, bạn chỉ cần chọn phương thức thanh toán tương ứng tại bước thanh toán và làm theo hướng dẫn trên màn hình.
                                        Sau khi hoàn tất giao dịch, bạn sẽ nhận được thông báo xác nhận thanh toán thành công.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q3">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse3" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">3</span>Sau khi thanh toán thành công, tôi sẽ nhận sách hoặc thông tin truy cập như thế nào? </a></h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Sau khi thanh toán thành công, hệ thống sẽ tự động xác nhận và gửi thông tin truy cập qua email mà bạn đã đăng ký.
                                        Đối với các sách điện tử,
                                        bạn có thể đăng nhập và đọc sách ngay trên website.
                                        Nếu gặp vấn đề trong việc truy cập, vui lòng liên hệ với bộ phận hỗ trợ để được giúp đỡ.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q4">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse4" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">4</span>Làm cách nào để đánh giá sách sau khi mua?</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Sau khi mua sách, bạn có thể truy cập vào “Tủ sách cá nhân” và chọn "Sách đã mua" tại đây bạn sẽ chọn cuốn sách để đánh giá.
                                        Đánh giá của bạn sẽ giúp ích cho người mua khác và giúp chúng tôi cải thiện dịch vụ.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q5">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse5" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">5</span><i class="fa fa-ticket"
                                                                          aria-hidden="true"></i>Tôi có thể thay đổi thông tin cá nhân của mình không?</a></h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Bạn hoàn toàn có thể thay đổi thông tin cá nhân bằng cách truy cập vào mục “Thông tin cá nhân” sau khi đăng nhập.
                                        Bạn có thể chỉnh sửa các thông tin như tên, địa chỉ email, và mật khẩu,.... Mọi thay đổi sẽ được cập nhật ngay lập tức.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q6">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse6" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">6</span>Website có chính sách bảo mật thông tin cá nhân như thế nào?</a></h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Chúng tôi cam kết bảo mật tuyệt đối mọi thông tin cá nhân của khách hàng.
                                        Mọi dữ liệu cá nhân được mã hóa và lưu trữ an toàn,
                                        chỉ sử dụng cho mục đích giao dịch và cải thiện dịch vụ.
                                        Bạn có thể tham khảo chi tiết về cam kết bảo mật tại trang “Chính sách Bảo mật” của chúng tôi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q7">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse7" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">7</span> Tôi nên làm gì nếu phát hiện tài khoản của mình có dấu hiệu bất thường?</a></h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Nếu bạn phát hiện tài khoản có dấu hiệu bất thường như thay đổi mật khẩu hoặc giao dịch lạ, hãy liên hệ ngay với bộ phận hỗ trợ để được hỗ trợ và khôi phục tài khoản.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q8">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse8" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">8</span>Làm cách nào để liên hệ với đội ngũ hỗ trợ của website?</a></h4>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Bạn có thể liên hệ với đội ngũ hỗ trợ qua biểu mẫu liên hệ trực tuyến tại mục “Liên hệ” trên website. Vui lòng cung cấp thông tin chi tiết và chúng tôi sẽ phản hồi trong vòng 24 giờ.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q9">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse9" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">9</span><i class="fa fa-bolt" aria-hidden="true"></i>
                                            Tôi có thể đọc sách đã mua trên các thiết bị nào?</a></h4>
                                </div>
                                <div id="collapse9" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Bạn có thể đọc sách trực tuyến trên hầu hết các thiết bị có trình duyệt như máy tính
                                        . Chỉ cần đăng nhập tài khoản trên website là bạn có thể truy cập vào thư viện sách của mình.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q10">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse10" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">10</span>Làm sao để đăng ký tài khoản và bắt đầu mua sách?</a></h4>
                                </div>
                                <div id="collapse10" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">
                                        Bạn có thể đăng ký tài khoản miễn phí bằng cách nhấn vào nút “Đăng ký” trên trang chủ và điền thông tin yêu cầu.
                                        Sau khi xác nhận qua email, bạn đã có thể đăng nhập và bắt đầu mua sách.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q11">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse11" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">11</span>Tôi quên mật khẩu. Làm sao để khôi phục? </a></h4>
                                </div>
                                <div id="collapse11" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Truy cập vào trang đăng nhập, nhấn vào “Quên mật khẩu”
                                        và nhập email đăng ký của bạn. Hệ thống sẽ gửi email hướng dẫn để đặt lại mật khẩu mới.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q12">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapse12" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">12</span>Website có lưu trữ thông tin thanh toán của tôi không?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse12" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    Không, chúng tôi không lưu trữ bất kỳ thông tin thẻ tín dụng hoặc thông tin thanh toán nào của bạn.
                                    Các giao dịch thanh toán đều được thực hiện qua cổng thanh toán an toàn và được mã hóa để bảo vệ dữ liệu tài chính của bạn.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="crop-text-2">Dành Cho Cộng Tác Viên</h2>
                    <div class="panel-group row" id="fqa">
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q1">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez1" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">1</span>Làm thế nào để đăng ký trở thành cộng tác viên của website?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsez1" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Để đăng ký, bạn có thể truy cập trang “Đăng ký Cộng tác viên” trên website
                                        và điền đầy đủ các thông tin cần thiết. Sau khi xác nhận qua email,
                                        bạn sẽ chính thức trở thành cộng tác viên và có thể bắt đầu chia sẻ liên kết để nhận hoa hồng từ mỗi đơn hàng thành công.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q2">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez2" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">2</span>Yêu cầu và điều kiện để trở thành cộng tác viên là gì?</a>
                                    </h4>
                                </div>
                                <div id="collapsez2" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Để trở thành cộng tác viên, bạn cần sở hữu tài khoản trên website và có kênh tiếp thị cá nhân, như blog hoặc trang mạng xã hội.
                                        Chúng tôi yêu cầu các cộng tác viên cam kết tuân thủ chính sách hợp tác, không sử dụng các phương pháp quảng cáo không lành mạnh.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q3">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez3" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">3</span>Lợi ích của cộng tác viên khi tham gia cùng website là gì?</a>
                                    </h4>
                                </div>
                                <div id="collapsez3" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Khi trở thành cộng tác viên, bạn sẽ nhận được hoa hồng từ các đơn hàng thành công qua liên kết giới thiệu.
                                        Ngoài ra, bạn có thể nhận được các phần thưởng dựa trên hiệu quả bán hàng, giúp bạn có thêm thu nhập từ việc chia sẻ sách đến người đọc.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q4">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez4" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">4</span>Cộng tác viên sẽ nhận hoa hồng như thế nào và bao lâu thì thanh toán?</a>
                                    </h4>
                                </div>
                                <div id="collapsez4" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Hoa hồng sẽ được thanh toán định kỳ theo tháng, thông qua phương thức thanh toán mà bạn đăng ký.
                                        Số tiền hoa hồng sẽ được tính toán dựa trên các đơn hàng thành công ,
                                        và hệ thống sẽ thông báo khi khoản thanh toán được xử lý.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q5">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez5" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">5</span>Tôi có thể thay đổi thông tin đăng ký cộng tác viên của mình không?</a></h4>
                                </div>
                                <div id="collapsez5" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body">Bạn hoàn toàn có thể thay đổi các thông tin đăng ký bằng cách đăng nhập vào tài khoản và truy cập phần
                                        “Hồ sơ”. Nếu cần hỗ trợ thêm, vui lòng liên hệ với bộ phận hỗ trợ.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q6">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez6" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">6</span>Tôi có thể liên hệ để khiếu nại hoặc phản hồi về các chính sách cộng tác viên không?</a></h4>
                                </div>
                                <div id="collapsez6" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Chúng tôi luôn lắng nghe các phản hồi và ý kiến từ cộng tác viên.
                                        Nếu có khiếu nại hoặc đóng góp ý kiến về chính sách cộng tác,
                                        bạn có thể liên hệ qua biểu mẫu hoặc qua email hỗ trợ. Chúng tôi sẽ tiếp nhận và xử lý sớm nhất có thể.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q7">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez7" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">7</span>Chính sách bảo mật của website đối với cộng tác viên như thế nào?</a>
                                    </h4>
                                </div>
                                <div id="collapsez7" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Thông tin cộng tác viên của chúng tôi được bảo mật tuyệt đối và
                                        không được chia sẻ cho bên thứ ba nếu không có sự đồng ý từ bạn.
                                        Mọi giao dịch và dữ liệu cộng tác viên đều được mã hóa và lưu trữ an toàn để bảo vệ quyền lợi của bạn.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="panel panel-default" id="q8">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapsez8" class="collapsed"
                                                               aria-expanded="false"> <span
                                                class="number">8</span>Sau khi đăng ký làm cộng tác viên, tôi bắt đầu kiếm tiền như thế nào?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsez8" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 211px;">
                                    <div class="panel-body"> Sau khi đăng ký thành công, bạn sẽ nhận được một liên kết giới thiệu.
                                        Chỉ cần chia sẻ liên kết này trên các kênh của bạn, mỗi khi khách hàng mua hàng qua liên kết, bạn sẽ nhận được hoa hồng.
                                        Tất cả doanh thu từ liên kết đều được cập nhật trong tài khoản cộng tác viên của bạn.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- Activity Log Page --}}
                <div id="activity-log-content" class="menu-content hidden-content">
                    <h1>Nhật ký hoạt động</h1>
                    <div class="timeline">
                        <div class="line text-muted"></div>
                        <article class="panel panel-info panel-outline">
                            <div class="panel-heading icon">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">

                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
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
@push('scripts')
    <script>
        document.getElementById('upload_avatar').addEventListener('change', function (event) {
            const input = event.target;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Cập nhật src của ảnh đại diện với ảnh mới đã chọn
                    document.getElementById('avatar-preview').src = e.target.result;
                }

                // Đọc file ảnh đã chọn
                reader.readAsDataURL(input.files[0]);

                // Cập nhật file vào input ẩn để gửi trong form
                const hiddenFileInput = document.getElementById('hidden_upload_avatar');
                hiddenFileInput.files = input.files;
            }
        });
    </script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.list-group-horizontal .list-group-item').forEach(item => {
                item.addEventListener('click', function () {
                    document.querySelectorAll('.list-group-horizontal .list-group-item').forEach(
                        i => {
                            i.classList.remove('tf-active1');
                        });

                    this.classList.add('tf-active1');

                    document.querySelectorAll('.content-div').forEach(content => {
                        content.style.display = 'none';
                    });

                    // Hiển thị nội dung tương ứng
                    const targetId = this.getAttribute('data-target');
                    const targetContentDiv = document.querySelector(targetId + '-content');
                    if (targetContentDiv) {
                        targetContentDiv.style.display = 'block';
                    }
                });
            });

            document.querySelectorAll('#user-sidebar .list-group-item').forEach(item => {
                item.addEventListener('click', function () {
                    var targetContent = this.querySelector('a').getAttribute('data-target');

                    document.querySelectorAll('.menu-content').forEach(content => {
                        content.classList.add('hidden-content');
                    });

                    document.getElementById(targetContent).classList.remove('hidden-content');

                    var breadcrumbText = this.querySelector('a').getAttribute('data-breadcrumb');
                    document.getElementById('breadcrumb-text').textContent = breadcrumbText;

                    document.querySelectorAll('.list-group-item').forEach(i => {
                        i.classList.remove('tf-active');
                    });

                    this.classList.add('tf-active');
                });
            });

            var menuUpload = document.getElementById('menu-upload');
            var currentlyReadingContent = document.getElementById('currently-reading-content');
            var purchasedContent = document.getElementById('purchased-content');
            var favoritesContent = document.getElementById('favorites-content');

            menuUpload.addEventListener('click', function () {
                currentlyReadingContent.style.display = 'block';
                purchasedContent.style.display = 'none';
                favoritesContent.style.display = 'none';

                document.getElementById('menu-currently-reading').click();
            });

            document.querySelector('#menu-currently-reading').click();
        });
    </script>

    <script>
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();

            var page = $(this).attr('href').split('page=')[1]; // Lấy số trang từ URL
            var targetContent = $(this).closest('.content-div').attr(
                'id'); // Lấy loại nội dung (sách đã mua hoặc yêu thích)

            var section = (targetContent === 'purchased-content') ? 'purchased' :
                'favorites'; // Xác định phần đang thao tác

            $.ajax({
                url: $(this).attr('href'),
                data: {
                    section: section
                }, // Gửi section để phân biệt phần được yêu cầu
                success: function (data) {
                    if (section === 'purchased') {
                        $('#sach-da-mua').html(data); // Cập nhật nội dung sách đã mua
                    } else {
                        $('#yeu-thich-content').html(data); // Cập nhật nội dung sách yêu thích
                    }
                },
                error: function () {
                    alert('Có lỗi xảy ra khi tải dữ liệu!');
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-btn', function () {
            event.preventDefault();
            var form = $(this).closest('form'); // Lưu trữ form
            var url = form.attr('action'); // Lấy URL từ thuộc tính action của form

            if (confirm('Bạn có chắc chắn muốn xóa không?')) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize() +
                        '&_method=DELETE',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            form.closest('tr').remove();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 419) {
                            alert(
                                'Phiên làm việc đã hết hạn. Vui lòng tải lại trang và thử lại.');
                        } else {
                            alert('Có lỗi xảy ra. Vui lòng thử lại.');
                        }
                    }
                });
            }
        });
    </script>

    <style type="text/css">
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .d-flex .form-group {
            margin-bottom: 0px;
        }

        table {
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        .table > caption + thead > tr:first-child > td,
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > td,
        .table > thead:first-child > tr:first-child > th {
            border-top: 0;
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }

        .table > tbody > tr > td,
        .table > tbody > tr > th,
        .table > tfoot > tr > td,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > thead > tr > th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        tbody th {
            font-weight: normal;
        }

        table tbody tr:last-child .dropdown-menu,
        table tbody tr:nth-last-child(2) .dropdown-menu {
            /*		right: 0;
                                                                                                                    left: unset;
                                                                                                                    top: unset;
                                                                                                                    bottom: 35px;*/
        }

        ul.pagination li {
            list-style: none;
            display: inline-block;
            margin: 10px 0px;
        }

        .pagination li:hover a {
            background: linear-gradient(135deg, #848484 30%, #000000 100%);
            color: #fff;
        }

        .pagination li.active a {
            color: #fff;
            background: linear-gradient(135deg, #000000 30%, #848484 100%);
        }

        .pagination li.active:hover a,
        .pagination li.disabled:hover a {
            background: linear-gradient(135deg, #000000 30%, #848484 100%);
            cursor: not-allowed;
            pointer-events: none;
        }

        .pagination li a {
            border: solid 1px #000000;
            color: #000000;
            padding: 0.6rem 1.0rem;
            border-radius: 4px;
            border: solid 1px black;
            margin: 4px 2px;
        }

        #css-td-n-a-q-a td {
            display: block;
            width: 100%
        }
    </style>


    <script>
        $(document).ready(function () {
            let currentPage = 1
            let debounceTimer;

            function fetchTuSachCaNhans(page = 1) {
                const formData = $('#filter').serialize() + `&page=${page}`;
                $.ajax({
                    url: '{{ route('sach-dang-doc', auth()->user()->id) }}',
                    type: 'GET',
                    data: formData,
                    success: function (response) {
                        $('.total').html(`${response.total}`);
                        $('#tu_sach_ca_nhan').empty();
                        response.data.forEach(function (data) {

                            let content = `
                                             <tr>

                                            <th>
                                                <img src="${data.anh_bia_sach}"
                                                     width="40" height="60" style="margin-right: 5px;"/>
                                               <a href="/sach/${data.sach_id}"> ${data.ten_sach}</a>
                                            </th>
                                            <th><a href="/tac-gia/${data.user_id}">${data.but_danh ? data.but_danh : data.ten_doc_gia}</a></th>
                                            <th><a href="/chi-tiet-chuong/${data.sach_id}/${data.chuong_id}/${data.ten_chuong}">Chương ${data.so_chuong_dang_doc}</a></th>
                                            <th><a href="/chi-tiet-chuong/${data.sach_id}/${data.chuong_moi_id}/${data.ten_chuong_moi}"
                                                class="chuong-link"
                                                data-user-sach-id="${data.sach_id}"
                                                data-chuong-id="${data.chuong_moi_id}"
                                                    >Chương ${data.so_chuong_moi_ra}</a></th>
                                            <th><span class="${data.tinh_trang_cap_nhat == 'da_full' ? 'text-success' : 'text-warning'}">${data.tinh_trang_cap_nhat == 'da_full' ? 'Hoàn thành' : 'Đang cập nhật'}</span></th>
                                            <th>${data.updated_at}</th>
                                        </tr>
                            `;
                            $('#tu_sach_ca_nhan').append(content);
                        });

                        // Cập nhật phân trang
                        $('#pagination').empty(); // Xóa nội dung cũ
                        let paginationContent = `
                         <div>   <span>Trang ${response.current_page} / ${response.last_page}</span> <div class="text-center">
                            <button id="prev" class="btn btn-primary" ${response.current_page === 1 ? 'disabled' : ''}>«</button>
                        `;

                        // Tạo các nút cho từng trang
                        for (let i = 1; i <= response.last_page; i++) {
                            paginationContent += `<button class="btn page-link me-2 ${response.current_page === i ? 'btn-primary' : 'btn-secondary'}"  data-page="${i}">${i}</button>`;
                        }

                        paginationContent += `
                            <button id="next" class="btn btn-primary" ${response.current_page === response.last_page ? 'disabled' : ''}>»</button> </div> </div>
                        `;
                        $('#pagination').append(paginationContent);

                        // Cập nhật sự kiện cho các nút phân trang
                        $('#prev').off('click').on('click', function () {
                            if (currentPage > 1) {
                                currentPage--;
                                fetchTuSachCaNhans(currentPage);
                            }
                        });

                        $('#next').off('click').on('click', function () {
                            if (currentPage < response.last_page) {
                                currentPage++;
                                fetchTuSachCaNhans(currentPage);
                            }
                        });

                        // Sự kiện cho các nút số trang
                        $('.page-link').off('click').on('click', function () {
                            const page = $(this).data('page'); // Lấy số trang từ data-page
                            currentPage = page; // Cập nhật trang hiện tại
                            fetchTuSachCaNhans(currentPage); // Gọi lại hàm fetchTuSachCaNhans với trang mới
                        });
                    },
                    error: function () {
                        console.error('Lỗi');
                    }
                });

            }

            $('#searchButton').on('click', function () {
                currentPage = 1; // Reset trang hiện tại về 1 khi tìm kiếm
                fetchTuSachCaNhans(currentPage);
            });

            $('#searchInput').on('input', function () {
                clearTimeout(debounceTimer); // Clear the timer if it's already set
                const inputValue = $(this).val(); // Get the input value

                // Set a new timer to delay the search
                debounceTimer = setTimeout(function () {
                    currentPage = 1; // Reset the current page to 1 when searching
                    fetchTuSachCaNhans(currentPage); // Call the fetchBooks function
                }, 300); // 300 ms delay
            });
            fetchTuSachCaNhans()
        });
    </script>
    <script>
        $(document).on('click', '.chuong-link', function (e) {
            e.preventDefault(); // Prevent default link behavior

            var userSachId = $(this).data('user-sach-id');
            var chuongId = $(this).data('chuong-id');
            var href = $(this).attr('href');

            // Send AJAX request to save reading history
            $.ajax({
                url: '/lich-su-doc/' + userSachId + '/' + chuongId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    // Redirect to the chapter page after successful save
                    window.location.href = href;
                },
                error: function (xhr, status, error) {
                    // Redirect to the chapter page even if there's an error
                    window.location.href = href;
                }
            });
        });

    </script>
@endpush
