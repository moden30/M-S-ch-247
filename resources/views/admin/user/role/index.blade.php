@extends('admin.layouts.app')
@section('start-point')
    Quản lý Quyền/Vai trò
@endsection
@section('title')
    Danh sách thể loại
@endsection
@section('content')
    <div class="row">
        <!-- class="col-xl-9 col-lg-8" -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Vai trò</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button>
                                    <a href="{{ route('roles.create') }}" class="btn btn-success">Thêm vai trò mới</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
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
            var checkbox = document.getElementById('SwitchCheck3');
            var hiddenInput = document.getElementById('trang_thai_hidden');
            hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            checkbox.addEventListener('change', function() {
                hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const theLoais = @json($theLoais);
            const roles = @json($roles);
            new gridjs.Grid({
                columns: [{
                        name: "Vai trò",
                        width: "auto",
                        formatter: function(param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('the-loai.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('the-loai.show', ':id') }}`.replace(':id',
                                id);
                            var deleteUrl = `{{ route('the-loai.destroy', ':id') }}`.replace(':id',
                                id);
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
                        name: "Mô tả",
                        width: "50%",
                        // formatter: (param) => {
                        //     return gridjs.html()
                        // }
                    },
                    {
                        name: "Trạng thái",
                        width: "auto",
                        formatter: function(param) {
                            return gridjs.html(
                                `<div class="fs-6 badge ${param === 'hien' ? 'bg-success' : 'bg-danger'}">${param === 'hien' ? 'Hiện' : 'Ẩn'}</div>`
                            );
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
                pagination: {
                    limit: 5
                },
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });
    </script>
@endpush
