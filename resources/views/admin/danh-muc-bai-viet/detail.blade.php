@extends('admin.layouts.app')
@section('start-point')
    Quản lý chuyên mục
@endsection
@section('title')
    Xem chuyên mục
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-16">Xem thông tin chuyên mục</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate
                  action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Tên chuyên mục</label>
                                    <input type="text" class="form-control"
                                           name="ten_chuyen_muc" id="product-title-input"
                                           value="{{ $chuyen_mucs->ten_chuyen_muc }}"
                                           placeholder="Nhập tên chuyên mục" required disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="parent-category-display" class="form-label">Chuyên mục cha</label>
                                    <input type="text" class="form-control"
                                           id="parent-category-display"
                                           value="{{ $chuyen_mucs->chuyenMucCha->ten_chuyen_muc ?? 'Không có' }}"
                                           readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <a href="{{ route('chuyen-muc.index') }}" class="btn btn-secondary me-2">Quay lại</a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Trạng thái</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng thái hiển thị</label>
                                    <input type="text" id="status-display-input"
                                           name="trang_thai"
                                           value="{{ $chuyen_mucs->getTrangThaiTextAttribute() }}"
                                           readonly
                                           class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>
@endpush
