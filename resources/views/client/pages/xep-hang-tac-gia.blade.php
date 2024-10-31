@extends('client.layouts.app')
@section('content')
    <style>
        /* .list-ranking .item .content .thumb {
                            padding-right: 1rem;
                        }
                        #btv_de_cu .list-ranking .item:first-child .media .thumb {
                            justify-content: unset;
                            padding-top: 0px;
                        }
                        .book-cover {
                            -webkit-transform: perspective(70px) rotateY(-10deg);
                            -moz-transform: perspective(70px) rotateY(-10deg);
                            transform: perspective(70px) rotateY(-10deg);
                        }

                        .book-cover-link {
                            position: relative;
                            z-index: 10;
                            display: inline-block;
                            -webkit-transform: translateZ(50px);
                            -moz-transform: translateZ(50px);
                            transform: translateZ(50px);
                            -webkit-transition: all .2s ease-in-out;
                            -o-transition: all .2s ease-in-out;
                            -moz-transition: all .2s ease-in-out;
                            transition: all .2s ease-in-out;
                        }

                        .book-cover img {
                            width: 60px;
                            height: 90px;
                            outline: 1px solid transparent;
                        }

                        .book-cover span {
                            position: absolute;
                            display: none;
                            z-index: 1;
                            top: 84.1%;
                            left: 7px;
                            width: 20px;
                            height: 10px;
                            content: "";
                            -webkit-transform: perspective(74px) rotateX(-70deg) rotateY(-5deg);
                            -moz-transform: perspective(74px) rotateX(-70deg) rotateY(-5deg);
                            -ms-transform: scale(0);
                            transform: perspective(74px) rotateX(-70deg) rotateY(-5deg);
                            -webkit-box-shadow: 25px 0 5px 5px #adadad;
                            -moz-box-shadow: 25px 0 5px 5px #adadad;
                            box-shadow: 25px 0 5px 5px #adadad;
                        }

                        .book-cover:after {
                            position: absolute;
                            z-index: 2;
                            top: 2%;
                            left: 99%;
                            width: 10%;
                            height: 96%;
                            content: " ";
                            -webkit-transform: perspective(70px) rotateY(30deg);
                            -moz-transform: perspective(70px) rotateY(30deg);
                            transform: perspective(70px) rotateY(30deg);
                            background-color: #efefef;
                            -webkit-box-shadow: inset 0 0 5px #333;
                            -moz-box-shadow: inset 0 0 5px #333;
                            box-shadow: inset 0 0 5px #333;
                        } */
    </style>
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../../index4f9e.html?page_id=7676677">Bảng Xếp Hạng</a></li>

        </ol>
    </div>
    <div class="container tax">
        <div class="row row-heading">
            <div class="col-xs-7">
                <h1 class="crop-text"> Bảng xếp hạng </h1>
            </div>
        </div>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-tabs-css" data-id="ticket">
                <li role="presentation" data-time="view" class="active"><a href="#">Sách bán chạy nhất</a></li>
                <li role="presentation" data-time="review"><a href="#">Sách được đánh giá cao nhất</a></li>
                <li role="presentation" data-time="favorite"><a href="#">Top tác giả</a></li>
            </ul>
        </div>
        <div class="list-group view-row">

            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i>Sách bán chạy nhất</h3>
                    <div class="row">
                        @foreach ($sachKhongThuocTop5 as $index => $sach)
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="list-group mb-3">
                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="crop-text d-flex">
                                        <div class="thumb">
                                            <div style="margin-top: 10px;margin-left: 5px; align-self: center;"
                                                class="book-cover"><img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                    alt="Bìa sách"></div>
                                        </div>
                                        <div class="flex-grow-1" style="margin-left: 10px;">
                                            {{-- <img style="width: 50px; height: 80px; margin-top: 7px;margin-left: 5px; align-self: center;" src="{{ Storage::url($sach->anh_bia_sach) }}" alt="Bìa sách" /> --}}

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span
                                                    style="font-weight: bold; font-size: 1.5rem; margin-left: 5px;margin-top:10px;">{{ $sach->ten_sach }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Thể loại: {{ $sach->ten_the_loai }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Tác giả: {{ $sach->ten_doc_gia }}</span>

                                            </div>
                                            <div class="mt-2 d-flex justify-content-between" style="margin-left: 5px;">
                                                <span style="color: #007bff; margin-right: 5px;">Số lượng đã bán: </span>
                                                <span style="color: #000000;"> {{ $sach->so_luong_ban }}</span>
                                                <span class="text-danger" style="margin-left: 120px;">
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </span>
                                                {{--                                                <span class="pull-right z-top-date" style="margin-left: 170px;">{{ optional($sach->created_at)->format('d/m/Y') }}</span> --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if (($index + 1) % 2 == 0 && $index < 4)
                    </div>
                    <div class="row">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    @foreach ($top5 as $index => $sach)
                                        @if ($index < 3)
                                            <div class="ztop-item ztop-item-{{ $index + 1 }}">
                                                {{-- <a href="{{ route('chi-tiet-sach', $sach->id) }}">
                                                    <img class="ztop-img" src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                    <div class="ztop-label"><img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                    </div>
                                                    <div class="ztop-label-2"><img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                    </div>
                                                    <div class="ztop-label-3">{{ $index + 1 }}</div>
                                                </a> --}}

                                                <div class="vinhdanhtop" style="width:70%; margin-left:14px;">
                                                    <a class="img" href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        title="{{ $sach->ten_sach }}">
                                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                            alt="{{ $sach->ten_sach }}">
                                                        <span class="khung-vien-rank"></span>

                                                        {{-- Hình ảnh tùy theo thứ hạng --}}
                                                        @if ($index == 0)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd1.png') }}"
                                                                class="rank-icon" alt="TOP 1">
                                                        @elseif ($index == 1)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd2.png') }}"
                                                                class="rank-icon" alt="TOP 2">
                                                        @elseif ($index == 2)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd3.png') }}"
                                                                class="rank-icon" alt="TOP 3">
                                                        @endif
                                                        <div class="ztop-labeld"><img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                        </div>
                                                        {{-- <div class="ztop-label-2d"><img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                        </div>
                                                        <div class="ztop-label-3">{{ $index + 1 }}</div> --}}

                                                    </a>

                                                </div>



                                                <strong class="ztop-name">
                                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        class="crop-text-1">{{ $sach->ten_sach }}</a>
                                                </strong>
                                                <strong class="ztop-gold crop-text">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </strong>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>

                            @foreach ($top5 as $index => $sach)
                                @if ($index >= 3)
                                    <li class="list-group-item">
                                        <div class="crop-text">
                                            <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="ztop-flex">
                                                <div>
                                                    <span class="ztop-number">{{ $index + 1 }}</span>
                                                    <img class="ztop-img-2"
                                                        src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                    <strong><span style="color:#000000"
                                                            href="{{ route('chi-tiet-sach', $sach->id) }}">{{ Str::limit($sach->ten_sach, 15, '...') }}</span></strong>
                                                </div>
                                                <div class="pull-right ztop-gold-2">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group review-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i>Sách được đánh giá cao nhất</h3>
                    <div class="row">
                        @foreach ($sachKhongThuocTop5DG as $index => $sach)
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="list-group mb-3">
                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="crop-text d-flex">
                                        <img style="width: 50px; height: 80px; margin-top: 7px;margin-left: 5px; align-self: center;"
                                            src="{{ Storage::url($sach->anh_bia_sach) }}" alt="Bìa sách" />
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span
                                                    style="font-weight: bold; font-size: 1.5rem; margin-left: 5px;margin-top:10px;">{{ $sach->ten_sach }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Thể loại: {{ $sach->ten_the_loai }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Tác giả: {{ $sach->ten_doc_gia }}</span>
                                            </div>
                                            <div class="mt-2 d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Độ hài lòng:
                                                    @php
                                                        $tongSao = 0;
                                                        $soLuotDanhGia = \App\Models\DanhGia::where(
                                                            'sach_id',
                                                            $sach->id,
                                                        )
                                                            ->where('trang_thai', 'hien')
                                                            ->count();
                                                        $danhGias = \App\Models\DanhGia::where('sach_id', $sach->id)
                                                            ->where('trang_thai', 'hien')
                                                            ->get();

                                                        foreach ($danhGias as $danhGia) {
                                                            $tongSao += $mucDoHaiLongOrder[$danhGia->muc_do_hai_long];
                                                        }
                                                        $soSao =
                                                            $soLuotDanhGia > 0 ? round($tongSao / $soLuotDanhGia) : 0;
                                                        $saoTrungBinh =
                                                            $soLuotDanhGia > 0 ? $tongSao / $soLuotDanhGia : 0;
                                                    @endphp

                                                    @if ($soLuotDanhGia > 0)
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < floor($saoTrungBinh))
                                                                <span class="filled" style="color: #FFD700">★</span>
                                                            @elseif($i < $saoTrungBinh)
                                                                <span>☆</span>
                                                            @else
                                                                <span class="star">☆</span>
                                                            @endif
                                                        @endfor
                                                    @else
                                                        Chưa có đánh giá
                                                    @endif
                                                </span>
                                                <span class="pull-right text-danger" style="margin-left: 130px;">
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if (($index + 1) % 2 == 0 && $index < 4)
                    </div>
                    <div class="row">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>

                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    @if (!empty($top5DG) && $top5DG instanceof \Illuminate\Support\Collection)
                                        @foreach ($top5DG as $index => $sach)
                                            @if ($index < 3)
                                                <div class="ztop-item ztop-item-{{ $index + 1 }}">
                                                    <a href="{{ route('chi-tiet-sach', $sach->sach_id) }}">
                                                        <img class="ztop-img"
                                                            src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                        <div class="ztop-label">
                                                            <img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                        </div>
                                                        <div class="ztop-label-2">
                                                            <img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                        </div>
                                                        <div class="ztop-label-3">{{ $index + 1 }}</div>
                                                    </a>
                                                    <strong class="ztop-name">
                                                        <a href="{{ route('chi-tiet-sach', $sach->sach_id) }}"
                                                            class="crop-text-1">{{ $sach->ten_sach }}</a>
                                                    </strong>
                                                    <strong class="ztop-gold crop-text">
                                                        @php
                                                            $tongMucDoHaiLong = 0;
                                                            $soLuotDanhGia = 0;
                                                            $danhGias = \App\Models\DanhGia::where(
                                                                'sach_id',
                                                                $sach->sach_id,
                                                            )
                                                                ->where('trang_thai', 'hien')
                                                                ->get();
                                                            foreach ($danhGias as $danhGia) {
                                                                $tongMucDoHaiLong +=
                                                                    $mucDoHaiLongOrder[$danhGia->muc_do_hai_long];
                                                                $soLuotDanhGia++;
                                                            }
                                                            $trungBinh =
                                                                $soLuotDanhGia > 0
                                                                    ? $tongMucDoHaiLong / $soLuotDanhGia
                                                                    : 0;
                                                            $soSao = round($trungBinh);
                                                            $soSao = min($soSao, 5);
                                                        @endphp
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < $soSao)
                                                                <span style="color: #FFD700;">★</span>
                                                            @else
                                                                <span style="color: #C0C0C0;">★</span>
                                                            @endif
                                                        @endfor
                                                    </strong>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="col-12 text-center">Không có sách nào trong danh sách top 5.</div>
                                    @endif
                                </div>
                            </li>
                            @php
                                use Illuminate\Support\Str;
                            @endphp

                            @if (!empty($top5DG) && $top5DG instanceof \Illuminate\Support\Collection)
                                @foreach ($top5DG as $index => $sach)
                                    @if ($index >= 3)
                                        <li class="list-group-item">
                                            <div class="crop-text">
                                                <a href="{{ route('chi-tiet-sach', $sach->sach_id) }}" class="ztop-flex">
                                                    <div>
                                                        <span class="ztop-number">{{ $index + 1 }}</span>
                                                        <img class="ztop-img-2"
                                                            src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                        <strong>
                                                            <span style="color:#000000">
                                                                {{ Str::limit($sach->ten_sach, 15, '...') }}
                                                            </span>
                                                        </strong>
                                                    </div>
                                                    <div class="pull-right ztop-gold-2">
                                                        @php
                                                            $tongMucDoHaiLong = 0;
                                                            $soLuotDanhGia = 0;
                                                            $danhGias = \App\Models\DanhGia::where(
                                                                'sach_id',
                                                                $sach->sach_id,
                                                            )
                                                                ->where('trang_thai', 'hien')
                                                                ->get();
                                                            foreach ($danhGias as $danhGia) {
                                                                $tongMucDoHaiLong +=
                                                                    $mucDoHaiLongOrder[$danhGia->muc_do_hai_long];
                                                                $soLuotDanhGia++;
                                                            }
                                                            $trungBinh =
                                                                $soLuotDanhGia > 0
                                                                    ? $tongMucDoHaiLong / $soLuotDanhGia
                                                                    : 0;
                                                            $soSao = round($trungBinh);
                                                            $soSao = min($soSao, 5);
                                                        @endphp
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < $soSao)
                                                                <span style="color: #FFD700;">★</span>
                                                            @else
                                                                <span style="color: #C0C0C0;">★</span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-group favorite-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i>Sách bán chạy nhất</h3>
                    <div class="row">
                        @foreach ($sachKhongThuocTop5 as $index => $sach)
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="list-group mb-3">
                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="crop-text d-flex">
                                        <div class="thumb">
                                            <div style="margin-top: 10px;margin-left: 5px; align-self: center;"
                                                class="book-cover"><img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                    alt="Bìa sách"></div>
                                        </div>
                                        <div class="flex-grow-1" style="margin-left: 10px;">
                                            {{-- <img style="width: 50px; height: 80px; margin-top: 7px;margin-left: 5px; align-self: center;" src="{{ Storage::url($sach->anh_bia_sach) }}" alt="Bìa sách" /> --}}

                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span
                                                    style="font-weight: bold; font-size: 1.5rem; margin-left: 5px;margin-top:10px;">{{ $sach->ten_sach }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Thể loại: {{ $sach->ten_the_loai }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-left: 5px;">
                                                <span>Tác giả: {{ $sach->ten_doc_gia }}</span>

                                            </div>
                                            <div class="mt-2 d-flex justify-content-between" style="margin-left: 5px;">
                                                <span style="color: #007bff; margin-right: 5px;">Số lượng đã bán: </span>
                                                <span style="color: #000000;"> {{ $sach->so_luong_ban }}</span>
                                                <span class="text-danger" style="margin-left: 120px;">
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </span>
                                                {{--                                                <span class="pull-right z-top-date" style="margin-left: 170px;">{{ optional($sach->created_at)->format('d/m/Y') }}</span> --}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if (($index + 1) % 2 == 0 && $index < 4)
                    </div>
                    <div class="row">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    @foreach ($top5 as $index => $sach)
                                        @if ($index < 3)
                                            <div class="ztop-item ztop-item-{{ $index + 1 }}">
                                                {{-- <a href="{{ route('chi-tiet-sach', $sach->id) }}">
                                                    <img class="ztop-img" src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                    <div class="ztop-label"><img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                    </div>
                                                    <div class="ztop-label-2"><img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                    </div>
                                                    <div class="ztop-label-3">{{ $index + 1 }}</div>
                                                </a> --}}

                                                <div class="vinhdanhtop" style="width:70%; margin-left:14px;">
                                                    <a class="img" href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        title="{{ $sach->ten_sach }}">
                                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                            alt="{{ $sach->ten_sach }}">
                                                        <span class="khung-vien-rank"></span>

                                                        {{-- Hình ảnh tùy theo thứ hạng --}}
                                                        @if ($index == 0)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd1.png') }}"
                                                                class="rank-icon" alt="TOP 1">
                                                        @elseif ($index == 1)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd2.png') }}"
                                                                class="rank-icon" alt="TOP 2">
                                                        @elseif ($index == 2)
                                                            <img src="{{ asset('assets/client/themes/truyenfull/echo/img/zvd3.png') }}"
                                                                class="rank-icon" alt="TOP 3">
                                                        @endif
                                                        <div class="ztop-labeld"><img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                        </div>
                                                        {{-- <div class="ztop-label-2d"><img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                        </div>
                                                        <div class="ztop-label-3">{{ $index + 1 }}</div> --}}

                                                    </a>

                                                </div>



                                                <strong class="ztop-name">
                                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        class="crop-text-1">{{ $sach->ten_sach }}</a>
                                                </strong>
                                                <strong class="ztop-gold crop-text">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </strong>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>

                            @foreach ($top5 as $index => $sach)
                                @if ($index >= 3)
                                    <li class="list-group-item">
                                        <div class="crop-text">
                                            <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="ztop-flex">
                                                <div>
                                                    <span class="ztop-number">{{ $index + 1 }}</span>
                                                    <img class="ztop-img-2"
                                                        src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                    <strong><span style="color:#000000"
                                                            href="{{ route('chi-tiet-sach', $sach->id) }}">{{ Str::limit($sach->ten_sach, 15, '...') }}</span></strong>
                                                </div>
                                                <div class="pull-right ztop-gold-2">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style type="text/css">
            .vinhdanhtop {
                position: relative;
            }

            .img-wrapper {
                position: relative;
                display: inline-block;
            }



            .khung-vien-rank {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;

                box-sizing: border-box;
                pointer-events: none;
                /* Để khung không che mất các tương tác với ảnh */
            }

            .rank-icon {
                position: absolute;
                top: -3px;
                width: 50px;
                /* Điều chỉnh kích thước icon hạng nếu cần */
                height: auto;

            }

            .overBox {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 5px;
                text-align: center;
                font-size: 14px;
                box-sizing: border-box;
            }

            .ztop-img-list {
                width: 30px;
                border-radius: 50%;
                margin-right: 10px;
            }

            .z-top-date {
                color: gray;
                font-size: 12px;
                font-style: italic;
            }

            .z-top-flex {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            #heading_tax {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }

            .user_avatar_parent {
                position: relative;
                width: 120px;
                height: 120px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .user_avatar_2 img {
                width: 120px;
                height: 120px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                -webkit-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                -moz-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                border-radius: 50%;
            }

            h1.user_nickname {
                font-family: "Oswald";
                font-size: 20px;
                text-align: center;
                margin: 12px 0px 4px 0px;
            }

            .user_login {
                text-align: center;
                font-size: 15px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .alert.alert-info {
                border-color: #1ebbf0;
            }

            #user_count {
                text-align: center;
                margin: 20px 0px;
            }

            #user_count .number {
                font-size: 16px;
                font-weight: bold;
            }

            #post_author {
                background-color: rgba(0, 0, 0, .04);
                padding: 20px 10px;
            }

            ul.theloai-thumlist {
                margin-top: unset;
            }

            #post_author .description {
                margin: 0px 20px;
                text-align: center;
            }

            #post_author .max-width {
                max-width: 220px;
                text-align: center;
                margin: auto;
            }

            @media (max-width: 768px) {
                .h3 {
                    margin-top: 20px;
                }
            }

            .h3 {
                margin-bottom: 10px;
            }

            .btn-r {
                background-image: linear-gradient(135deg, #FF0000 30%, #FE9A2E 100%);
            }

            .ztop-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 4px solid #efca20;
            }

            .ztop-img-2 {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                margin: 0px 5px;
            }

            .ztop-name {
                text-align: center;
                margin-top: 30px;
                display: block;
                width: 100px;
            }

            .ztop-labeld {
                position: absolute;
                top: -22px;
                right: -15px;
                z-index: 1;
            }

            .ztop-label {
                position: absolute;
                top: -60px;
                right: -5px;
                z-index: 1;
            }
            .ztop-label-2d {
                position: absolute;
                top: 100px;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
            }
            .ztop-label-2 {
                position: absolute;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
            }

            .ztop-label-3 {
                position: absolute;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
                padding: 5px 12px;
                color: white;
                border-radius: 50%;
                bottom: -55px;
                background-image: linear-gradient(135deg, #f0ed1e 30%, #ec7d50 100%);
            }

            .ztop-label img {
                width: 40px;
                transform: rotate(22deg);
            }

            .ztop-labeld img {
                width: 40px;
                transform: rotate(22deg);
            }

            #top {
                display: flex;
                justify-content: center;
            }

            .ztop-gold {
                text-align: center;
                display: block;
                margin: 10px 0px;
                color: #ddb80f;
            }

            .ztop-gold-2 {
                color: #ddb80f;
                font-weight: bold;
            }

            .ztop-number {
                z-index: 5;
                text-align: center;
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #ebebeb;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(135deg, #c2c2bd 30%, #6c554b 100%);
                border: 1px #c2c2bd solid;
                font-size: 12px;
                margin-right: 7px;
            }

            .ztop-flex {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .ztop-item {
                margin: 15px 10px 0px 10px;
                text-align: center;
            }

            .ztop-item a {
                position: relative;
            }

            .ztop-item-1 {
                order: 2;
            }

            .ztop-item-2 {
                order: 1;
                margin-top: 30px;
            }

            .ztop-item-3 {
                order: 3;
                margin-top: 30px;
            }

            .ztop-item-2 .ztop-img {
                width: 90px;
                height: 90px;
                border: 4px solid #bcbbb9;
            }

            .ztop-item-3 .ztop-img {
                width: 90px;
                height: 90px;
                border: 4px solid #cc8a27;
            }

            .ztop-item-1 .ztop-label-2 img {
                width: 110px;
            }
            .ztop-item-1 .ztop-label-2d img {
                width: 110px;
            }

            .ztop-item-2 .ztop-label-2 img,
            .ztop-item-3 .ztop-label-2 img {
                width: 90px;
            }

            .ztop-item-2 .ztop-label-2d img,
            .ztop-item-3 .ztop-label-2d img {
                width: 90px;
            }

            .ztop-item-2 .ztop-label-3 {
                color: white;
                bottom: -50px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #bcbbb9 30%, #6a7173 100%);
            }

            .ztop-item-3 .ztop-label-3 {
                color: white;
                bottom: -50px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #cc8a27 30%, #8b5a32 100%);
            }

            @media only screen and (min-width: 768px) and (max-width: 1199px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }
                .ztop-label-3 {
                    bottom: -45px;
                }
                .ztop-label-3d {
                    bottom: -45px;
                }

                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }

                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }
            }

            @media only screen and (min-width: 375px) and (max-width: 413px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }
            }

            @media only screen and (max-width: 375px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-item {
                    margin: 0px 5px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }


                .ztop-label-3 {
                    bottom: -45px;
                }
                .ztop-label-3d {
                    bottom: -45px;
                }


                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }
            }

            #top .list-group {
                width: 100%;
            }

            #title-result {
                margin-bottom: 10px;
            }

            .list-group {
                margin-bottom: 0px;
            }
        </style>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {

                let selectedTab = localStorage.getItem('selectedTab') || 'view';

                $('.nav-tabs-css li').removeClass('active');
                $(`.nav-tabs-css li[data-time="${selectedTab}"]`).addClass('active');
                $('.view-row, .review-row, .favorite-row').hide();
                $(`.${selectedTab}-row`).show();

                $('.nav-tabs-css li').click(function() {
                    $('.nav-tabs-css li').removeClass('active');
                    $(this).addClass('active');

                    $('.view-row, .review-row, .favorite-row').hide();

                    selectedTab = $(this).data('time');

                    localStorage.setItem('selectedTab', selectedTab);

                    $(`.${selectedTab}-row`).show();
                });
            });
        </script>
    @endpush
