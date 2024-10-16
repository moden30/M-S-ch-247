@extends('client.layouts.app')
@section('content')
<div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('thong-bao-chung', $thong_bao->id) }}"><i class="fa fa-bell" aria-hidden="true"></i> Thông
                    Báo</a></li>
            <li class="breadcrumb-item"><a href="index.html">Thông Báo {{ $thong_bao->tieu_de }}</a></li>
        </ol>
    </div>
    <div class="container post">
        <div class="row">
            <div class="col-xs-12 col-md-2"> </div>
            <div class="col-xs-12 col-md-8 full-img">
                <h1 class="text-center crop-text-2">{{ $thong_bao->tieu_de }}</h1>
{{--                <div id="author">--}}
{{--                    <div class="user">--}}
{{--                        <div class="avatar">--}}
{{--                            <a href="../../author/admin/index.html">--}}
{{--                                <img src="{{ asset('storage/' . $thong_bao->user->hinh_anh) }}" />--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="name">--}}
{{--                            <a href="../../author/admin/index.html">--}}
{{--                                <span style="color:#ff0000">--}}
{{--                                    Chấp Niệm--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                            <div class="role">Quản Trị Viên</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i> 2024-03-01 16:01:29 </div>--}}
{{--                </div>--}}
                <blockquote> Chào độc giả: {{ $thong_bao->user->ten_doc_gia }} thân mến,
                    <br><br>
                   {{ $thong_bao->noi_dung }}
                </blockquote>
                <div id="show_pre_comment_ajax"></div>
                <div id="zdata" data-postname="thong-bao-tinh-nang-moi" data-posttype="notify"></div>
            </div>
            <div class="col-xs-12 col-md-2"> </div>
        </div>
    </div>
    <style type="text/css">
        #author .avatar img {
            width: 50px;
            height: 50px;
            display: block;
            -webkit-box-shadow: 0 10px 15px 0 rgb(0 0 0 / 15%);
            -moz-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
            box-shadow: 0 10px 15px 0 rgb(0 0 0 / 15%);
            border-radius: 50%;
        }

        #author {
            display: flex;
            justify-content: space-between;
            align-content: center;
            background-color: rgba(0, 0, 0, .04);
            padding: 20px;
        }

        #author .user {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        #author .user .avatar {
            margin-right: 20px;
        }

        #author .date {
            margin-top: auto;
            margin-bottom: auto;
            color: gray;
            font-size: 12px;
            font-style: italic;
        }

        #author .role {
            margin-top: 10px;
            font-size: 12px;
        }

        .full-img img {
            width: 100%
        }

        .container.post h1 {
            font-size: 32px;
            padding-right: 15px;
            padding-left: 15px;
            font-family: "Oswald";
            font-weight: normal;
        }

        .container.post h2 {
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .container.post h1 {
                font-size: 24px;
            }
        }

        /*------------------------------------------*/
        .reading {
            font-size: 20px;
            font-family: "Times New Roman", Times, serif;
            word-wrap: break-word;
        }

        .reading a {
            border-style: solid;
            border-bottom-width: 2px;
            margin: 0px auto;
            -webkit-border-image: -webkit-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
            border-image-slice: 1;
            border-top: 0;
            border-right: 0;
            border-left: 0;
            padding-top: 10px;
        }

        .reading ul li {
            margin-bottom: 10px;
        }

        .reading br {
            line-height: 50px;
        }

        @media (max-width: 768px) {
            .reading {
                font-size: 18px;
            }

            .reading br {
                line-height: 40px;
            }
        }

        /*------------------------------------------*/
        blockquote {
            background: #fafafa;
            margin: 15px 15px 20px 0px;
            font-size: 18px;
            padding: 1em 1.5em 1em 1.5em;
            border-radius: 5px;
            border-left: 15px solid #1ebbf08a;
            box-shadow: 11px 10px 0px #eee;
            color: black;
        }

        .blockquote-user {
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .blockquote-user:before {
            content: "\f007";
            font-family: FontAwesome;
            font-size: 13px;
            margin-right: 5px;
        }

        .blockquote-user:after {
            content: " :";
        }

        @media (max-width: 768px) {
            blockquote {
                font-size: 16px;
            }

            .blockquote-user:before {
                font-size: 12px;
            }
        }

        code {
            padding: 0.2rem 0.4rem;
            font-size: 90%;
            color: #bd4147;
            background-color: #f8f9fa;
            border-radius: 0.25rem;
        }
    </style>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('thong-bao-chung', $thong_bao->id) }}">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    Thông Báo</a>
            </li>
            <li class="breadcrumb-item"><a href="">Thông Báo {{ $thong_bao->tieu_de }}</a></li>
        </ol>
    </div>
@endsection
