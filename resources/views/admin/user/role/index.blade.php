@extends('admin.layouts.app')
@section('start-point')
    Quản lý Quyền/Vai trò
@endsection
@section('title')
    Danh sách thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Khởi tạo vai trò mới</h5>

                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
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
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
{{--                        <form action="{{ route('the-loai.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="filter-choices-input mt-3">--}}
{{--                                <label class="form-label">Vai trò</label>--}}
{{--                                <input class="form-control @error('ten_vai_tro') is-invalid @enderror" type="text"--}}
{{--                                       name="ten_vai_tro" value="{{ old('ten_vai_tro') }}">--}}
{{--                            </div>--}}
{{--                            <div class=" mt-3">--}}
{{--                                <label class="form-label">Ảnh đại diện</label>--}}
{{--                                <input class="form-control @error('anh_the_loai') is-invalid @enderror" type="file"--}}
{{--                                       name="anh_the_loai">--}}
{{--                            </div>--}}
{{--                            <div class="filter-choices-input mt-3">--}}
{{--                                <label class="form-label">Mô tả</label>--}}
{{--                                <textarea class="form-control @error('mo_ta') is-invalid @enderror" id="" cols="15"--}}
{{--                                          rows="3" name="mo_ta">{{ old('mo_ta') }}</textarea>--}}
{{--                            </div>--}}
{{--                            <div class="filter-choices-input mt-3">--}}
{{--                                <label class="form-label">Trạng thái @error('trang_thai') is-invalid @enderror</label>--}}
{{--                                <div class="form-check form-switch">--}}
{{--                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">--}}
{{--                                    <input type="hidden" name="trang_thai" id="trang_thai_hidden" value="Ẩn">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="filter-choices-input mt-3">--}}
{{--                                <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                        <form action="{{ route('the-loai.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Vai trò</label>
                                <input class="form-control @error('ten_vai_tro') is-invalid @enderror" type="text"
                                       name="ten_vai_tro" value="{{ old('ten_vai_tro') }}">
                            </div>

                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả</label>
                                <textarea class="form-control @error('mo_ta') is-invalid @enderror" cols="15" rows="3" name="mo_ta">{{ old('mo_ta') }}</textarea>
                            </div>

                            <!-- Danh sách các quyền -->
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Quyền</label>
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       id="permission_{{ $permission->id }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->ten_quyen }} <!-- Hiển thị tên quyền -->
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>
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
        <!-- end col -->        </div>
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

        document.addEventListener('DOMContentLoaded', function () {
            var checkbox = document.getElementById('SwitchCheck3');
            var hiddenInput = document.getElementById('trang_thai_hidden');
            hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            checkbox.addEventListener('change', function () {
                hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const theLoais = @json($theLoais);
            const roles = @json($roles);
            new gridjs.Grid({
                columns: [
                    {
                        name: "Vai trò", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('the-loai.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('the-loai.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('the-loai.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                    <form action="${deleteUrl}" method="post">
                                    @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa!')">Xóa</button>
                           </form>
                       </div>
                       `);
                        }
                    },
                    {
                        name: "Mô tả", width: "50%",
                        // formatter: (param) => {
                        //     return gridjs.html()
                        // }
                    },
                    {
                        name: "Trạng thái", width: "auto",
                        formatter: function (param) {
                            return gridjs.html(`<div class="fs-6 badge ${param === 'hien' ? 'bg-success' : 'bg-danger'}">${param === 'hien' ? 'Hiện' : 'Ẩn'}</div>`);
                        }
                    },
                ],
                data: roles.map((role) => {
                    return [
                        role.ten_vai_tro,
                        role.mo_ta,
                        role.trang_thai,
                    ];
                }),
                pagination: {limit: 5},
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });
    </script>
@endpush
