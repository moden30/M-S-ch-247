




@extends('admin.layouts.app')

@section('start-point')
    Quản lý banner
@endsection

@section('title')
    Chi tiết banner
@endsection

@section('content')
    <div class="row">
        <!-- Nội dung chi tiết banner -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Thông tin Banner</h5>
                    <div>
                        <span class="badge bg-light text-dark me-2">ID: {{ $banner->id }}</span>
                    </div>
                </div>
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
                        <label class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-control">
                            <option value="hien" {{ old('trang_thai', $banner->trang_thai) == 'hien' ? 'selected' : '' }}>Hiển thị</option>
                            <option value="an" {{ old('trang_thai', $banner->trang_thai) == 'an' ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>
                    <div class="filter-choices-input mt-3">
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Cập nhật</button>
                            <a href="{{ route('banner.index') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>




                </div>
            </div>
        </div>

        <!-- Ảnh banner -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body text-center" style="padding: 0;">
                    <div class="filter-choices-input mt-3">
                        <label for="hinh_anh">Ảnh Banner:</label>
                        <div id="image-preview" class="" style="margin-left: 30px; margin-right: 30px;">
                            <!-- Hiển thị hình ảnh hiện tại nếu có -->
                            @if ($banner->hinh_anh)
                                <img id="hinh_anh" src="{{ Storage::url($banner->hinh_anh) }}" alt="Current Banner Image" style="display: block; margin-top: 10px; width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                            @else
                                <img id="hinh_anh" src="" alt="Hình ảnh danh mục" style="display: none; width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                            @endif

                            <label for="image-upload" id="image-label" class="btn btn-primary mt-2">Choose File</label>
                            <input type="file" name="hinh_anh" id="image-upload" onchange="showImage(event)" class="d-none" />
                        </div>
                    </div>



                    <script>
                        function showImage(event) {
                            var input = event.target;

                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var image = document.getElementById('hinh_anh');
                                    image.src = e.target.result;
                                    image.style.display = 'block'; // Show the newly uploaded image
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>
        </div>

    </form>
    </div>

    <!-- Modal -->

@endsection

@push('styles')

@endpush

@push('scripts')
@endpush
