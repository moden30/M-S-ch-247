@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết chương
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">{{ $chuong->so_chuong }} : {{ $chuong->tieu_de }}</h2>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="mx-n3">
                        <div data-simplebar class="px-3">
                            <p>{!!  $chuong->noi_dung !!}</p>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')

    <!-- ecommerce product details init -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-details.init.js') }}"></script>
@endpush
