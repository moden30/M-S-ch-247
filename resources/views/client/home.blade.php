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
            border-radius: 12px 12px 0 0;
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

    @if(session('success'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
            });
        </script>
    @endif


    <!-- Slider -->
        <div class="slider-cont" id="sliderbanner">
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


    <!-- Main content -->
    <div class="container ztop-10">
        <div class="n-row" style="position: relative">
            <!-- preview -->
            <img class="text-center mt-3 preBtn" data-section="sachmienphi" id="preSachMienPhi"
                 src="{{asset('/assets/client/angle-small-left.png')}}"
                 alt="<">
            <h1 class=" ms-4 heading-lg" style="font-weight: bold;">Sách Miễn Phí</h1>
            <hr style="margin:0 3px 0 3px">
            <div class="book-container" data-section="sachmienphi">
                @foreach ($sach_moi_cap_nhats as $item)
                    <x-book :book="$item" />
                @endforeach
            </div>
            <!-- next -->
            <img class="nextBtn" id="nextSachMienPhi"
                 data-section="sachmienphi"
                 src="{{asset('/assets/client/angle-small-right.png')}}"
                 alt=">">
        </div>

        <div class="n-row" style="position: relative">
            <!-- preview -->
            <img class="text-center mt-3 preBtn"
                 id="preSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-left.png')}}"
                 alt="<"
                 data-section="sachmoicapnhat"
            >
            <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Mới Cập Nhật</h2>
            <hr style="margin:0 3px 0 3px">
            <div class="book-container-wrapper">
                <div class="book-container" data-section="sachmoicapnhat">
                    @foreach ($sach_moi_cap_nhats as $item)
                        <x-book :book="$item" />
                    @endforeach
                </div>
            </div>
            <!-- next -->
            <img class="nextBtn"
                 id="nextSachMoiCapNhat"
                 src="{{asset('/assets/client/angle-small-right.png')}}"
                 alt=">"
                 data-section="sachmoicapnhat"
            >
        </div>
    </div>

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
