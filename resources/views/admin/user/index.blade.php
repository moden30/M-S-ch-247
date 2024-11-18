@extends('admin.layouts.app')
@section('start-point')
    Quản lý thành viên
@endsection
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="customerList">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <ul class="nav d-flex">
                                    <li class="nav-item p-1"><a href="{{ route('users.index') }}">Tất cả</a> |</li>
                                    @foreach ($roles_counts as $roles_count)
                                        @if($roles_count->id === \App\Models\VaiTro::ADMIN_ROLE_ID)

                                        @else
                                            <li class="nav-item p-1">
                                                <a href="{{ route('users.index', ['role_id' => $roles_count->id]) }}">{{ $roles_count->ten_vai_tro }}
                                                    ({{ $roles_count->user_count }})
                                                </a>
                                                @if (!$loop->last)
                                                    |
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>Thêm người dùng mới
                                </button>
                                {{--                                <button type="button" class="btn btn-info"><i --}}
                                {{--                                        class="ri-file-download-line align-bottom me-1"></i>Nhập excel --}}
                                {{--                                </button> --}}
                                {{--                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" --}}
                                {{--                                        id="create-btn" data-bs-target="#exampleModalCenter"><i --}}
                                {{--                                        class="ri-add-line align-bottom me-1"></i>Tdâdwmới --}}
                                {{--                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                           placeholder="Nhập tên, email, vai trò...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-6">
                                <div class="row g-3">
                                    {{--                                    <div class="col-sm-4"> --}}
                                    {{--                                        <div class=""> --}}
                                    {{--                                            <input type="text" class="form-control" id="datepicker-range" --}}
                                    {{--                                                   data-provider="flatpickr" data-date-format="d M, Y" --}}
                                    {{--                                                   data-range-date="true" --}}
                                    {{--                                                   placeholder="Select date"> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    {{--                                    <!--end col--> --}}
                                    {{--                                    <div class="col-sm-4"> --}}
                                    {{--                                        <div> --}}
                                    {{--                                            <select class="form-control" data-plugin="choices" data-choices --}}
                                    {{--                                                    data-choices-search-false name="choices-single-default" --}}
                                    {{--                                                    id="idStatus"> --}}
                                    {{--                                                <option value="">Vai trò</option> --}}
                                    {{--                                                <option value="all" selected>All</option> --}}
                                    {{--                                                <option value="Kích hoạt">Kích hoạt</option> --}}
                                    {{--                                                <option value="Block">Block</option> --}}
                                    {{--                                            </select> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <!--end col-->

                                    {{--                                    <div class="col-sm-4"> --}}
                                    {{--                                        <div> --}}
                                    {{--                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> --}}
                                    {{--                                                <i class="ri-equalizer-fill me-2 align-bottom"></i>Lọc --}}
                                    {{--                                            </button> --}}
                                    {{--                                        </div> --}}
                                    {{--                                    </div> --}}
                                    <!--end col-->
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-1">
                            <table class="table align-middle" id="customerTable">
                                <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                   value="option">
                                        </div>
                                    </th>

                                    <th class="sort" data-sort="customer_name">Tên khách hàng</th>
                                    <th class="sort" data-sort="email">Email</th>
                                    <th class="sort" data-sort="phone">Vai trò</th>
                                    <th class="sort" data-sort="date">Ngày tham gia</th>
                                    <th class="sort" data-sort="status">Trạng thái</th>
{{--                                    <th class="sort" data-sort="action">Hành động</th>--}}
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach ($users as $user)
                                    @if($user->hasRole(\App\Models\VaiTro::ADMIN_ROLE_ID))

                                    @else
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                           value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                                                    class="fw-medium link-primary">#VZ2101</a>
                                            </td>
                                            <td class="customer_name">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img
                                                            src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                            alt="" class="avatar-xs rounded-circle"/>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold">{{ $user->ten_doc_gia }}</span>
                                                        @if($user->vai_tros->contains('id', 4))
                                                            <div class="d-flex mt-2">
                                                                <a href="{{ route('chi-tiet-ctv', ['id' => $user->id]) }}"
                                                                   class="btn btn-link p-0">Chi tiết</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="email">{{ $user->email }}</td>
                                            <td class="phone">
                                                @if ($user->vai_tros->isNotEmpty())
                                                    @foreach ($user->vai_tros as $vai_tro)
                                                        <span class="badge bg-primary">{{ $vai_tro->ten_vai_tro }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="date">{{ $user->created_at->diffForHumans() }}</td>
                                            <td class="status">
                                                @if ($user->hasRole(1) || auth()->user()->id === $user->id)
                                                @else
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn {{ $user->trang_thai === 'hoat_dong' ? 'btn-success' : 'btn-danger' }} btn-sm dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                            id="status-{{ $user->id }}">
                                                            {{ $user->trang_thai === 'hoat_dong' ? 'Kích hoạt' : 'Khoá' }}
                                                        </button>

                                                        <ul class="dropdown-menu">
                                                            @if ($user->trang_thai === 'hoat_dong')
                                                                <li><a class="dropdown-item" href="#"
                                                                       onclick="changeStatus({{ $user->id }}, 'khoa')">Khoá</a>
                                                                </li>
                                                            @else
                                                                <li><a class="dropdown-item" href="#"
                                                                       onclick="changeStatus({{ $user->id }}, 'hoat_dong')">Kích
                                                                        hoạt</a></li>
                                                            @endif
                                                        </ul>


                                                    </div>
                                                @endif
                                            </td>
{{--                                            <td>--}}
{{--                                                <ul class="list-inline hstack gap-2 mb-0">--}}
{{--                                                    --}}{{-- <li class="list-inline-item edit" data-bs-toggle="tooltip"--}}
{{--                                                data-bs-trigger="hover" data-bs-placement="top" title="Edit">--}}
{{--                                                <a href="#showEditModal{{ $user->id }}" data-bs-toggle="modal"--}}
{{--                                                    class="text-primary d-inline-block edit-item-btn edit-btn"--}}
{{--                                                    data-id="{{ $user->id }}">--}}
{{--                                                    <i class="ri-pencil-fill fs-16"></i>--}}
{{--                                                </a>--}}
{{--                                            </li> --}}
{{--                                                    @if ($user->hasRole(1))--}}
{{--                                                    @elseif ($user->id === auth()->user()->id)--}}
{{--                                                    @else--}}
{{--                                                        <li class="list-inline-item" data-bs-toggle="tooltip"--}}
{{--                                                            data-bs-trigger="hover" data-bs-placement="top" title="Xoá">--}}
{{--                                                            --}}{{-- <a class="text-danger d-inline-block remove-item-btn"--}}
{{--                                                        data-bs-toggle="modal" href="#deleteRecordModal"--}}
{{--                                                        data-id="{{ $user->id }}">--}}
{{--                                                        <i class="ri-delete-bin-5-fill fs-16"></i>--}}
{{--                                                    </a> --}}
{{--                                                            <a class="btn btn-sm btn-danger" data-bs-toggle="modal"--}}
{{--                                                               href="#deleteRecordModal" data-id="{{ $user->id }}">--}}
{{--                                                                <i class="ri-delete-bin-5-fill fs-16"></i>--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endif--}}
{{--                                                </ul>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                               colors="primary:#121331,secondary:#08a88a"
                                               style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ customer We did not find
                                        any customer for you search.</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Trước
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Sau
                                </a>
                            </div>
                        </div>
                    </div>


                    <!-- Form thêm người dùng mới -->
                    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                </div>
                                <form action="{{ route('users.store') }}" enctype="multipart/form-data"
                                      autocomplete="on" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" id="id-field"/>

                                        <div class="mb-3" id="modal-id" style="display: none;">
                                            <label for="id-field1" class="form-label">ID</label>
                                            <input type="text" id="id-field1" class="form-control" placeholder="ID"
                                                   readonly/>
                                        </div>

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Tên người dùng</label>
                                            <input type="text" name="ten_doc_gia" id="customername-field"
                                                   class="form-control @error('ten_doc_gia') is-invalid @enderror"
                                                   placeholder="Nhập tên người dùng" value="{{ old('ten_doc_gia') }}"
                                                   required/>
                                            @error('ten_doc_gia')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="avarta-field" class="form-label">Ảnh đại diện</label>
                                            <input type="file" name="avatar" id="avarta-field"
                                                   class="form-control @error('avatar') is-invalid @enderror"/>
                                            @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 xin ">
                                            <label for="email-field" class="form-label">Email</label>
                                            <input type="email" name="email" id="email-field"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="Nhập email" value="{{ old('email') }}" required/>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender-field" class="form-label">Giới tính</label>
                                            <select class="form-control @error('gioi_tinh') is-invalid @enderror"
                                                    name="gioi_tinh" id="gender-field" required>
                                                <option value="Nam" @if (old('gioi_tinh') == 'Nam') selected @endif>
                                                    Nam
                                                </option>
                                                <option value="Nữ" @if (old('gioi_tinh') == 'Nữ') selected @endif>Nữ
                                                </option>
                                            </select>
                                            @error('gioi_tinh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone-field" class="form-label">Điện thoại</label>
                                            <input type="text" id="phone-field"
                                                   class="form-control @error('so_dien_thoai') is-invalid @enderror"
                                                   placeholder="Nhập số điện thoại" name="so_dien_thoai"
                                                   value="{{ old('so_dien_thoai') }}"/>
                                            @error('so_dien_thoai')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="address-field" class="form-label">Địa chỉ</label>
                                            <input type="text" id="address-field"
                                                   class="form-control @error('dia_chi') is-invalid @enderror"
                                                   placeholder="Nhập địa chỉ" name="dia_chi"
                                                   value="{{ old('dia_chi') }}"/>
                                            @error('dia_chi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-field" class="form-label">Mật khẩu</label>
                                            <input type="password" id="password-field"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   placeholder="Nhập mật khẩu." name="password"
                                                   value="{{ old('password') }}" required/>
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="status-field" class="form-label">Vai trò</label>
                                            <select class="form-control @error('vai_tro') is-invalid @enderror"
                                                    name="vai_tro" id="status-field" required>
                                                @foreach ($vai_tros as $vai_tro)
                                                    <option value="{{ $vai_tro->id }}"
                                                            @if (old('vai_tro') == $vai_tro->id) selected @endif>
                                                        {{ $vai_tro->ten_vai_tro }}</option>
                                                @endforeach
                                            </select>
                                            @error('vai_tro')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng
                                            </button>
                                            <button type="submit" class="btn btn-success" id="add-btn">
                                                Thêm mới
                                            </button>
                                            {{--                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End form thm người dùng mới -->

                    <!-- Form sửa người dùng -->
                    @foreach ($users as $user)
                        <div class="modal fade" id="showEditModal{{ $user->id }}" tabindex="-1"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form action="{{ route('users.update', $user->id) }}"
                                          id="edit-user-form-{{ $user->id }}" enctype="multipart/form-data"
                                          autocomplete="on" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="ten_doc_gia" class="form-label">Tên người dùng</label>
                                                <input type="text" name="ten_doc_gia" class="form-control"
                                                       value="{{ old('ten_doc_gia', $user->ten_doc_gia) }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                       value="{{ old('email', $user->email) }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                <select name="gioi_tinh" class="form-control" disabled>
                                                    <option value="Nam"
                                                            @if (old('gioi_tinh', $user->gioi_tinh) == 'Nam') selected @endif>
                                                        Nam
                                                    </option>
                                                    <option value="Nữ"
                                                            @if (old('gioi_tinh', $user->gioi_tinh) == 'Nữ') selected @endif>
                                                        Nữ
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                <input type="text" name="so_dien_thoai" class="form-control"
                                                       value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}"
                                                       readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="vai_tro" class="form-label">Vai trò</label>
                                                <select name="vai_tro" class="form-control">
                                                    @foreach ($vai_tros as $vai_tro)
                                                        <option value="{{ $vai_tro->id }}"
                                                                @if ($user->vai_tros->contains('id', $vai_tro->id)) selected @endif>
                                                            {{ $vai_tro->ten_vai_tro }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Đóng
                                            </button>
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End form sửa người dùng -->

                    <!-- Button trigger modal -->


                    <!-- Button trigger modal -->
                    {{--                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> --}}
                    {{--                        Launch demo modal --}}
                    {{--                    </button> --}}

                    <!-- Modal -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
                                        {{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                                        {{--                                        <span aria-hidden="true">&times;</span> --}}
                                        {{--                                    </button> --}}
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Nhập lý do khoá:</label>
                                                <textarea class="form-control" name="" id="" cols="30"
                                                          rows="10"></textarea>
                                                <label class="form-label">Nhập mật khẩu tài khoản của bạn</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng
                                        </button>
                                        <button type="button" class="btn btn-primary">Thay đổi trạng thái</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- Nút xoá -->
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                   colors="primary:#f7b84b,secondary:#f06548"
                                                   style="width:100px;height:100px"></lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>Bạn chắc chắn muốn xóa?</h4>
                                            <p class="text-muted mx-4 mb-0">Bạn có chắc chắn muốn xóa bản ghi này?</p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="user-id-to-delete">
                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng
                                        </button>
                                        <button type="button" class="btn w-sm btn-danger" id="delete-record">Xoá
                                            ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
@endsection

@push('styles')
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
    <script>
        const myModal = new bootstrap.Modal('#confirmDeleteModal')

        //hàm xử lý thay đổi trạng thái
        let changeStatus = (id, status) => {
            let x = confirm('Bạn chắc chứ ?');
            if (x) {
                if (status === 'khoa') {
                    myModal.show();
                } else {
                    fetch(`/admin/users/changeStatus/${id}/${status}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        },

                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            window.location.reload();
                        })
                        .catch(error => console.error('Error fetching user data:', error));
                }
            }
        }


        // Khi modal hiện lên, lấy ID từ nút đã được click và gán vào input ẩn
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.text-danger.d-inline-block.remove-item-btn');
            const deleteRecordModal = document.getElementById('deleteRecordModal');
            const userIdInput = document.getElementById('user-id-to-delete');

            // Xử lý khi nút xóa được click
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Lấy ID từ nút xóa
                    userIdInput.value = this.getAttribute('data-id'); // Gán ID vào input ẩn

                });
            });

            //Đổ dữ liệu cho form sửa
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let userId = this.getAttribute('data-id');
                    fetch(`users/${userId}/edit`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            // Hiển thị dữ liệu lên modal
                            document.getElementById('user-id').value = data.id;
                            document.getElementById('user-name').value = data
                                .ten_doc_gia;
                            document.getElementById('user-email').value = data.email;
                            document.getElementById('user-gender').value = data
                                .gioi_tinh;
                            document.getElementById('user-phone').value = data
                                .so_dien_thoai;
                            document.getElementById('user-address').value = data
                                .dia_chi;
                            // document.getElementById('user-role').value = data.vai_tro;

                            // Hiển thị modal
                            let modal = new bootstrap.Modal(document.getElementById(
                                `showEditModal${userId}`));
                            modal.show();
                        })
                        .catch(error => console.error('Error fetching user data:', error));
                    document.getElementById('edit-user-form').action = `users/${userId}`
                });
            });


            // Xử lý xóa khi nhấn nút xác nhận xóa
            // Xử lý xóa khi nhấn nút xác nhận
            document.getElementById('delete-record').addEventListener('click', function () {
                const userId = userIdInput.value;

                fetch(`users/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(errData => {
                                throw new Error(errData.message || 'Error occurred');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Người dùng đã được xóa thành công!');
                            location.reload(); // Reload trang để cập nhật danh sách người dùng
                        } else {
                            alert('Xóa người dùng không thành công: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting user:', error);
                        alert('Đã xảy ra lỗi khi xóa người dùng: ' + error.message);
                    });
                // Đóng modal sau khi xóa
                const modalInstance = bootstrap.Modal.getInstance(deleteRecordModal);
                modalInstance.hide();
            });
        });
    </script>

    <!-- list.js min js -->
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!--ecommerce-customer init js -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-customer-list.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
