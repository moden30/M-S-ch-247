@extends('client.layouts.app')
@push('styles')
@endpush
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Thể loại</li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/keyword/di-gioi/">{{ $theLoai->ten_the_loai }}</a></li>
        </ol>
    </div>
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h2 class="heading ztop-30"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách thể
                    loại {{ $theLoai->ten_the_loai }}</h2>
                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left" id="total"></div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <select id="filter_keyword_tax" class="form-control">
                                        <option value="all">Tất cả</option>
                                        <option value="new-chap">Mới Cập Nhật</option>
                                        <option value="new">Sách Mới</option>
                                        <option value="new-full">Hoàn Thành</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="theloai-thumlist" id="my-table">
                        </div>
                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center"><span class="btn-primary-border font-12 font-oswald"
                                                                     data-maxpage="114">Xem Thêm Truyện →</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="row row-heading">
                    <div class="col-xs-12"><h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i>
                            Dị
                            Giới Hay </h2></div>
                </div>
                <ul class="nav nav-tabs nav-tabs-css nav-topdanhvong" data-id="topdanhvong">
                    <li role="presentation" data-date="ticket" class="active"><a>Kim Bài</a></li>
                </ul>
                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        <li class="item">
                            <div class="index index-1"><i class="icon-medal-1"></i></div>
                            <div class="content media">
                                <div class="info"><strong class="crop-text-2"><a
                                            href="https://truyenhdt.com/truyen/phu-lang-nha-ta-la-nhi-ga/"
                                            class="d-block">Cực Phẩm Trạng Nguyên</a></strong>
                                    <div class="view color-gray"><i class="fa fa-ticket" aria-hidden="true"></i> 10K
                                    </div>
                                    <div class="crop-text-1 color-gray"></div>
                                </div>
                                <div class="thumb">
                                    <div class="book-cover"><a
                                            href="https://truyenhdt.com/truyen/phu-lang-nha-ta-la-nhi-ga/"
                                            title="Cực Phẩm Trạng Nguyên" class="book-cover-link"><img
                                                src="https://truyenhdt.com/wp-content/uploads/2024/06/phu-lang-nha-ta-la-nhi-ga-1717796924.jpg"
                                                alt="Cực Phẩm Trạng Nguyên"></a><span class="book-cover-shadow"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item">
                            <div class="index"><i class="icon-medal-2"></i></div>
                            <div class="content media"><a
                                    href="https://truyenhdt.com/truyen/ta-tro-thanh-nu-vuong-di-hinh-o-phe-tho/"
                                    class="crop-text-1">Ta Trở Thành Nữ Vương Dị Hình Ở Phế Thổ</a><span
                                    class="color-gray item-number">5K</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-8"></div>
            <div class="col-xs-12 col-md-4 sidebar-right"></div>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Thể loại</li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/keyword/di-gioi/">{{ $theLoai->ten_the_loai }}</a></li>
        </ol>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            function fetchBooks() {
                $.ajax({
                    url: '{{ route('data-the-loai', $theLoai->id) }}',
                    type: 'GET',
                    success: function (response) {
                        $('#total').html(`Tìm thấy <strong>${response.total}</strong> quyển sách`);
                        $('#my-table').empty();
                        response.data.forEach(function (data) {
                            let content = `
                        <li class="col-md-4 col-sm-4 col-xs-12">
                            <a href="/sach/${data.id}" class="thumbnail" title="${data.ten_sach}">
                                <img src="${data.anh_bia_sach}" alt="${data.ten_sach}"/>
                            </a>
                            <div class="text">
                                <div class="d-flex justify-content-between">
                                    <h2 class="crop-text-1" itemprop="name">
                                        <a href="/sach/${data.id}" title="${data.ten_sach}">${data.ten_sach}</a>
                                    </h2>
                                    <span class="text-danger">${data.gia_sach} VNĐ</span>
                                </div>
                                <div class="content">
                                    <p class="crop-text-1 color-gray d-flex justify-content-between">
                                        Thể loại: ${data.theloai}
                                        <span itemprop="name">${data.format_ngay_cap_nhat}</span>
                                    </p>
                                    <p class="crop-text-1 color-gray">
                                        <span class="fa fa-user"></span> Tác giả:
                                        <span itemprop="name"><a href="#" rel="tag">${data.tac_gia}</a></span>
                                    </p>
                                    <p class="crop-text-2">${data.tom_tat}</p>
                                </div>
                            </div>
                        </li>
                    `;
                            $('#my-table').append(content);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error: ', status, error);
                        alert('There was an issue fetching the books. Please try again later.');
                    }
                });
            }

            fetchBooks();
        });
    </script>

@endpush
