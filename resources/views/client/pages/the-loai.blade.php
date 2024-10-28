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
                                        <option value="new-full">Hoàn Thành</option>
                                        <option value="updating">Đang cập nhật</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="theloai-thumlist" id="my-table">
                        </div>
                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center">
                            <span class="btn-primary-border font-12 font-oswald" data-maxpage="114">Xem Thêm Sách →</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="row row-heading">
                    <div class="col-xs-12"><h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i>
                            Top 10 sách đọc nhiều nhất</h2></div>
                </div>
                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        @foreach($topDocNhieu as $index => $item)
                            @if($index == 0)
                                <li class="item">
                                    <div class="index index-1"><i class="icon-medal-1"></i></div>
                                    <div class="content media">
                                        <div class="info"><strong class="crop-text-2"><a
                                                    href="{{ route('chi-tiet-sach', $item->id) }}"
                                                    class="d-block">{{ $item->ten_sach }}</a></strong>
                                            <div class="view color-gray"><i class="fa fa-eye" aria-hidden="true"></i> {{ $item->luot_xem }}
                                            </div>
                                            <div class="crop-text-1 color-gray"></div>
                                        </div>
                                        <div class="thumb">
                                            <div class="book-cover"><a
                                                    href="{{ route('chi-tiet-sach', $item->id) }}"
                                                    title="{{ $item->ten_sach }}" class="book-cover-link">
                                                        <img
                                                            src="{{ Storage::url($item->anh_bia_sach) }}"
                                                            alt="{{ $item->ten_sach }}">
                                                </a><span class="book-cover-shadow"></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="item">
                                    <div class="index"><i class="icon-medal-{{ $index + 1 }}"></i></div>
                                    <div class="content media"><a
                                            href="{{ route('chi-tiet-sach', $item->id) }}"
                                            class="crop-text-1">{{ $item->ten_sach }}</a><span
                                            class="color-gray item-number"><i class="fa fa-eye" aria-hidden="true"></i> {{ $item->luot_xem }}</span></div>
                                </li>
                            @endif
                        @endforeach
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
            let currentPage = 1;
            const booksPerPage = 12;
            let maxPage = parseInt($('.load_more_tax span').data('maxpage'));
            let selectedFilter = 'all';

            function fetchBooks(page = 1, filter = 'all') {
                $.ajax({
                    url: '{{ route('data-the-loai', $theLoai->id) }}',
                    type: 'GET',
                    data: {
                        page: page,
                        filter: filter,
                        per_page: booksPerPage
                    },
                    success: function (response) {
                        if (page === 1) {
                            $('#my-table').empty();
                        }

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

                        $('#total').html(`Tìm thấy <strong>${response.total}</strong> cuốn sách`);
                        if (page >= response.last_page) {
                            $('.load_more_tax').hide();
                        } else {
                            $('.load_more_tax').show();
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error: ', status, error);
                        alert('There was an issue fetching the books. Please try again later.');
                    }
                });
            }

            // Initially load the first page with 12 books
            fetchBooks(currentPage, selectedFilter);

            // Event listener for filter dropdown
            $('#filter_keyword_tax').on('change', function () {
                selectedFilter = $(this).val(); // Get the selected filter
                currentPage = 1; // Reset to first page when filter is changed
                fetchBooks(currentPage, selectedFilter); // Fetch books based on selected filter
            });

            // Event listener for the "Load More" button
            $('.load_more_tax').on('click', function () {
                currentPage++; // Increment current page
                fetchBooks(currentPage, selectedFilter); // Fetch next page with the current filter
            });
        });
    </script>

@endpush
