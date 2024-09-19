@extends('admin.layouts.app')
@section('start-point')
    Quản lý danh mục bài viết
@endsection
@section('title')
    Danh sách danh mục bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm chuyên mục bài viết</h5>
                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Thông báo khi thêm thất bại -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i>
                                    <strong class="fs-5">Thất bại</strong>
                                    <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="{{ route('chuyen-muc.store') }}" method="post">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên Chuyên Mục</label>
                                <input class="form-control @error('ten_chuyen_muc') is-invalid @enderror" name="ten_chuyen_muc" type="text" value="{{ old('ten_chuyen_muc') }}">
                                @error('ten_chuyen_muc')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Chuyên Mục Cha</label>
                                <select class="form-control" name="chuyen_muc_cha_id">
                                    <option value="">Không có</option>
                                    @foreach($chuyen_mucs as $chuyen_muc)
                                        <option value="{{ $chuyen_muc->id }}">{{ $chuyen_muc->ten_chuyen_muc }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="form-check-label mt-3" for="SwitchCheck3">Trạng thái</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="trang_thai" id="SwitchCheck3" checked>
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
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [
                {
                    name: "ID", width: "120px",
                    formatter: function (e) {
                        let sua = `{{ route('chuyen-muc.edit', ':id') }}`.replace(':id', e);
                        let xem = `{{ route('chuyen-muc.show', ':id') }}`.replace(':id', e);
                        let xoa = `{{ route('chuyen-muc.destroy', ':id') }}`.replace(':id', e);
                        let csrfToken = '{{ csrf_token() }}';
                        return gridjs.html(`
                            <div class="flex-grow-1">
                                <span class="fw-semibold">${e}</span>
                            </div>
                            <div class="d-flex justify-content-start mt-2">
                                <a href="${sua}" class="btn btn-link p-0">Sửa |</a>
                                <a href="${xem}}" class="btn btn-link p-0">Xem |</a>
                                <form action="${xoa}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                </form>
                            </div>
                        `);
                    }
                },
                {
                    name: "Tên Chuyên Mục", width: "150px",
                    formatter: function (e) {
                        return gridjs.html(`<a href="">${e}</a>`);
                    }
                },
                {
                    name: "Chuyên Mục Cha", width: "220px",
                    formatter: function (e) {
                        return gridjs.html(`<a href="">${e}</a>`);
                    }
                },
                {
                    name: "Trạng Thái",
                    width: "180px",
                    formatter: function (e, row) {
                        const id = row.cells[0].data;
                        const badgeClass = e === 'Hiện' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger';
                        return gridjs.html(`
                            <span
                                class="badge ${badgeClass} hover-status"
                                data-id="${id}"
                                style="cursor: pointer; padding: 5px 10px; font-size: 1em; border-radius: 5px;">
                                ${e}
                            </span>
                        `);
                    }
                }

            ],
            pagination: { limit: 5 },
            sort: true,
            search: true,
            data: [
                    @foreach($chuyen_mucs as $chuyen_muc)
                [
                    '{{ $chuyen_muc->id }}',
                    '{{ $chuyen_muc->ten_chuyen_muc }}',
                    '{{ $chuyen_muc->chuyenMucCha ? $chuyen_muc->chuyenMucCha->ten_chuyen_muc : "Không có" }}',
                    '{{ $chuyen_muc->trang_thai_text }}',
                ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));

        // Trạng thái ẩn hiện
        document.addEventListener('mouseover', function (e) {
            if (e.target.classList.contains('hover-status')) {
                const id = e.target.getAttribute('data-id');
                fetch(`/chuyen-muc/cap-nhat-trang-thai/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({})
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.thanh_cong) {
                            e.target.classList.toggle('bg-success-subtle', data.trangThaiMoi === 'Hiện');
                            e.target.classList.toggle('text-success', data.trangThaiMoi === 'Hiện');
                            e.target.classList.toggle('bg-danger-subtle', data.trangThaiMoi === 'Ẩn');
                            e.target.classList.toggle('text-danger', data.trangThaiMoi === 'Ẩn');
                            e.target.innerText = data.trangThaiMoi;
                        } else {
                            alert('Có lỗi xảy ra.');
                        }
                    });
            }
        });
    </script>


@endpush
