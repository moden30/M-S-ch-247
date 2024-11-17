@extends('client.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/truyenf384.css?v100063') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/customer-chi-tiet-sach.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/only-popupf384.css?v100063') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('content')
    <style>
        .custom-heart {
            background-color: #fc9191;
            color: red;
            border: 1px solid red;
            "

        }

        .custom-heart:hover {
            color: red;
            background-color: #ffffff;

        }

        /*  */
        .comment-list {
            list-style-type: none;

            padding: 0;
        }

        .comment-item {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .comment-content {
            display: flex;
            flex-direction: column;
        }

        .comment-author {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .avatar {
            margin-right: 10px;
        }

        .avatar img {
            border-radius: 50%;
            width: 32px;
            height: 32px;
        }

        .username {
            font-weight: bold;
        }

        .comment-text {
            margin-bottom: 10px;
        }

        .comment-footer {
            display: flex;
            justify-content: space-between;
        }

        .btn-toggle-response {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
        }

        .btn-toggle-response:hover {
            text-decoration: underline;
        }

        .responses {
            padding-left: 20px;
            margin-top: 10px;
        }

        .response-item {
            background-color: #f0f8ff;
            border-radius: 5px;
            padding: 10px;
            margin-top: 5px;
        }

        .response-author {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .response-text {
            margin: 0;
            color: #333;
        }

        /*  */
        .btn-toggle-response {
            margin-left: auto;
        }

        .response {
            border: none !important;
        }

        .swal-popup-large {
            width: 550px;
            max-width: 90%;
            height: auto;
            font-size: 12px;
        }

        .swal-popup-large-2 {
            width: 400px;
            max-width: 90%;
            height: auto;
            font-size: 12px;
        }

        .purchased {
            transform: skewX(-10deg);
            height: 32px;
            width: 110px;
            border-radius: 20px 5px 20px 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(to right, rgb(177, 243, 156), rgb(101, 250, 53));
            color: #000;
            margin-left: 10px;
        }


        .rating {
            border-bottom: none !important;
        }

        .rating .star {
            cursor: pointer;
            color: lightgray;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .rating .star.active {
            color: gold;
        }

        .rating .star.inactive {
            color: lightgray;
        }

        .rating .star:hover {
            color: #FFD700;
            transform: scale(1.4);
        }

        .rating .star:hover~.star {
            color: lightgray;
        }
        .modal-footer{
            border: none !important;
        }
    </style>
    <div class="container" id="truyen_tabs">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('tim-kiem-sach') }}">Danh sách</a></li>
            <li class="breadcrumb-item"><a href="{{ route('chi-tiet-sach', $sach->id) }}">{{ $sach->ten_sach }}</a></li>
        </ol>
    </div>
    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="row">
                    <h1 class="crop-text-1">{{ $sach->ten_sach }}</h1>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="book3dcenter">
                            <div class="book3d"><img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                    alt="{{ $sach->ten_sach }}" /></div>
                            <div class="text-center" id="truyen_button"> <span id="button_reading"> <a
                                        href="{{ route('chi-tiet-chuong', [$sach->id, $chuongDauTien->id, $chuongDauTien->tieu_de]) }}"
                                        data-user-sach-id="{{ $sach->id }}" data-chuong-id="{{ $chuongDauTien->id }}"
                                        data-has-purchased="{{ $hasPurchased }}"
                                        class="btn btn-md color-whigit reflog
                                            Lệnh này sẽ liệt kê te btn-primary chuong-link"><i
                                            class="fa fa-play-circle" aria-hidden="true"></i> Đọc Sách</a> </span>
                                <span id="button_follow">
                                    <a onclick="event.preventDefault(); showFavoriteStatus();;" href="">
                                        <span
                                            class="btn btn-md @if (!$yeuThich) color-primary border-primary @endif @if ($yeuThich) custom-heart @endif">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <span class="hidden-xs hidden-sm hidden-md hidden-lg">Yêu thích</span>
                                        </span>
                                    </a>
                                </span>
                                <span id="clickapp" class="hidden">
                                    <span class="btn btn-md color-white btn-primary">
                                        <i class="fa fa-lg fa-mobile" aria-hidden="true"></i> Đọc trên app
                                    </span>
                                </span>
                                <form id="yeu-thich" action="{{ route('them-yeu-thich', $sach->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    <input type="hidden" value="{{ $sach->id }}" name="sach_id">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                        <div id="rate">
                            <div class="rating" data-block>
                                @for ($i = 5; $i >= 1; $i--)
                                    @php
                                        $starClass = '';
                                        if ($trungBinhHaiLong >= $i) {
                                            $starClass = 'active';
                                        } elseif ($trungBinhHaiLong >= $i - 0.5) {
                                            $starClass = 'half_active';
                                        }
                                    @endphp
                                    <div class="{{ $starClass }}" data-ratingvalue="{{ $i }}"
                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                    </div>
                                @endfor
                            </div>
                            <div class="rate-hover"></div>
                            <div class="rate-noti"></div>
                            <div class="rate-info">
                                <strong>
                                    @if ($trungBinhHaiLong)
                                        {{ $trungBinhHaiLong }}
                                    @else
                                        {{ 0 }}
                                    @endif
                                </strong>/5 trên tổng số
                                <strong>{{ $soLuongDanhGia }}</strong> lượt đánh giá
                            </div>
                        </div>

                        <div id="thong_tin">
                            <table class="color-gray">
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tác Giả:</td>
                                    <th class="table-column2 crop-text-1"><i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}"
                                            rel="tag">{{ $sach->user->but_danh ? $sach->user->but_danh : $sach->user->ten_doc_gia }}</a>
                                    </th>
                                    <th rowspan="2" class="table-column3">
                                        @if ($hasPurchased)
                                            @if (auth()->user()->id == $sach->user_id)
                                                <a href="{{ route('sach.edit', $sach->id) }}" target="_blank">
                                                    <span class="dlcc">
                                                        <span>
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Sửa
                                                        </span>
                                                    </span>
                                                </a>
                                            @else
                                                <span class="purchased">
                                                    <span>
                                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                        Đã Mua
                                                    </span>
                                                </span>
                                            @endif
                                        @else
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('payment-form').submit();">
                                                <span class="dlcc">
                                                    <span>
                                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                                        Mua Ngay
                                                    </span>
                                                </span>
                                            </a>
                                        @endif
                                    </th>

                                    <form id="payment-form" action="{{ route('thanh-toan', $sach->id) }}" method="get"
                                        style="display: none;">
                                        <input type="hidden" value="{{ $sach->gia_khuyen_mai }}" name="amount">
                                        @csrf
                                    </form>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tình Trạng:</td>
                                    <th class="table-column2 crop-text-1"><i
                                            class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'fa fa-check' : 'fa fa-spin fa-circle-o-notch' }}"
                                            aria-hidden="true"></i>
                                        <span
                                            class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'text-success' : 'text-warning' }}">{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'Hoàn Thành' : 'Đang Cập Nhật' }}</span>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Giá:</td>
                                    <th class="table-column2 crop-text-1">
                                        @if ($gia_khuyen_mai)
                                            <span style="color: black; text-decoration: line-through">{{ $gia_goc }}
                                                VNĐ</span>
                                        @endif
                                        <span class="text-danger ">{{ !empty($gia_goc) ? $gia_goc : $gia_khuyen_mai }}
                                            VNĐ</span>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Số chương:</td>
                                    <th class="table-column2 crop-text-1">
                                        <span class="">{{ $sach->chuongs->count() }} chương</span>
                                    </th>
                                    <th></th>
                                </tr>
                            </table>
                            <div class="crop-text-1 keywords"> <span class="keyword"><a
                                        href="{{ route('the-loai', $sach->theLoai->id) }}"
                                        rel="tag">{{ $sach->theLoai->ten_the_loai }}</a></span>
                            </div>
                            <div class="excerpt ztop-10">
                                <div class="excerpt-collapse crop-text-5"> {{ $sach->tom_tat }}
                                </div>
                            </div>
                        </div>
                        <div id="views" data-date="1720310405"
                            data-title="Sau Khi Ôm Bụng Bỏ Chạy, Đại Mỹ Nhân Cùng Nhãi Con Đi Xin Cơm" data-id="10838849"
                            data-slug="sau-khi-om-bung-bo-chay-dai-my-nhan-cung-nhai-con-di-xin-com">
                        </div>
                    </div>
                </div>
                <div id="ads-truyen-layout-1" class="text-center"></div>
                <div id="newchap">
                    <div class="explanation">
                        <ul class="listchap">
                            @foreach ($chuongMoi as $item)
                                <li>
                                    <div class="col-xs-7 col-md-9 crop-text-1"><span class="list"><i
                                                class="fa fa-caret-right" aria-hidden="true"></i></span>
                                        <a href="{{ route('chi-tiet-chuong', [$sach->id, $item->id, $item->tieu_de]) }}"
                                            title="Chương {{ $item->so_chuong }}: {{ $item->tieu_de }}"
                                            class="chuong-link" data-user-sach-id="{{ $sach->id }}"
                                            data-chuong-id="{{ $item->id }}"
                                            data-has-purchased="{{ $hasPurchased }}">
                                            Chương {{ $item->so_chuong }}: {{ $item->tieu_de }}
                                        </a>
                                    </div>
                                    <div class="col-xs-5 col-md-3">
                                        <span class="pull-right">
                                            @if ($hasPurchased)
                                                <img style="width: 20px; height: 20px"
                                                    src="{{ asset('assets\gif\lock\icons8-check-lock.gif') }}"
                                                    alt="">
                                            @else
                                                <img style="width: 20px; height: 20px"
                                                    src="{{ asset('assets\gif\lock\icons8-password.gif') }}"
                                                    alt="">
                                            @endif
                                            <span class="label-title label-new"></span>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div data-type="2">
                    <div id="dsc">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="heading"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách Chương</h3>
                            </div>
                            <div>
                                <div class="pull-right">
                                    <a href="#truyen_tabs">
                                        <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="listchap clearfix" id="chuongs">
                        </ul>
                        <div id="pagination" class="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div id="ads-truyen-layout-2" class="text-center"></div>
                <div class="list-user-parent text-center">
                    <div class="list-user">
                        <div class="item-user" title="{{ $sach->user->ten_doc_gia }}({{ $sach->user->but_danh }})">
                            <div class="u-avatar"><a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}"> <img
                                        src="{{ Storage::url($sach->user->hinh_anh) }}" /> </a>
                            </div>
                            <div class="u-user"><a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}">
                                    <p>
                                        <h4 class="custom-user-name">{{ $sach->user->ten_doc_gia }}</h4>
                                    </p>
                                </a> <span
                                    class="badge badge-success">{{ $sach->user->vai_tros->first()->ten_vai_tro }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="add-per font-12 add-request"><a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}">
                            <div class="btn-request"><img style="width: 18px; height: 18px"
                                    src="{{ asset('assets\gif\icons8-add-user-male.gif') }}"> Xem
                                trang cá
                                nhân
                            </div>
                        </a></div>
                </div>
                <div id="related">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h2 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Có Thể Bạn Thích</h2>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="pull-right"><a href="#truyen_tabs">
                                    <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="slider-container">
                        @foreach ($sachCungTheLoai as $item)
                            <a href="{{ route('chi-tiet-sach', $item->id) }}">
                                <div class=" d-flex align-items-center mb-4">
                                    <img style="width:50px; border-radius:10%"
                                        src="{{ Storage::url($item->anh_bia_sach) }}" alt="Ảnh"
                                        class="img-fluid rounded shadow" />
                                    <div class="content ms-3">
                                        <h5 class="text-primary">{{ $item->ten_sach }}</h5>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        {{--                              Đánh giá                           --}}
        <div class="row">
            <div class="hidden-md hidden-sm hidden-xs"></div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div id="comments">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="heading"><i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá
                                ({{ $soLuongDanhGia }})</h3>
                        </div>
                        <div>
                            <div class="pull-right"><a href="#truyen_tabs">
                                    <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                </a></div>
                        </div>
                    </div>
                    @if ($soLuongDanhGia == 0) 
                       @if ($duocPhanHoi)
                            <div class="text-center text-info font-14" style="margin-bottom: 15px"
                                id="no-review-message">
                                Sách của bạn hiện chưa có đánh giá nào ☹️
                            </div>
                        @else
                            <div class="text-center text-info font-14 so-luong" style="margin-bottom: 15px"
                                id="no-review-message">
                                Hiện chưa có đánh giá nào 😭
                                <br>
                                Hãy là đọc giả đầu tiên đánh giá quyển sách nhé!!!
                            </div>
                        @endif 
                    @endif
                    <ol id="danhGiaList" class="comment-list">
                        @foreach ($listDanhGia->take(3) as $danhGia)
                            <li class="comment-item" data-id="{{ $danhGia->id }}"
                                id="danhGiaClient{{ $danhGia->id }}">
                                <div class="comment-content">
                                    <div class="comment-author d-flex justify-content-between">
                                        <div class="avatar">
                                            @if ($danhGia->user->hinh_anh)
                                                <img alt="user" src="{{ Storage::url($danhGia->user->hinh_anh) }}"
                                                    class="avatar-32">
                                            @else
                                                <img alt="user"
                                                    src="{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                    class="avatar-32">
                                            @endif
                                            <span class="username">{{ $danhGia->user->ten_doc_gia }}</span>
                                        </div>


                                        @if ($duocPhanHoi)
                                            @if (!$danhGia->has_author_response)
                                                <span class="addcomment">
                                                    <span id="phanhoi"
                                                        class="btn btn-primary font-12 font-oswald reply-button"
                                                        data-id="{{ $danhGia->id }}">
                                                        <i class="fa fa-reply-all" aria-hidden="true"></i> Phản hồi
                                                    </span>
                                                </span>
                                            @endif
                                        @else
                                            <img src="https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474116zez/hinh-dong-tho-de-thuong_112055674.gif"
                                                alt="" class="mb-4" width="8%" height="8%">
                                        @endif


                                    </div>
                                    <div class="comment-text d-flex justify-content-between mt-7">
                                        <div class="rating">
                                            @php
                                                $ratings = [
                                                    'rat_hay' => 5,
                                                    'hay' => 4,
                                                    'trung_binh' => 3,
                                                    'te' => 2,
                                                    'rat_te' => 1,
                                                ];
                                                $currentRating = $ratings[$danhGia->muc_do_hai_long] ?? 0;
                                            @endphp
                                            @for ($i = 5; $i >= 1; $i--)
                                                <div class="{{ $i <= $currentRating ? 'active' : 'inactive' }}"
                                                    data-ratingvalue="{{ $i }}">
                                                </div>
                                            @endfor
                                        </div>
                                        <span
                                            class="comment-date">{{ \Carbon\Carbon::parse($danhGia->created_at)->format('d/m/Y') }}</span>

                                    </div>
                                    <div class="comment-footer">
                                        <p>{{ $danhGia->noi_dung }}</p>

                                    </div>
                                    @if ($danhGia->phanHoiDanhGia->count() > 0)
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="button" class="btn-toggle-response"
                                                onclick="toggleResponse(this)" data-id="{{ $danhGia->id }}">
                                                Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="responses mt-2 hidden" id="comment-{{ $danhGia->id }}">
                                        @foreach ($danhGia->phanHoiDanhGia as $phanHoi)
                                            <div class="response-item">
                                                <div class="response-author">
                                                    <div class="avatar">
                                                        @if ($phanHoi->user->hinh_anh)
                                                            <img alt="user"
                                                                src="{{ Storage::url($phanHoi->user->hinh_anh) }}"
                                                                class="avatar-32">
                                                        @else
                                                            <img alt="user"
                                                                src="{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                                class="avatar-32">
                                                        @endif
                                                    </div>
                                                    <span class="username">{{ $phanHoi->user->ten_doc_gia }}</span>
                                                </div>
                                                <div class="mt-5 d-flex justify-content-between">
                                                    <p class="response-text" style="flex: 1;">
                                                        {{ $phanHoi->noi_dung_phan_hoi }}</p>
                                                    <span
                                                        class="response-date ml-auto">{{ \Carbon\Carbon::parse($phanHoi->created_at)->format('d/m/Y') }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                    {{-- @endif --}}

                    <div class="flex-comment">
                        @if ($userReview)
                            <span class="addcomment" style="display: none;">
                                <span class="btn btn-primary font-12 font-oswald">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Đánh giá lại
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                            </span>
                        @else
                            @if (!$duocPhanHoi)
                                <span class="addcomment">
                                    <span id="btnRateBook" class="btn btn-primary font-12 font-oswald">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Đánh giá sách
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                </span>
                            @endif
                        @endif
                        @if ($soLuongDanhGia != 0)
                            <div id="loadMoreWrapper">
                                <button id="loadMoreBtn" class="btn-primary-border font-12 font-oswald"
                                    data-page="1">Xem
                                    thêm đánh giá→
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal fade respond" id="myModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="closeDanhGia" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                @if (!$duocPhanHoi)
                                    <h3 class="modal-title" id="myModalLabel">Đánh giá</h3>
                                @else
                                    <h3 class="modal-title" id="myModalLabel">Phản hồi đánh giá</h3>
                                @endif
                            </div>
                            <div class="modal-body clearfix">
                                @if ($duocPhanHoi)
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('phan-hoi-danh-gia') }}" id="phanHoiDanhGiaForm">
                                        @csrf
                                        <input type="hidden" name="danh_gia_id" id="danh_gia_id">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="created_at" value="{{ now() }}">
                                        <input type="hidden" name="updated_at" value="{{ now() }}">

                                        <div class="form-group">
                                            <textarea class="form-control" name="noi_dung_phan_hoi" id="noi_dung_phan_hoi"></textarea>
                                        </div>

                                        <!-- Nút gửi đánh giá -->
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group-ajax modal-footer">
                                                <button type="button" class="btn btn-primary" id="submitPhanHoi">
                                                    <i class="fa fa-upload icon-small" aria-hidden="true"></i> Phản hồi
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                @endif

                                @if ($userReview)
                                    <form id="updateRatingForm" method="post" enctype="multipart/form-data"
                                        action="{{ route('cap-nhat-danh-gia', $userReview->id) }}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="ngay_danh_gia" value="{{ now() }}">

                                        <!-- Giá trị sao -->
                                        <input type="hidden" id="rating_value" name="rating_value"
                                            value="{{ $soSao }}">
                                        <!-- Nhập đánh giá sao -->
                                        <div class="mb-3 mr-3">
                                            <span>Đánh giá: </span>
                                            <div class="rating ms-2">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <div class="star {{ $soSao >= $i ? 'active' : 'inactive' }}"
                                                        data-ratingvalue="{{ $i }}"
                                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="noi_dung" id="noi_dung">{{ $userReview->noi_dung }}</textarea>
                                        </div>

                                        <!-- Nút gửi đánh giá -->
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group-ajax modal-footer">
                                                <button type="submit" class="btn btn-primary" id="submitComment">
                                                    <i class="fa fa-upload icon-small" aria-hidden="true"></i> Gửi đánh
                                                    giá
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    @if ($hasPurchased)
                                        @if ($duocDanhGia)
                                            <form id="newRatingForm" method="post" enctype="multipart/form-data"
                                                action="{{ route('danh-sach.danh-gia') }}">
                                                @csrf
                                                <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <input type="hidden" name="ngay_danh_gia" value="{{ now() }}">

                                                <!-- Giá trị sao -->
                                                <input type="hidden" id="rating_value" name="rating_value"
                                                    value="5">

                                                <!-- Nhập đánh giá sao -->
                                                <div class="mb-3 mr-3">
                                                    <span>Đánh giá: </span>
                                                    <div class="rating ms-2">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <div class="star {{ $soSao >= $i ? 'active' : 'inactive' }}"
                                                                data-ratingvalue="{{ $i }}"
                                                                data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="noi_dung" id="noi_dung" placeholder="Nhập đánh giá của bạn ở đây... *"></textarea>
                                                </div>

                                                <!-- Nút gửi đánh giá -->
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group-ajax modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            id="submitComment">
                                                            <i class="fa fa-upload icon-small" aria-hidden="true"></i>
                                                            Gửi đánh giá
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Thoát
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            @if (!$duocPhanHoi)
                                                <div class="alert alert-warning text-center" role="alert">
                                                    Bạn phải đọc tối thiểu {{ $yeuCauDocSach }}/{{ $tongSoChuong }}
                                                    chương
                                                    để
                                                    được đánh giá!!!
                                                @else
                                            @endif
                            </div>
                            @endif
                        @else
                            @if (!$duocPhanHoi)
                                <div class="alert alert-warning text-center" role="alert">
                                    Hãy mua sách và đọc để được đánh giá nhé!!!
                                </div>
                            @else
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="show_pre_comment_ajax"></div>
            <div id="zdata" data-postname="abo-bia-do-dan-alpha-doan-menh-mot-long-lam-ca-man"
                data-posttype="truyen"></div>
        </div>
        <div class="col-md-3 hidden-sm hidden-xs"></div>
    </div>

    {{--                           End Đánh giá                           --}}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/client/emb.js') }}"></script>
    <script>
        $(document).ready(function() {
            let currentPage = 1;
            const sachId = {{ $sach->id ?? 'null' }};

            function fetchChuongs(page = 1) {
                // Hiển thị trạng thái loading
                $('#chuongs').empty().append('<li>Đang tải...</li>');
                $.ajax({
                    url: `/data-chuong/${sachId}`,
                    type: 'GET',
                    data: {
                        page: page
                    },
                    success: function(response) {

                        $('#chuongs').empty();
                        if (response.data.length === 0) {
                            $('#chuongs').append('<li>Không có dữ liệu.</li>');
                            updatePagination(1, 1);
                            return;
                        }
                        const hasPurchased = response.hasPurchased;
                        const iconSrc = hasPurchased ? '/assets/gif/lock/icons8-check-lock.gif' :
                            '/assets/gif/lock/icons8-password.gif';
                        const iconAlt = hasPurchased ? 'Purchased' : 'Locked';
                        // Hiển thị các chương
                        response.data.forEach(function(data) {
                            let content = `
                            <li class="col-xs-12 col-sm-6 col-md-6">
                                <div class="row">
                                    <div class="col-xs-10 crop-text">
                                        <span class="list">
                                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                                        </span>

                                        <a href="/chi-tiet-chuong/${data.sach.id}/${data.id}/${data.tieu_de}"
                                           title="Chương ${data.so_chuong}: ${data.tieu_de}"
                                           class="chuong-link"
                                           data-user-sach-id="${data.sach.id}"
                                           data-chuong-id="${data.id}"
                                           data-has-purchased="${hasPurchased}">
                                           Chương ${data.so_chuong}: ${data.tieu_de}
                                        </a>
                                    </div>
                                    <div class="col-xs-2 pull-right">
                                       <img style="width: 20px; height: 20px" src="${iconSrc}" alt="${iconAlt}">
                                    </div>
                                </div>
                            </li>
                        `;
                            $('#chuongs').append(content);
                        });

                        // Cập nhật phân trang
                        updatePagination(response.current_page, response.last_page);
                    },
                    error: function(error) {
                        console.error('Lỗi', error);
                    }
                });
            }

            function updatePagination(currentPage, lastPage) {
                $('#pagination').empty();
                let paginationContent = `
                <div>
                    <span>Trang ${currentPage} / ${lastPage}</span>
                    <div class="text-center">
                        <button id="prev" class="btn btn-primary" ${currentPage === 1 ? 'disabled' : ''}>«</button>
            `;

                // Tạo các nút cho từng trang
                for (let i = 1; i <= lastPage; i++) {
                    paginationContent +=
                        `<button class="btn page-link me-2 ${currentPage === i ? 'btn-primary' : 'btn-secondary'}" data-page="${i}">${i}</button>`;
                }

                paginationContent += `
                    <button id="next" class="btn btn-primary" ${currentPage === lastPage ? 'disabled' : ''}>»</button>
                </div>
            </div>
            `;
                $('#pagination').append(paginationContent);
                // Cập nhật sự kiện cho các nút phân trang
                $('#prev').off('click').on('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        fetchChuongs(currentPage);
                    }
                });
                $('#next').off('click').on('click', function() {
                    if (currentPage < lastPage) {
                        currentPage++;
                        fetchChuongs(currentPage);
                    }
                });
                // Sự kiện cho các nút số trang
                $('.page-link').off('click').on('click', function() {
                    const page = $(this).data('page');
                    currentPage = page;
                    fetchChuongs(currentPage);
                });
            }

            fetchChuongs();
        });

        $(document).on('click', '.chuong-link', function(e) {
            e.preventDefault();

            const hasPurchased = $(this).data('has-purchased');
            if (!hasPurchased) {
                Swal.fire({
                    title: "Tình yêu chưa mua cuốn sách này rồi😞",
                    html: `<img src="{{ asset('assets/gif/khoxu.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;"> <p>Mua cuốn sách này để đọc các chương.</p>`,
                    showCancelButton: true,
                    confirmButtonText: "Mua ngay",
                    cancelButtonText: "Hủy",
                    reverseButtons: true,
                    customClass: {
                        popup: 'swal-popup-large'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('payment-form').submit();
                    }
                });
                return;
            }

            var userSachId = $(this).data('user-sach-id');
            var chuongId = $(this).data('chuong-id');
            var href = $(this).attr('href');

            $.ajax({
                url: '/lich-su-doc/' + userSachId + '/' + chuongId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    window.location.href = href;
                },
                error: function(xhr, status, error) {
                    window.location.href = href;
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            function renderStars(rating) {
                let stars = '';
                for (let i = 5; i >= 1; i--) {
                    stars += `<div class="star ${i <= rating ? 'active' : 'inactive'}"
                data-ratingvalue="${i}"
                data-ratingtext="${i === 5 ? 'Rất hay!' : (i === 4 ? 'Hay' : (i === 3 ? 'Trung bình' : (i === 2 ? 'Tệ' : 'Rất tệ')))}">
                </div>`;
                }
                return stars;
            }

            let hasRated = false; // Biến kiểm tra xem đã đánh giá chưa
            updateStars(5);

            // Hàm cập nhật sao khi có giá trị rating mới
            function updateStars(rating) {
                $('.rating .star').each(function() {
                    const starValue = $(this).data('ratingvalue');
                    $(this).removeClass('active inactive').addClass(starValue <= rating ? 'active' :
                        'inactive');
                });
            }

            // Khi nhấn vào một sao, cập nhật giá trị rating nếu chưa đánh giá
            $(document).on('click', '.star', function() {
                if (!hasRated) { // Kiểm tra nếu chưa đánh giá
                    const ratingValue = $(this).data('ratingvalue');
                    $('#rating_value').val(ratingValue);
                    updateStars(ratingValue); // Hiển thị sao ngay lập tức
                }
            });


            // Hàm thêm đánh giá mới vào danh sách
            function addReviewToList(danhGia, ratingValue, currentUserId) {

                const currentRating = {
                    'rat_hay': 5,
                    'hay': 4,
                    'trung_binh': 3,
                    'te': 2,
                    'rat_te': 1,
                };
                const ratingLevel = currentRating[danhGia.muc_do_hai_long] || 0;

                // Kiểm tra nếu có phản hồi (giả sử danhGia.responses là danh sách các phản hồi)
                const hasResponses = danhGia.responses && danhGia.responses.length > 0;

                const newReview = `
                    <li class="comment-item" data-id="${danhGia.id}">
                        <div class="comment-content">
                            <div class="comment-author d-flex justify-content-between">
                                <div class="avatar">
                                    <img alt="user" src="${danhGia.user.hinh_anh_url || '{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}'}" class="avatar-32">
                                    <span class="username">${danhGia.user.ten_doc_gia}</span>
                                </div>

                                    ${danhGia.user.id === currentUserId ? `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="addcomment">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span id="phanhoi" class="btn btn-primary font-12 font-oswald reply-button" data-id="${danhGia.id}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <i class="fa fa-reply-all" aria-hidden="true"></i> Phản hồi
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </span> </span>` : `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <img src="https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474116zez/hinh-dong-tho-de-thuong_112055674.gif" alt="" width="8%" height="8%">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `}

                            </div>
                            <div class="comment-text d-flex justify-content-between mt-7">
                                <div class="rating">
                                    ${renderStars(ratingLevel)}
                                </div>
                                <span class="comment-date">${new Date(danhGia.created_at).toLocaleDateString('vi-VN')}</span>
                            </div>
                            <div class="comment-footer">
                                <p>${danhGia.noi_dung}</p>
                            </div>
                            ${hasResponses ? `
                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="d-flex justify-content-end mt-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button type="button" class="btn-toggle-response" onclick="toggleResponse(this)" data-id="${danhGia.id}">
                                                                                                                                                                                                                                                                                                                                                                                                                                                        Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>` : ''}
                            <div class="responses mt-2 hidden" id="comment-${danhGia.id}">
                                <!-- Phản hồi sẽ được thêm vào đây nếu có -->
                            </div>
                        </div>
                    </li>`;
                $('#no-review-message').hide();

                $('#danhGiaList').prepend(newReview);

            }

            // Xử lý gửi đánh giá mới và hiển thị sao ngay sau khi thêm
            $('#newRatingForm').on('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        const ratingValue = response.data.rating_value;
                        addReviewToList(response.data.danhGia, ratingValue);

                        // Cập nhật số lượng đánh giá
                        const currentCount = parseInt($('.heading').text().match(/\d+/)[0]) ||
                            0;
                        $('.heading').html(
                            `<i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá (${currentCount + 1})`
                        );
                        $('#no-review-message').hide();
                        // Ẩn modal và xóa backdrop
                        document.getElementById('myModal').style.display = 'none';
                        document.body.classList.remove(
                            'modal-open'); // Loại bỏ lớp 'modal-open'

                        // Xóa backdrop nếu tồn tại
                        var backdrop = document.querySelector('.modal-backdrop');
                        if (backdrop) {
                            backdrop.parentNode.removeChild(backdrop);
                        }

                        $('#btnRateBook').hide();

                        hasRated = true; // Đánh dấu trạng thái đã đánh giá
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            });

        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#loadMoreBtn').on('click', function() {
                let page = $(this).data('page') || 1;
                let sachId = {{ $sach->id }};

                $.ajax({
                    url: '{{ route('getDanhGia') }}',
                    type: 'GET',
                    data: {
                        page: page,
                        sach_id: sachId
                    },

                    success: function(response) {
                        let danhGiaList = response.data || [];
                        let html = '';
                        const existingIds = new Set($('#danhGiaList .comment-item').map(
                            function() {
                                return $(this).data('id');
                            }).get());

                        // Lặp qua danh sách đánh giá và tạo HTML cho từng đánh giá
                        $.each(danhGiaList, function(index, danhGia) {
                            if (!existingIds.has(danhGia.id)) {
                                let currentRating = 0;
                                switch (danhGia.muc_do_hai_long) {
                                    case 'rat_hay':
                                        currentRating = 5;
                                        break;
                                    case 'hay':
                                        currentRating = 4;
                                        break;
                                    case 'trung_binh':
                                        currentRating = 3;
                                        break;
                                    case 'te':
                                        currentRating = 2;
                                        break;
                                    case 'rat_te':
                                        currentRating = 1;
                                        break;
                                    default:
                                        currentRating = 0;
                                }

                                html += `<li class="comment-item" data-id="${danhGia.id}">
                            <div class="comment-content">
                                <div class="comment-author d-flex justify-content-between">
                                    <div class="avatar">
                                        ${danhGia.user.hinh_anh_url ? `<img alt="user" src="${danhGia.user.hinh_anh_url}" class="avatar-32">` : `<img alt="user" src="{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}" class="avatar-32">`}
                                        <span class="username">${danhGia.user.ten_doc_gia}</span>
                                    </div>
                                 ${danhGia.is_author ? (
                                     danhGia.has_author_response ? '' : 
                                    `<span class="addcomment">
                                                                            <span id="phanhoi" class="btn btn-primary font-12 font-oswald reply-button" data-id="${danhGia.id}">
                                                                                <i class="fa fa-reply-all" aria-hidden="true"></i> Phản hồi
                                                                            </span>
                                                                    </span>`
                                    ) : (
                                        `<img src="https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474116zez/hinh-dong-tho-de-thuong_112055674.gif"
                                                                                alt="" class="mb-4" width="8%" height="8%">`
                                    )}
                                </div>
                                <div class="comment-text d-flex justify-content-between mt-7">
                                    <div class="rating">`;

                                for (let i = 5; i >= 1; i--) {
                                    html +=
                                        `<div class="${i <= currentRating ? 'active' : 'inactive'}" data-ratingvalue="${i}"></div>`;
                                }

                                html += `</div>
                            <span class="comment-date">${new Date(danhGia.created_at).toLocaleDateString('vi-VN')}</span>
                        </div>
                        <div class="comment-footer">
                            <p>${danhGia.noi_dung}</p>
                        </div>`;

                                $(document).on('click', '.reply-button', function() {
                                    const danhGiaId = $(this).data('id');
                                    $('#danh_gia_id').val(danhGiaId);
                                    $('#myModal').modal('show');
                                });

                                if (danhGia.phan_hoi_danh_gia && Array.isArray(danhGia
                                        .phan_hoi_danh_gia) && danhGia.phan_hoi_danh_gia
                                    .length > 0) {
                                    html += `<div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn-toggle-response" onclick="toggleResponse(this)" data-id="${danhGia.id}">
                                    Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="responses mt-2 hidden" id="comment-${danhGia.id}">
                                ${danhGia.phan_hoi_danh_gia.map(phanHoi =>
                                    `<div class="response-item">
                                                                                                                                                                    <div class="response-author">
                                                                                                                                                                        <div class="avatar">
                                                                                                                                                                            <img alt="user" src="${phanHoi.user.hinh_anh_url || '{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}'}" class="avatar-32">
                                                                                                                                                                        </div>
                                                                                                                                                                        <span class="username">${phanHoi.user.ten_doc_gia}</span>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="mt-5 d-flex justify-content-between">
                                                                                                                                                                        <p class="response-text" style="flex: 1;">${phanHoi.noi_dung_phan_hoi}</p>
                                                                                                                                                                        <span class="response-date ml-auto">${new Date(phanHoi.created_at).toLocaleDateString('vi-VN')}</span>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>`).join('')}
                            </div>`;
                                }

                                html += `</div></li>`;
                            }
                        });

                        // Thêm đánh giá mới vào danh sách
                        $('#danhGiaList').append(html);

                        // Cập nhật lại số trang hiện tại cho nút "Xem thêm"
                        $('#loadMoreBtn').data('page', page + 1);

                        // Kiểm tra xem còn dữ liệu để tải hay không, nếu hết thì ẩn nút "Xem thêm"
                        if (!response.next_page_url) {
                            $('#loadMoreWrapper').hide(); // Ẩn nút "Xem thêm" nếu hết dữ liệu
                        }
                    },
                    error: function(xhr) {
                        console.error("Lỗi từ server:", xhr.responseText);
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            });

            function toggleResponse(button) {
                // Tìm đến phần tử cha 'comment-item' gần nhất
                const commentItem = $(button).closest('.comment-item');

                // Tìm hoặc tạo phần tử '.responses'
                let responseDiv = commentItem.find('.responses');

                // Nếu chưa có phần tử '.responses', dừng hàm và hiển thị cảnh báo
                if (responseDiv.length === 0) {
                    console.warn("Không tìm thấy phần tử '.responses' để ẩn/hiện.");
                    return;
                }

                // Ẩn hoặc hiện phần tử '.responses'
                responseDiv.toggleClass('hidden');
            }
            // Đảm bảo form phản hồi chỉ được gửi một lần
            $('#submitReplyButton').on('click', function(e) {
                e.preventDefault();
                $(this).prop('disabled', true); // Vô hiệu hóa nút sau khi nhấn

                let data = {
                    danh_gia_id: $('#danh_gia_id').val(),
                    noi_dung_phan_hoi: $('#replyContent').val(),
                };

                $.ajax({
                    url: '{{ route('phan-hoi-danh-gia') }}', // Route xử lý gửi phản hồi
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        alert('Phản hồi đã được gửi thành công!');
                        $('#submitReplyButton').prop('disabled',
                            false); // Kích hoạt lại nút sau khi gửi thành công

                        // Tạo HTML cho phản hồi mới
                        let newReplyHTML = `
                <div class="response-item">
                    <div class="response-author">
                        <div class="avatar">
                            <img alt="user" src="${response.user.hinh_anh_url || '{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}'}" class="avatar-32">
                        </div>
                        <span class="username">${response.user.ten_doc_gia}</span>
                    </div>
                    <div class="mt-5 d-flex justify-content-between">
                        <p class="response-text" style="flex: 1;">${response.noi_dung_phan_hoi}</p>
                        <span class="response-date ml-auto">${new Date(response.created_at).toLocaleDateString('vi-VN')}</span>
                    </div>
                </div>`;

                        // Kiểm tra nếu phần tử .responses đã tồn tại
                        let responseContainer = $(`#comment-${data.danh_gia_id}`);

                        if (responseContainer.length) {
                            // Nếu đã có .responses, thêm phản hồi mới vào
                            responseContainer.append(newReplyHTML).removeClass('hidden');
                        } else {
                            // Nếu chưa có .responses, tạo mới phần tử và thêm vào giao diện
                            $(`#danhGiaClient${data.danh_gia_id}`).append(`
                    <div class="responses mt-2" id="comment-${data.danh_gia_id}">
                        ${newReplyHTML}
                    </div>
                `);
                        }

                        // Xóa nội dung nhập vào
                        $('#replyContent').val('');
                        $('#myModal').modal('hide');
                    },
                    error: function(xhr) {
                        console.error("Lỗi gửi phản hồi:", xhr.responseText);
                        alert('Có lỗi xảy ra khi gửi phản hồi, vui lòng thử lại.');
                        button.prop('disabled',
                            false); // Kích hoạt lại nút gửi trong trường hợp lỗi
                        isSubmitting = false; // Đánh dấu là không còn gửi nữa
                    }
                });
            });
        });
    </script>

    <script>
        // Thêm vào yêu thích
        function showFavoriteStatus() {
            const formData = new FormData(document.getElementById('yeu-thich'));
            fetch(document.getElementById('yeu-thich').action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    Swal.fire({
                        title: data.status === 'success' ? 'Cảm ơn tình yêu đã yêu thích cuốn sách❤️' :
                            'Tình yêu đã thích cuốn sách này rồi❤️',
                        html: data.status === 'success' ?
                            `<img src="{{ asset('assets/gif/timtim.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;"><p>${data.message}</p>` :
                            `<img src="{{ asset('assets/gif/timtim2.gif') }}" alt="Custom Icon" style="width: 100px; height: 100px;"><p>${data.message}</p>`,
                        confirmButtonText: "Xem Danh Sách Yêu Thích",
                        customClass: {
                            popup: 'swal-popup-large-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('client.yeu-thich.index') }}";
                        }
                    });
                })
                .catch(error => {
                    // console.error('Error:', error);
                    Swal.close();
                    Swal.fire({
                        title: "Bạn chưa đăng nhập!",
                        text: "Yêu cầu đăng nhập để thêm yêu thích",
                        confirmButtonText: "Đăng nhập ngay",
                        customClass: {
                            popup: 'swal-popup-large-2'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('cli.auth.showLoginForm') }}";
                        }
                    });
                });
        }
    </script>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Xử lý sự kiện nhấn nút phản hồi
            document.querySelectorAll('.reply-button').forEach(button => {
                const danhGiaId = button.getAttribute('data-id');
                if (localStorage.getItem(`reply_hidden_${danhGiaId}`) === 'true') {
                    button.style.display = 'none'; // Ẩn nút nếu đã được ẩn trước đó
                }

                button.addEventListener('click', function() {
                    document.getElementById('danh_gia_id').value = danhGiaId;
                    $('#myModal').modal('show');
                });
            });

            // Xử lý sự kiện submit phản hồi
            const submitButton = document.getElementById('submitPhanHoi');
            if (submitButton) {
                submitButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    let form = document.getElementById('phanHoiDanhGiaForm');
                    let formData = new FormData(form);

                    // Kiểm tra nếu form đã được gửi
                    if (form.dataset.submitted === "true") {
                        console.warn("Form is already submitted.");
                        return;
                    }
                    form.dataset.submitted = "true";

                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Cập nhật nút xem/ẩn phản hồi
                            let toggleButton = document.querySelector(
                                `button[data-id="${data.danh_gia_id}"]`);
                            if (!toggleButton) {
                                // Nếu nút chưa có, thì tạo mới và thêm vào giao diện
                                const toggleButtonContainer = document.createElement('div');
                                toggleButtonContainer.classList.add('d-flex', 'justify-content-end',
                                    'mt-4');
                                toggleButtonContainer.innerHTML = `
                                <button type="button" class="btn-toggle-response"
                                        onclick="toggleResponse(this)"
                                        data-id="${data.danh_gia_id}">
                                    Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            `;
                                // Thêm vào dưới danh sách phản hồi
                                let commentSection = document.querySelector(
                                    `#comment-${data.danh_gia_id}`);
                                commentSection.parentElement.insertBefore(toggleButtonContainer,
                                    commentSection);
                            } else {
                                // Nếu đã có nút thì cập nhật lại nội dung
                                toggleButton.classList.remove('hidden');
                                toggleButton.textContent = 'Ẩn phản hồi';
                                toggleButton.innerHTML +=
                                    ' <i class="fa fa-eye-slash" aria-hidden="true"></i>';
                            }
                            form.dataset.submitted = "false"; // Reset lại trạng thái

                            if (data.success) {
                                // Thêm phản hồi mới vào đầu danh sách
                                let commentSection = document.querySelector(
                                    `#comment-${data.danh_gia_id}`);
                                if (commentSection) {
                                    commentSection.classList.remove(
                                        'hidden'); // Hiện phản hồi nếu đang bị ẩn
                                    let newComment = document.createElement('div');
                                    newComment.classList.add(
                                        'response-item'); // Main class for each response
                                    newComment.innerHTML = `
                                            <div class="response-author d-flex align-items-center">
                                                <div class="avatar">
                                                    <img alt="user" src="${data.hinh_anh_url}" class="avatar-32">
                                                </div>
                                                <span class="username">${data.ten_doc_gia}</span>
                                            </div>
                                            <div class="mt-5 d-flex justify-content-between">
                                                <p class="response-text" style="flex: 1;">${data.noi_dung_phan_hoi}</p>
                                                <span class="response-date ml-auto">${data.created_at}</span>
                                            </div>`;
                                    commentSection.prepend(newComment);

                                    // Cập nhật nút xem/ẩn phản hồi
                                    let toggleButton = document.querySelector(
                                        `button[data-id="${data.danh_gia_id}"]`);
                                    if (toggleButton) {
                                        toggleButton.textContent = 'Ẩn phản hồi';
                                        toggleButton.innerHTML +=
                                            ' <i class="fa fa-eye-slash" aria-hidden="true"></i>';
                                    }
                                }

                                // Ẩn nút phản hồi và lưu trạng thái vào localStorage
                                const replyButton = document.querySelector(
                                    `.reply-button[data-id="${data.danh_gia_id}"]`);
                                if (replyButton) {
                                    replyButton.style.display = 'none';
                                    localStorage.setItem(`reply_hidden_${data.danh_gia_id}`, 'true');
                                }

                                // Ẩn modal và xóa backdrop
                                document.getElementById('myModal').style.display = 'none';
                                document.body.classList.remove(
                                    'modal-open'); // Loại bỏ lớp 'modal-open'

                                // Xóa backdrop nếu tồn tại
                                var backdrop = document.querySelector('.modal-backdrop');
                                if (backdrop) {
                                    backdrop.parentNode.removeChild(backdrop);
                                }
                            } else {
                                console.log(data.message); // Hiển thị thông báo lỗi nếu có
                            }
                        })
                        .catch(error => {
                            form.dataset.submitted = "false"; // Reset lại trạng thái
                            console.error('Error:', error);
                        });
                });
            }
        });

        // Hàm toggleResponse để ẩn/hiện phần phản hồi
        function toggleResponse(button) {
            const danhGiaId = button.closest('li').dataset.id;
            const responseDiv = document.getElementById(`comment-${danhGiaId}`);

            if (responseDiv) {
                if (responseDiv.classList.contains('hidden')) {
                    responseDiv.classList.remove('hidden');
                    button.textContent = 'Ẩn phản hồi';
                    button.innerHTML += ' <i class="fa fa-eye-slash" aria-hidden="true"></i>';
                } else {
                    responseDiv.classList.add('hidden');
                    button.textContent = 'Xem phản hồi';
                    button.innerHTML = 'Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>';
                }
            } else {
                console.error(`Response div with ID comment-${danhGiaId} not found.`);
            }
        }
    </script>
    <style>
        .hidden {
            display: none;
        }
    </style>

    <script>
        function toggleResponse(button) {
            const danhGiaId = button.closest('li').dataset.id;
            const responseDiv = document.getElementById(`comment-${danhGiaId}`);

            if (responseDiv) {
                if (responseDiv.classList.contains('hidden')) {
                    responseDiv.classList.remove('hidden');
                    button.textContent = 'Ẩn phản hồi';
                    button.innerHTML += ' <i class="fa fa-eye-slash" aria-hidden="true"></i>'; // Thêm icon
                } else {
                    responseDiv.classList.add('hidden');
                    button.textContent = 'Xem phản hồi';
                    button.innerHTML = 'Xem phản hồi <i class="fa fa-eye" aria-hidden="true"></i>'; // Đặt lại nội dung
                }
            } else {
                console.error(`Response div with ID ${danhGiaId} not found.`);
            }
        }
    </script>
@endpush
