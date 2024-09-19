{{--




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
@endpush --}}


@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Thêm mới banner
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Thêm banner mới</h5>
                        </div>
                    </div>
                </div>
                <div id="bannerFormSection" class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
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
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="filter-choices-input mt-3">
                                <label for="hinh_anh">Ảnh Banner:</label>
                                <input type="file" name="hinh_anh" class="form-control">
                            </div> --}}


                            <div class="filter-choices-input mt-3">
                                <label for="tieu_de">Tiêu đề:</label>
                                <input type="text" name="tieu_de" class="form-control"
                                    value="{{ old('tieu_de', $banner->tieu_de) }}">
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
                                        {{ old('loai_banner', $banner->loai_banner) == 'Footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="hien"
                                        {{ old('trang_thai', $banner->trang_thai) == 'hien' ? 'selected' : '' }}>Hiển thị
                                    </option>
                                    <option value="an"
                                        {{ old('trang_thai', $banner->trang_thai) == 'an' ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>


                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Thêm ảnh</label>
                                <div id="add-row" class="btn btn-primary">+</div>
                                <table class="table align-middle mb-0">
                                    <tbody id="image-table-body">




                                        {{--
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img id="preview_0"
                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s"
                                                        width="50px">
                                                    <input type="file" id="hinh_anh" name="list_image[]"
                                                        class="form-control mx-2" onchange="previewImage(this, 0)">
                                                    <button class="btn btn-light remove-row"><i
                                                            class="bx bx-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr> --}}



                                        @foreach ($banner->hinhAnhBanner as $index => $hinhAnh)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <img id="preview_{{ $index }}"
                                                        src="{{ Storage::url($hinhAnh->hinh_anh) }}"
                                                        alt="Hình ảnh sản phẩm" style="width: 50px" class="me-3">
                                                    <input type="file" id="hinh anh"
                                                        name="list_hinh_anh[{{ $hinhAnh->id }}]" class="form-control"
                                                        onchange="previewImage(this, {{ $index }})">
                                                    <input type="hidden" name="list_hinh_anh[{{ $hinhAnh->id }}]"
                                                        value="{{ $hinhAnh->id }}">
                                                </td>
                                                <td>
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"
                                                        style="cursor: pointer" onclick="removeRow(this)"></i>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>


                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-success me-2"
                                    style="width: 100px; height: 37.5px">Thêm</button>
                                <a href="{{ route('banner.index') }}" class="btn btn-secondary " style="width: 100px;">Quay
                                    lại</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- end col -->

        <div class="col-xl-7 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h1>Slide ở đây</h1>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = {{ count($banner->hinhAnhBanner) }};

            // Thêm sự kiện cho nút 'Thêm hàng'
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px">
                            <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control mx-2" onchange="previewImage(this, ${rowCount})">
                            <button class="btn btn-light remove-row"><i class="bx bx-trash"></i></button>
                        </div>
                    </td>
                `;

                tableBody.appendChild(newRow);
                rowCount++;
            });




        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endpush
