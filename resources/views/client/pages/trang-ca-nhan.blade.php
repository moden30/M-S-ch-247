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

            .img-bordered {
                border: 3px solid gray;
                border-radius: 50%;
            }

            .hidden-content {
                display: none;
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
            <li class="breadcrumb-item active">
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
                            <img
                                src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                alt="Avatar" class="img-bordered"/>
                        </div>
                    </div>
                    <div class="ss-info zbottom-10">
                        <div class="user_nickname">
                            <a href="https://truyenhdt.com/author/1728740683/">
                                {{ $user->ten_doc_gia }} </a>
                        </div>
                    </div>
                </div>
                <div id="user-sidebar">
                    <ul class="list-group">
                        <li class="list-group-item tf-active" id="menu-profile">
                            <a href="javascript:void(0)" class="menu-link" data-target="profile-content" data-breadcrumb="Hồ sơ"><i
                                    class="fa fa-tachometer" aria-hidden="true"></i> Hồ sơ</a>
                        </li>
                        <li class="list-group-item" id="menu-upload">
                            <a href="javascript:void(0)" class="menu-link" data-target="upload-content" data-breadcrumb="Đăng Truyện"><i
                                    class="fa fa-cloud-upload" aria-hidden="true"></i> Đăng Truyện</a>
                        </li>
                        <li class="list-group-item" id="menu-message">
                            <a href="javascript:void(0)" class="menu-link" data-target="message-content" data-breadcrumb="Tin Nhắn"><i
                                    class="fa fa-envelope" aria-hidden="true"></i> Tin Nhắn</a>
                        </li>
                        <li class="list-group-item" id="menu-library">
                            <a href="javascript:void(0)" class="menu-link" data-target="library-content" data-breadcrumb="Tủ Truyện"><i
                                    class="fa fa-database" aria-hidden="true"></i> Tủ Truyện</a>
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
                </style>
            </div>
            <div class="col-lg-9 col-xs-12">
                {{----}}
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
                                                    <img id="avatar-preview"
                                                         src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                         alt="Avatar"/>
                                                </div>

                                                <input type="file" id="upload_avatar" accept="image/*">

                                                <label for="upload_avatar" class="user_avatar_upload_icon">
                                                    <span class="glyphicon glyphicon-folder-open"
                                                          aria-hidden="true"></span>
                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                                                </label>
                                            </div>


                                        </div>
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="user_card_info_0">
                                                <span
                                                    class="user_card_info">◉ Họ và tên:</span> {{ $user->ten_doc_gia }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span
                                                    class="user_card_info crop-text">◉ Email:</span> {{ $user->email }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ ID Thành Viên:</span> {{ $user->id }}
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="user_card_info_0">
                                                <span
                                                    class="user_card_info">◉ Số điện thoại:</span> {{ $user->so_dien_thoai }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Ngày sinh:</span>
                                                {{ \Carbon\Carbon::parse($user->sinh_nhat)->format('d/m/Y') }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Giới tính:</span> {{ $user->gioi_tinh }}
                                            </div>
                                            <div class="user_card_info_0">
                                              <span class="user_card_info"><i class="fa fa-money"
                                                                              aria-hidden="true"></i> Số
                                                  dư:</span> {{ number_format($user->so_du, 0, ',', '.') }} VNĐ
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3"></div>

                                    </div>

                                    <div class="col-xs-12 col-sm-9">
                                        <em><a href="/q-a/" class="link-color"><i class="fa fa-blind hidden-xs"
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
                                    {{-- Thông báo thành công--}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    {{--  Thông báo lỗi chung--}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong class="fs-5">Thất bại</strong> <br>
                                            <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form id="avatar-upload-form"
                                          action="{{ route('trang-ca-nhan.update', $user->id) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="file" id="hidden_upload_avatar" name="hinh_anh"
                                               style="display:none"
                                               accept="image/*">

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
                                                    <label for="email">Email:</label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email"
                                                           name="email" value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="address">Địa chỉ:</label>
                                                    <input type="text"
                                                           class="form-control @error('dia_chi') is-invalid @enderror"
                                                           id="address"
                                                           name="dia_chi" value="{{ old('dia_chi', $user->dia_chi) }}">
                                                    @error('dia_chi')
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
                        <h1>Đăng Truyện</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">
                                            <h2>Code ở đây</h2>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                        </div>
                                    </div>
                                </div>
                            </article>


                            {{--                  --}}

                        </div>
                    </div>

                    {{--                    end đăng truyên                 --}}
                    <div id="message-content" class="menu-content hidden-content">
                        <h1>Tin nhắn</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">
                                            <h2>Code ở đây</h2>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                        </div>
                                    </div>
                                </div>
                            </article>


                            {{--                  --}}

                        </div>
                    </div>

                    {{--                    end tin nhắn                    --}}
                    <div id="library-content" class="menu-content hidden-content">
                        <h1>Tủ truyện</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">
                                            <h2>Code ở đây</h2>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                        </div>
                                    </div>
                                </div>
                            </article>


                            {{--                  --}}

                        </div>
                    </div>

                    {{--                    end tủ truyện                    --}}
                </div>
                {{----}}
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
        $(document).ready(function () {
            $('.menu-link').click(function (e) {
                e.preventDefault();

                var targetContent = $(this).data('target');
                var breadcrumbText = $(this).data('breadcrumb');

                $('.menu-content').addClass('hidden-content');
                $('#' + targetContent).removeClass('hidden-content');

                $('.list-group-item').removeClass('tf-active');
                $(this).closest('li').addClass('tf-active');

                $('.breadcrumb-item.active').text(breadcrumbText);
            });
        });
    </script>
@endpush
