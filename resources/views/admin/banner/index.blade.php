@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Danh sách banner
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
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
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="filter-choices-input mt-3">
                                <label for="hinh_anh">Ảnh Banner:</label>
                                <input type="file" name="hinh_anh" class="form-control">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label for="noi_dung">Nội dung:</label>
                                <textarea name="noi_dung" class="form-control">{{ old('noi_dung') }}</textarea>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label for="loai_banner">Loại Banner:</label>
                                <select name="loai_banner" class="form-control">
                                    <option value="Slideshow" {{ old('loai_banner') == 'Slideshow' ? 'selected' : '' }}>
                                        Slideshow</option>
                                    <option value="Footer" {{ old('loai_banner') == 'Footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="hien">Hiển thị</option>
                                    <option value="an">Ẩn</option>
                                </select>
                            </div>

                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Xem trước</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <select id="loai_banner_select" class="form-control" onchange="loadBannersByType()">
                        <option value="Slideshow">Slideshow</option>
                        <option value="Footer">Footer</option>
                    </select>
                </div>

                <div class="card mt-3">
                    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner px-3" id="carousel-images">
                            <!-- Ảnh slideshow sẽ được đổ vào đây bằng AJAX -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                style="width: 20px; height: 20px;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"
                                style="width: 20px; height: 20px;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>



        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
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
        // Lấy dữ liệu từ Laravel và truyền vào JavaScript
        const banners = @json($banners);

        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID",
                width: "150px",
                formatter: function(e) {
                    let detailUrl = "{{ route('banner.detail', ':id') }}".replace(':id', e);
                    let editUrl = "{{ route('banner.edit', ':id') }}".replace(':id', e);
                    let deleteUrl = "{{ route('banner.destroy', ':id') }}".replace(':id', e);

                    return gridjs.html(`
                        <span class="fw-semibold">${e}</span>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem</a> |
                            <a href="${editUrl}" class="btn btn-link p-0">Sửa</a> |
                            <button class="btn btn-link p-0 text-danger" onclick="deleteBanner('${deleteUrl}')">Xóa</button>
                        </div>
                    `);
                }

            }, {
                name: "Ảnh",
                width: "180px",
                formatter: function(e) {
                    return gridjs.html(`<img src="${e}" alt="Ảnh" width="100px" height="50px">`);
                }
            }, {
                name: "Nội dung",
                width: "220px",
                formatter: function(e) {
                    // Cắt chuỗi nếu dài hơn 10 ký tự và thêm dấu ba chấm
                    let truncated = e.length > 50 ? e.substring(0, 50) + '...' : e;
                    return gridjs.html(`<span>${truncated}</span>`);
                }
            }, {
                name: "Loại banner",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold"> ' + e + "</span>");
                }
            }, {
                name: "Trạng thái",
                width: "100px",
                formatter: function(e, row) {
                    return gridjs.html(`
                           <span class="badge ${e == 'hien' ? 'bg-success' : 'bg-danger'} status-toggle"
                                data-id="${row.cells[0].data}"
                                data-status="${e}"
                                style="font-size: 0.5rem; padding: 0.5rem 1rem;">
                                ${e == 'hien' ? 'Hiển thị' : 'Ẩn'}
                            </span>
                        `);
                }
            }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: banners.map(banner => [
                banner.id,
                "{{ Storage::url('') }}" + banner.hinh_anh,
                banner.noi_dung,
                banner.loai_banner,
                banner.trang_thai
            ])

        }).render(document.getElementById("table-gridjs"));

        function deleteBanner(url) {
            if (confirm("Bạn có chắc chắn muốn xóa banner này?")) {
                fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Xóa thành công!');
                            location.reload(); // Reload lại trang
                        } else {
                            alert('Có lỗi xảy ra khi xóa banner.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        // Thêm sự kiện click cho các trạng thái
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('status-toggle')) {
                const id = e.target.getAttribute('data-id');
                const currentStatus = e.target.getAttribute('data-status');
                const newStatus = currentStatus === 'hien' ? 'an' : 'hien';

                fetch(`/banner/${id}/update-status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            trang_thai: newStatus
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Cập nhật lại giao diện
                            e.target.setAttribute('data-status', newStatus);
                            e.target.classList.toggle('bg-success');
                            e.target.classList.toggle('bg-danger');
                            e.target.innerHTML = newStatus === 'hien' ? 'Hiển thị' : 'Ẩn';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });


        function loadBannersByType() {
            var selectedType = document.getElementById("loai_banner_select").value;

            fetch(`/get-banners-by-type/${selectedType}`)
                .then(response => response.json())
                .then(data => {
                    var carouselInner = document.getElementById("carousel-images");
                    carouselInner.innerHTML = ''; // Xóa nội dung cũ

                    if (data.banners.length > 0) {
                        data.banners.forEach((banner, index) => {
                            let activeClass = index === 0 ? 'active' : '';
                            let imgElement = `
                                        <div class="carousel-item ${activeClass}">
                                            <img src="{{ Storage::url('') }}${banner.hinh_anh}" class="d-block w-100" alt="Banner Image" style="width: 300px; height: 150px; object-fit: cover;">
                                        </div>`;
                            carouselInner.innerHTML += imgElement;
                        });
                    } else {
                        carouselInner.innerHTML = '<p>Không có banner nào được tìm thấy.</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Load banners mặc định khi trang được tải
        document.addEventListener('DOMContentLoaded', loadBannersByType);



        document.getElementById('bannerFormToggle').addEventListener('click', function() {
            const formContent = document.getElementById('bannerFormSection');
            if (formContent.style.display === 'none' || formContent.style.display === '') {
                formContent.style.display = 'block'; // Hiện form nếu đang bị ẩn
            } else {
                formContent.style.display = 'none'; // Ẩn form nếu đang hiện
            }
        });
    </script>
@endpush
