@extends('client.layouts.app')
@push('styles')
    <style>
        /* General Styles */
        .book-item {
            position: relative;
            width: 150px;
            height: 220px;
            margin: 15px;
            padding: 0; /* Removed padding for full image display */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s ease;
            overflow: hidden;
            background-color: #fff;
            display: inline-block;
        }


        .book-item:hover {
            transform: translateY(-5px);
        }

        /* Book Image */
        .book-image {
            width: 100%;
            height: 100%; /* Make the image container full height */
            overflow: hidden;
        }

        .book-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }


        /* Price Tag */
        /* Price Tag */
        .price-tag {
            position: absolute;
            top: 0; /* Aligns it to the top */
            right: 0; /* Aligns it to the right */
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            color: white;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
            font-size: 12px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow for depth */
            z-index: 10; /* Ensures the price tag appears above other elements */
            margin: 0; /* Remove margin to position it exactly in the corner */
        }


        /* Giá đã mua */
        .price-tag.da-mua {
            background: linear-gradient(135deg, #ff8a00 30%, #ffc107 100%);
            box-shadow: 0 0 5px rgba(255, 138, 0, 0.5),
            0 0 10px rgba(255, 138, 0, 0.4),
            0 0 15px rgba(255, 138, 0, 0.3),
            0 0 20px rgba(255, 138, 0, 0.2);
            animation: burn-mua 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Giá khuyến mãi */
        .price-tag.gia-khuyen-mai {
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
            0 0 10px rgba(30, 187, 240, 0.4),
            0 0 15px rgba(30, 187, 240, 0.3),
            0 0 20px rgba(30, 187, 240, 0.2);
            animation: burn-goc 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Giá gốc */
        .price-tag.gia-goc {
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
            0 0 10px rgba(30, 187, 240, 0.4),
            0 0 15px rgba(30, 187, 240, 0.3),
            0 0 20px rgba(30, 187, 240, 0.2);
            animation: burn-goc 1.5s infinite alternate;
            padding: 5px 10px;
            border-radius: 0 10px 0 10px;
        }

        /* Animation bốc cháy cho giá đã mua */
        @keyframes burn-mua {
            0% {
                box-shadow:
                    0 0 5px rgba(255, 138, 0, 0.5),
                    0 0 10px rgba(255, 138, 0, 0.4),
                    0 0 15px rgba(255, 138, 0, 0.3),
                    0 0 20px rgba(255, 138, 0, 0.2);
                transform: scale(1);
            }
            100% {
                box-shadow:
                    0 0 10px rgba(255, 138, 0, 0.7),
                    0 0 20px rgba(255, 138, 0, 0.5),
                    0 0 30px rgba(255, 138, 0, 0.4),
                    0 0 40px rgba(255, 138, 0, 0.3);
                transform: scale(1.05);
            }
        }

        /* Animation bốc cháy cho giá khuyến mãi */
        @keyframes burn-khuyen-mai {
            0% {
                box-shadow:
                    0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                transform: scale(1);
            }
            100% {
                box-shadow:
                    0 0 10px rgba(30, 187, 240, 0.7),
                    0 0 20px rgba(30, 187, 240, 0.5),
                    0 0 30px rgba(30, 187, 240, 0.4),
                    0 0 40px rgba(30, 187, 240, 0.3);
                transform: scale(1.05);
            }
        }

        /* Animation bốc cháy cho giá gốc */
        @keyframes burn-goc {
            0% {
                box-shadow:
                    0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                transform: scale(1);
            }
            100% {
                box-shadow:
                    0 0 10px rgba(30, 187, 240, 0.7),
                    0 0 20px rgba(30, 187, 240, 0.5),
                    0 0 30px rgba(30, 187, 240, 0.4),
                    0 0 40px rgba(30, 187, 240, 0.3);
                transform: scale(1.05);
            }
        }

        /* Book Info */
        .book-info {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            text-align: center;
            padding: 5px 0;
        }

        .book-title {
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin: 0;
        }

    </style>

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
            const booksPerPage = 14;
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
                             <li class="book-item col-md-4 col-sm-4 col-xs-12">
                                <a href="/sach/${data.id}" title="${data.ten_sach}">
                                    <div class="book-image">
                                        <img src="${data.anh_bia_sach}" alt="${data.ten_sach}">
                                         <div class="price-tag ${data.da_mua ? 'da-mua' : (data.gia_khuyen_mai ? 'gia-khuyen-mai' : 'gia-goc')}">
    ${data.da_mua ? data.da_mua : (data.gia_khuyen_mai ? `
          <div class="price-slide">
        <span class="original-price" style="text-decoration: line-through; color: black;">${data.gia_goc}</span>
      </div>
      <div class="price-slide">
        <span class="promo-price">${data.gia_khuyen_mai}</span>
      </div>

` : data.gia_goc)}
</div>
                                    </div>
                                    <div class="book-info">
                                        <h4 class="book-title">${data.ten_sach}</h4>
                                    </div>
                                </a>
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
