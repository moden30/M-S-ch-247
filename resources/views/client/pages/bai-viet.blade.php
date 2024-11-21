@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>

.table {
        width: 100%;
        table-layout: fixed; /* forces the table to take the full width */
    }
            .article-card {
                padding: 15px;
                border: 1px solid #e0e0e0;
                border-radius: 5px;
                background-color: #ffffff;
                transition: transform 0.2s;
                margin: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
            }

            .article-card:hover {
                transform: translateY(-5px);
            }

            .article-image {
                width: 100%;
                height: 200px;
                overflow: hidden;
                border-radius: 5px;
            }

            .article-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 5px;
                transition: transform 0.5s;
            }

            .article-image img:hover {
                transform: scale(1.2);
            }

            .article-title {
                margin: 10px 0;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
                -webkit-line-clamp: 1;
                max-height: 3rem;
                font-weight: bold;
            }

            .article-title a {
                text-decoration: none;
                color: #333;
                transition: color 0.2s;
            }

            .article-title a:hover {
                color: #007bff;
            }

            .article-meta {
                color: #666;
                margin: 5px 0;
                display: flex;
                justify-content: space-between;
                /* Aligns content to the left and right */
                align-items: center;
            }

            .author-info {
                display: flex;
                align-items: center;
                font-weight: bold;
                gap: 10px;
                /* Space between elements */
                margin-top: 10px;
            }

            .author-info img {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                object-fit: cover;
            }

            .author-info a {
                margin-right: auto;
                /* Pushes date to the far right */
                color: inherit;
                text-decoration: none;
            }

            .author-info .date {
                font-weight: normal;
                color: #666;
                /* Subtle color for the date */
            }

            @media (max-width: 768px) {
                .article-card {
                    margin: 5px;
                }
            }
        </style>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>

    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/"><span class="fa fa-home"></span> Trang Chủ</a>
            </li>
            <li class="breadcrumb-item active">Chuyên mục</li>
            @if (isset($currentChuyenMuc))
                <li class="breadcrumb-item">
                    <a href="">{{ $currentChuyenMuc->ten_chuyen_muc }}</a>
                </li>
            @endif
        </ol>
    </div>

    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md">
                @if (isset($currentChuyenMuc))
                    <h2 class="heading ">
                        <i class="fa fa-list" aria-hidden="true"></i> Danh Sách Bài Viết -
                        {{ $currentChuyenMuc->ten_chuyen_muc }}
                    </h2>
                @else
                    <h2 class="heading">
                        <i class="fa fa-list" aria-hidden="true"></i> Danh Sách Bài Viết
                    </h2>
                @endif

                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <br>
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left">Có {{ $baiViets->count() }} bài viết</div>

                        </div>
                        <div class="clearfix"></div>
                        <table class="table">
                            <tbody>
                                @foreach ($baiViets as $baiViet)
                                    <tr class=" col-sm-4 col-xs-12 bai-viet-item" itemscope
                                        itemtype="https://schema.org/Book"
                                        style="{{ $loop->index >= 6 ? 'display: none;' : '' }}">
                                        <td class="article-card">
                                            <div class="article-image">
                                                <a href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}"
                                                    title="{{ $baiViet->tieu_de }}">
                                                    <img src="{{ Storage::url($baiViet->hinh_anh) }}"
                                                        alt="{{ $baiViet->tieu_de }}" />
                                                </a>
                                            </div>
                                            <h2 class="article-title">
                                                <a
                                                    href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}">{{ $baiViet->tieu_de }}</a>
                                            </h2>
                                            <div class="article-meta">
                                                <p class="category-date">
                                                    {{ $baiViet->chuyenMuc->ten_chuyen_muc ?? 'Chuyên mục' }}
                                                </p>
                                            </div>
                                            <p class="article-excerpt">
                                                {!! \Illuminate\Support\Str::words($baiViet->noi_dung, 8, '...') !!}
                                            </p>

                                            <p class="author-info">
                                                <img
                                                    src="{{ $baiViet->tacGia->hinh_anh ? Storage::url($baiViet->tacGia->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}">
                                                <a
                                                    href="{{ route('chi-tiet-tac-gia', $baiViet->user_id) }}">{{ $baiViet->tacGia->ten_doc_gia }}</a>
                                                <span class="date">{{ $baiViet->ngay_dang->format('d/m/Y') }}</span>
                                            </p>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center">
                            <span id="load-more-posts" class="btn-primary-border font-12 font-oswald">Xem Thêm Bài Viết
                                →</span>
                            <span id="hide-posts" class="btn-primary-border font-12 font-oswald" style="display: none;">Ẩn
                                Bài Viết ←</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <style type="text/css">
                    .nav-tabs>li.active>a,
                    .nav-tabs>li.active>a:hover,
                    .nav-tabs>li.active>a:focus {
                        background: -webkit-linear-gradient(135deg, #39dfaa 10%, #1ebbf0 100%);
                        text-align: center;
                        color: white;
                        border: unset;
                    }

                    .nav-tabs {
                        margin-bottom: 10px;
                        font-size: 12px;
                        border-bottom: 1px solid #1ebbf0;
                    }

                    .nav.nav-tabs-css>li>a {
                        padding: 5px 5px;
                        font-weight: 600;
                        text-align: center;
                    }

                    .nav-tabs>li>a {
                        border-radius: unset;
                    }

                    .nav-tabs>li {
                        margin-bottom: -3px;
                        width: 25%;
                    }

                    .nav-tabs>li>a:hover {
                        border-color: transparent;
                    }

                    .nav>li>a:hover,
                    .nav>li>a:focus {
                        background: -webkit-linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        color: transparent;
                        -webkit-background-clip: text;
                        text-decoration: none;
                    }

                    .row-heading .form-group {
                        margin-bottom: 0px;
                    }

                    .crop-text-12 {
                        white-space: nowrap;
                    }
                </style>


            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('load-more-posts').addEventListener('click', function() {
            const hiddenPosts = document.querySelectorAll('.bai-viet-item[style*="display: none;"]');

            const maxToShow = 6;
            let count = 0;

            hiddenPosts.forEach((post) => {
                if (count < maxToShow) {
                    post.style.display = 'block';
                    count++;
                }
            });

            if (count > 0) {
                document.getElementById('hide-posts').style.display = 'inline-block';
            }

            if (hiddenPosts.length <= maxToShow) {
                this.style.display = 'none';
            }
        });

        document.getElementById('hide-posts').addEventListener('click', function() {
            const baiVietItems = document.querySelectorAll('.bai-viet-item');
            const initialToShow = 6;
            let count = 0;

            baiVietItems.forEach((post, index) => {
                if (index >= initialToShow) {
                    post.style.display = 'none';
                    count++;
                }
            });

            if (count > 0) {
                document.getElementById('load-more-posts').style.display = 'inline-block';
            }

            this.style.display = 'none';
        });

        window.onload = function() {
            const baiVietItems = document.querySelectorAll('.bai-viet-item');
            const initialToShow = 6;

            baiVietItems.forEach((item, index) => {
                if (index < initialToShow) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        };
    </script>
    <script>
        function filterPosts() {
            var filterValue = document.getElementById('filter_keyword_tax').value;
            var url = "{{ route('filterByChuyenMuc', ['id' => $currentChuyenMuc->id ?? null]) }}";

            if (filterValue === "") {
                window.location.href = url;
            } else {
                window.location.href = url + '?filter=' + filterValue;
            }
        }
    </script>
@endpush
