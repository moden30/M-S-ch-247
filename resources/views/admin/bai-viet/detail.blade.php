@extends('admin.layouts.app')
@section('start-point')
    Quản lý bài viết
@endsection
@section('title')
    Chi tiết bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $baiViet->tieu_de }}</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Ngày đăng: {{ $baiViet->ngay_dang }} | Tác giả: {{ $baiViet->tacGia->ten_doc_gia }} | Trạng thái: {{ $baiViet->trang_thai }}</p>

                    <div class="mx-n3">
                        <div data-simplebar  class="px-3">
                            <p>{!! $baiViet->noi_dung !!}</p>
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
<link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')

    <!-- ecommerce product details init -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-details.init.js') }}"></script>
@endpush
