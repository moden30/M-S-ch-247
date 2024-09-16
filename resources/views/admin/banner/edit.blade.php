@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Cập nhật banner
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="filter-choices-input mt-3">
                        <label for="hinh_anh">Ảnh Banner:</label>
                        <input type="file" name="hinh_anh" class="form-control">
                        <!-- Hiển thị hình ảnh hiện tại -->
                        @if ($banner->hinh_anh)
                            <img src="{{ Storage::url($banner->hinh_anh) }}" alt="Current Banner Image"
                                style="max-width: 100px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="filter-choices-input mt-3">
                        <label for="noi_dung">Nội dung:</label>
                        <textarea name="noi_dung" class="form-control">{{ old('noi_dung', $banner->noi_dung) }}</textarea>
                    </div>

                    <div class="filter-choices-input mt-3">
                        <label for="loai_banner">Loại Banner:</label>
                        <select name="loai_banner" class="form-control">
                            <option value="Slideshow"
                                {{ old('loai_banner', $banner->loai_banner) == 'Slideshow' ? 'selected' : '' }}>
                                Slideshow</option>
                            <option value="Footer"
                                {{ old('loai_banner', $banner->loai_banner) == 'Footer' ? 'selected' : '' }}>Footer</option>
                        </select>
                    </div>

                    <div class="filter-choices-input mt-3">
                        <label for="trang_thai">Trạng thái:</label>
                        <select name="trang_thai" class="form-control">
                            <option value="Ẩn" {{ old('trang_thai', $banner->trang_thai) == 'Ẩn' ? 'selected' : '' }}>Ẩn
                            </option>
                            <option value="Hiện" {{ old('trang_thai', $banner->trang_thai) == 'Hiện' ? 'selected' : '' }}>
                                Hiện</option>
                        </select>
                    </div>

                    <div class="filter-choices-input mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
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
