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
                            <label for="websiteUrl" class="form-label">ID:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="" value="{{ $binhLuan->id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Độc giả:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="" value="{{ $binhLuan->user_id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Bài viết:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="" value="{{ $binhLuan->bai_viet_id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Nội dung bình luận:</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="5" readonly>{{ $binhLuan->noi_dung }}</textarea>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Ngày bình luận:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="" value="{{ $binhLuan->ngay_binh_luan }}" readonly>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <a href="{{ route('binh-luan.index') }}" class="btn btn-info">Quay lại</a>
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
