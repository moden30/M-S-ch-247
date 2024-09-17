@extends('admin.layouts.app')
@section('start-point')
    Quản lý thể loại
@endsection
@section('title')
    Danh sách thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm thể loại mới</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
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
                        <form action="{{ route('the-loai.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên thể loại</label>
                                <input name="ten_the_loai" class="form-control" type="text">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input name="anh_the_loai" class="form-control" type="file" accept="image/*">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả</label>
                                <textarea name="mo_ta" class="form-control"></textarea>
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
            <!-- end card -->
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
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .tooltip-content {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip-content .tooltip-text {
            visibility: hidden;
            width: 300px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            top: 125%;
            /* Hiển thị tooltip phía dưới */
            left: 50%;
            margin-left: -150px;
            /* Căn giữa tooltip */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-content:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        const theloais = @json($theloais);

        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html(`
                    <span class="fw-semibold">${e}</span>
                    <div class="d-flex justify-content-start mt-2">
                        <a href="{{ route('the-loai.edit') }}" class="btn btn-link p-0">Sửa |</a>
                        <a href="{{ route('the-loai.detail') }}" class="btn btn-link p-0">Xem |</a>
                        <a href="#" class="btn btn-link p-0 text-danger">Xóa</a>
                    </div>
                `);
                }
            }, {
                name: "Tên thể loại",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Ảnh đại diện",
                width: "100px",
                formatter: function(e) {
                    return gridjs.html(`<img src="${e}" alt="Ảnh" width="50px">`);
                }
            }, {
                name: "Mô tả",
                width: "250px",
                formatter: function(e) {
                    const truncatedText = e.split(' ').slice(0, 10).join(' ') + (e.split(' ').length >
                        10 ? '...' : '');

                    return gridjs.html(`
                    <div class="tooltip-content">
                        <span>${truncatedText}</span>
                        <div class="tooltip-text">${e}</div>
                    </div>
                `);
                }
            }, {
                name: "Trạng thái",
                width: "100px",
                formatter: function(e, row) {
                    return gridjs.html(`
                    <span class="badge ${e == 'hien' ? 'bg-success' : 'bg-danger'} status-toggle" 
                          data-id="${row.cells[0].data}" 
                          data-status="${e}">
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
            data: theloais.map(theloai => [
                theloai.id,
                theloai.ten_the_loai,
                "{{ Storage::url('') }}" + theloai.anh_the_loai,
                theloai.mo_ta,
                theloai.trang_thai
            ])
        }).render(document.getElementById("table-gridjs"));

        // Thêm sự kiện click cho các trạng thái
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('status-toggle')) {
                const id = e.target.getAttribute('data-id');
                const currentStatus = e.target.getAttribute('data-status');
                const newStatus = currentStatus === 'hien' ? 'an' : 'hien';

                fetch(`/the-loai/${id}/update-status`, {
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
    </script>
@endpush
