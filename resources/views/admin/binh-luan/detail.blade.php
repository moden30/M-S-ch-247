@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Chi tiết bình luận
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="" class="form-label">Mã thể loại</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="" placeholder="Nhập mã thể loại">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="nameInput" class="form-label">Tên thể loại</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="nameInput" placeholder="Nhập tên thể loại">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Ảnh </label>
                        </div>
                        <div class="col-lg-9">
                            <input type="url" class="form-control" id="websiteUrl" placeholder="Nhập ảnh thể loại">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="timeInput" class="form-label">Trạng thái</label>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="meassageInput" class="form-label">Mô tả</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="form-control" id="meassageInput" rows="3" placeholder="Nhập mô tả"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Sửa</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('styles')

@endpush

@push('scripts')


@endpush
