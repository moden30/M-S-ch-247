@extends('client.layouts.app')
@section('content')
    <style>
        .bg-customer {
            background-image: url('{{ asset('assets/client/img/banner2.jpg') }}'); /* Đường dẫn tới hình ảnh */
            background-size: cover; /* Đảm bảo hình ảnh bao phủ toàn bộ màn hình */
            background-repeat: no-repeat; /* Ngăn không cho hình ảnh lặp lại */
            background-attachment: fixed; /* Cố định hình ảnh nền */
            background-position: center; /* Đặt vị trí hình ảnh ở giữa */
            height: 150px;
            width: 100%;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 18px;
        }
    </style>
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/client/home.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('js/client/home.js')}}"></script>
    @endpush
    <!-- Slider -->
    <div class="col-xs-12" style="margin-top: 2%;margin-bottom: 2%">
        <div class="slider-cont slider-cont-sliderbanner" id="sliderbanner">
            @if(!is_null($slider))
                @foreach ($slider->hinhAnhBanner as $item)
                    <div class="sliderbanner-item">
                        <a href="#" target="_blank">
                            <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image"/>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{asset('assets/client/slide/truyen/slide2.gif')}}" alt="Banner Image"/>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Main content -->
    <div class="container ztop-10">
        <div style="position: relative">
            <img class="text-center mt-3 preBtn" id="preSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-left.png')}}"
                 alt="">
            <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Miễn Phí</h2>
            <hr style="margin:0 3px 0 3px">
            <div class="book-container">
                @foreach ($sach_moi_cap_nhats as $item)
                    <div class="book">
                        <a href="{{ route('chi-tiet') }}">
                            <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                            <div class="price-tag">
                                {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}
                                VNĐ
                            </div>
                            <div class="book-info">
                                <h4 class="book-title">{{ $item->ten_sach }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <img class="nextBtn" id="nextSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-right.png')}}"
                 alt="">
        </div>

        <div style="position: relative">
            <img class="text-center mt-3 preBtn" id="preSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-left.png')}}"
                 alt="">
            <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Mới Cập Nhật</h2>
            <hr style="margin:0 3px 0 3px">
            <div class="book-container-wrapper">
                <div class="book-container newUpdated">
                    @foreach ($sach_moi_cap_nhats as $item)
                        <div class="book">
                            <a href="{{ route('chi-tiet') }}">
                                <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                                <div class="price-tag">
                                    {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}
                                    VNĐ
                                </div>
                                <div class="book-info d-flex justify-content-lg-start">
                                    <h4 class="book-title">{{ $item->ten_sach }} </h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <img class="nextBtn" id="nextSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-right.png')}}"
                 alt="">
        </div>
    </div>

    {{--    <div class="container ztop-10">--}}
    {{--        <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Đã Hoàn Thành</h2>--}}
    {{--        <hr style="margin:0 3px 0 3px">--}}
    {{--        <div class="book-container">--}}
    {{--            @foreach ($fulledBooks as $item)--}}
    {{--                <div class="book">--}}
    {{--                    <a href="{{ route('chi-tiet') }}">--}}
    {{--                        <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">--}}
    {{--                        <div class="price-tag">--}}
    {{--                            {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}--}}
    {{--                            ₫--}}
    {{--                        </div>--}}

    {{--                        <div class="book-info">--}}
    {{--                            <h4 class="book-title">{{ $item->ten_sach }}--}}
    {{--                                @if($item->tinh_trang_cap_nhat === 'da_full')--}}
    {{--                                    <span class=""--}}
    {{--                                          style="border: 1px solid #39dfaa; padding: 0px 5px 0px 5px; color: #39dfaa">Full</span>--}}
    {{--                                @else--}}
    {{--                                    <span class="text-warning"--}}
    {{--                                          style="border: 1px solid #ffc107; padding: 0px 5px 0px 5px">Đang ra</span>--}}
    {{--                                @endif--}}
    {{--                            </h4>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--        <button class="btn btn-primary" id="seeMoreBtn" style="margin-top: 15px;">Xem thêm</button>--}}
    {{--    </div>--}}

    <div class="container">
        <div class="panel panel-default comic-card">
            <div class="panel-body">
                <h2 class="ms-2 mt-2 ms-4 heading" style="font-weight: bold;font-size: 32px">Tác Giả Hot</h2>
                <div class="list-user-parent text-center d-flex justify-content-center">
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="bg-customer">
                    <h2 class="text-success me-5" style="font-size: 40px">TRỞ THÀNH CỘNG TÁC VIÊN TẠI MESACH247 NGAY
                        THÔI!
                    </h2>
                    <div>
                        <button type="submit" class="btn btn-lg btn-primary">Đăng Ký Cộng Tác Viên</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider-footer d-flex">
            @foreach ($sliderFooter->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" class="slider-banner-image"/>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
