@extends('client.layouts.app')
@section('content')

<div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href=""> <i class="fa fa-bell" aria-hidden="true"></i> Thông Báo</a></li>
        </ol>
        <h1 id="h1">Thông Báo</h1>
        <p id="demo" data-time1 data-time2></p>
        <div id="date"> <span id="today"></span> </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-2"> </div>
            <div class="col-xs-12 col-md-8" id="notify">
                @foreach($thong_baos as $thong_bao)
                    <div class="row tf-flex">
                        <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last">
                            <i class="fa fa-circle {{ $thong_bao->trang_thai === 'chua_xem' ? 'text-danger' : 'text-success' }}" aria-hidden="true"></i>
                            <a href="{{ route('chi-tiet-thong-bao', $thong_bao->id) }}" class="{{ $thong_bao->trang_thai === 'chua_xem' ? 'font-weight-bold' : '' }}">
                                <span class="notify-date">{{ $thong_bao->created_at->format('d/m/y') }}</span>
                                {{ $thong_bao->tieu_de }}
                            </a>
                        </div>
                    </div>
                @endforeach

                {{--Phân trang--}}
                <ul class="pagination text-center" id="id_pagination">
                    @if($thong_baos->onFirstPage())
                        <li class="active"><a href="#">1</a></li>
                    @else
                        <li><a href="{{ $thong_baos->url(1) }}">1</a></li>
                    @endif

                    @for ($i = 2; $i <= $thong_baos->lastPage(); $i++)
                        @if ($i == $thong_baos->currentPage())
                            <li class="active"><a href="#">{{ $i }}</a></li>
                        @else
                            <li><a href="{{ $thong_baos->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endfor

                    @if($thong_baos->hasMorePages())
                        <li><a href="{{ $thong_baos->nextPageUrl() }}">»</a></li>
                    @else
                        <li class="disabled"><span>»</span></li>
                    @endif
                </ul>
                <style type="text/css">
                    .pagination {
                        padding: 15px 0 0 0
                    }

                    ul.pagination li {
                        list-style: none;
                        display: inline-block;
                        margin: 10px 0
                    }

                    .pagination li:hover a {
                        background: linear-gradient(135deg, #848484 30%, #000 100%);
                        color: #fff
                    }

                    .pagination li.active a {
                        color: #fff;
                        background: linear-gradient(135deg, #000 30%, #848484 100%)
                    }

                    .pagination li.active:hover a,
                    .pagination li.disabled:hover a {
                        background: linear-gradient(135deg, #000 30%, #848484 100%);
                        cursor: not-allowed;
                        pointer-events: none
                    }

                    .pagination li a {
                        border: solid 1px #000;
                        color: #000;
                        padding: .6rem 1rem;
                        border-radius: 4px;
                        border: solid 1px #000;
                        margin: 4px 2px
                    }
                </style>
            </div>
            <div class="col-xs-12 col-md-2"> </div>
        </div>
    </div>
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href=""> <i class="fa fa-bell" aria-hidden="true"></i> Thông Báo</a></li>
        </ol>
    </div>
@endsection

