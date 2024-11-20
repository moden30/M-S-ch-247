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
                                                        <span
                                                            class="badge bg-primary">{{ $vai_tro->ten_vai_tro }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="date">{{ $user->created_at->diffForHumans() }}</td>
{{--                                            <td class="status">--}}
{{--                                                @if ($user->hasRole(1) || auth()->user()->id === $user->id)--}}
{{--                                                @else--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button--}}
{{--                                                            class="btn {{ $user->trang_thai === 'hoat_dong' ? 'btn-success' : 'btn-danger' }} btn-sm dropdown-toggle"--}}
{{--                                                            type="button" data-bs-toggle="dropdown"--}}
{{--                                                            aria-expanded="false"--}}
{{--                                                            id="status-{{ $user->id }}">--}}
{{--                                                            {{ $user->trang_thai === 'hoat_dong' ? 'Kích hoạt' : 'Khoá' }}--}}
{{--                                                        </button>--}}

{{--                                                        <ul class="dropdown-menu">--}}
{{--                                                            @if ($user->trang_thai === 'hoat_dong')--}}
{{--                                                                <li><a class="dropdown-item" href="#"--}}
{{--                                                                       onclick="showModal({{ $user->id }}, 'khoa')">Khoá</a>--}}
{{--                                                                </li>--}}
{{--                                                            @else--}}
{{--                                                                <li><a class="dropdown-item" href="#"--}}
{{--                                                                       onclick="showModal({{ $user->id }}, 'hoat_dong')">Kích--}}
{{--                                                                        hoạt</a></li>--}}
{{--                                                            @endif--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            </td>--}}
                                            <td class="status">
                                                @if ($user->hasRole(1) || auth()->user()->id === $user->id)
                                                @else
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn {{ $user->trang_thai === 'hoat_dong' ? 'btn-success' : 'btn-danger' }} btn-sm dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                            id="status-{{ $user->id }}">
                                                            {{ $user->trang_thai === 'hoat_dong' ? 'Kích hoạt' : 'Khoá' }}
                                                        </button>

                                                        <ul class="dropdown-menu">
                                                            @if ($user->trang_thai === 'hoat_dong')
                                                                <li><a class="dropdown-item" href="#"
                                                                       onclick="showModal({{ $user->id }}, 'khoa')">Khoá</a></li>
                                                            @else
                                                                <li><a class="dropdown-item" href="#"
                                                                       onclick="showModal({{ $user->id }}, 'hoat_dong')">Kích hoạt</a></li>
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


                    @include('admin.user.includes.add-modal')
                    @include('admin.user.includes.edit-modal')

                    <!-- Modal -->
                    <div class="modal fade" id="confirmBlockModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="blockUserForm">
                                    <input type="hidden" name="user_id" id="id_user_to_block">
                                    <input type="hidden" name="status" value="khoa">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận khóa tài khoản</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div style="margin-bottom: 3.5%">
                                                    <label class="form-label">Nhập lý do khoá:</label>
                                                    <textarea class="form-control" name="reason" id="" cols="30"
                                                              rows="10"></textarea>
                                                </div>
                                                <div>
                                                    <label class="form-label">Nhập mật khẩu tài khoản của bạn</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="submitChangeStatus('block')">Khóa tài khoản</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmActiveModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="activeUserForm">
                                    <input type="hidden" name="user_id" id="id_user_to_active">
                                    <input type="hidden" name="status" value="hoat_dong">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận mở khóa tài khoản</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
{{--                                                <div style="margin-bottom: 3.5%">--}}
{{--                                                    <label class="form-label">Nhập lý do khoá:</label>--}}
{{--                                                    <textarea class="form-control" name="" id="" cols="30"--}}
{{--                                                              rows="10"></textarea>--}}
{{--                                                </div>--}}
                                                <div>
                                                    <label class="form-label">Nhập mật khẩu tài khoản của bạn</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="submitChangeStatus('active')">Mở tài khoản</button>
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
            const blockModal = new bootstrap.Modal('#confirmBlockModal')
            const activeModal = new bootstrap.Modal('#confirmActiveModal')

            //hàm xử lý thay đổi trạng thái
            let showModal = (id, status) => {
                if (status !== 'hoat_dong') {
                    if (confirm('Bạn muốn khóa tài khoản này ?')) {
                        document.getElementById('id_user_to_block').value = id
                        blockModal.show();
                    }
                }
                else {
                    if (confirm('Bạn xác nhận muốn mở lại tài khoản này ?')) {
                        document.getElementById('id_user_to_active').value = id
                        activeModal.show();
                    }
                }

            }

            function submitChangeStatus(action) {
                const modalId = action === 'block' ? '#confirmBlockModal' : '#confirmActiveModal';
                const modal = document.querySelector(modalId);

                // Lấy dữ liệu từ form
                const userId = modal.querySelector(action === 'block' ? '#id_user_to_block' : '#id_user_to_active').value;
                const reason = action === 'block' ? modal.querySelector('textarea[name="reason"]').value : null;
                const password = modal.querySelector('input[name="password"]').value;

                // Gửi AJAX request
                const status = action === 'block' ? 'khoa' : 'hoat_dong';
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                showLoader();

                fetch(`users/changeStatus/${userId}/${status}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        reason: reason,
                        password: password
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        hideLoader();
                        console.log(data)
                        if (data.success) {
                            // Cập nhật giao diện
                            updateUserStatusOnUI(userId, status);
                            $(modalId).modal('hide');
                            Swal.fire({
                                title: 'Hoàn tất.',
                                text: data.message,
                                icon: 'success'
                            })
                        } else {
                            Swal.fire({
                                title: 'Lỗi',
                                text: data.message,
                                icon: 'error'
                            })
                        }
                    })
                    .catch(error => {
                        hideLoader();
                        console.error('Error:', error);
                    });
            }

            function updateUserStatusOnUI(userId, newStatus) {
                const statusButton = document.getElementById(`status-${userId}`);

                // Cập nhật class và text của nút
                if (newStatus === 'hoat_dong') {
                    statusButton.classList.remove('btn-danger');
                    statusButton.classList.add('btn-success');
                    statusButton.innerText = 'Kích hoạt';
                } else {
                    statusButton.classList.remove('btn-success');
                    statusButton.classList.add('btn-danger');
                    statusButton.innerText = 'Khoá';
                }

                // Cập nhật dropdown menu
                const dropdownMenu = statusButton.nextElementSibling;
                dropdownMenu.innerHTML = newStatus === 'hoat_dong'
                    ? `<li><a class="dropdown-item" href="#" onclick="showModal(${userId}, 'khoa')">Khoá</a></li>`
                    : `<li><a class="dropdown-item" href="#" onclick="showModal(${userId}, 'hoat_dong')">Kích hoạt</a></li>`;
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
