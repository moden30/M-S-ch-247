@extends('admin.layouts.app')
@section('start-point')
    Quản lý tài khoản
@endsection
@section('title')
    Danh sách tài khoản
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="customerList">
                <div class="card-header border-bottom-dashed">

                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Thành viên</h5>
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
                                <button type="button" class="btn btn-info"><i
                                        class="ri-file-download-line align-bottom me-1"></i>Nhập excel
                                </button>
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
                                           placeholder="Search for customer, email, phone, status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-6">
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="">
                                            <input type="text" class="form-control" id="datepicker-range"
                                                   data-provider="flatpickr" data-date-format="d M, Y"
                                                   data-range-date="true" placeholder="Select date">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-4">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                    data-choices-search-false name="choices-single-default"
                                                    id="idStatus">
                                                <option value="">Status</option>
                                                <option value="all" selected>All</option>
                                                <option value="Active">Active</option>
                                                <option value="Block">Block</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-sm-4">
                                        <div>
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                                <i class="ri-equalizer-fill me-2 align-bottom"></i>Filters
                                            </button>
                                        </div>
                                    </div>
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
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="" data-sort="action">Hành động</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach($users as $user)
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
                                            <img src="" alt="">
                                            {{$user->ten_doc_gia}}
                                        </td>
                                        <td class="email">{{$user->email}}</td>
                                        <td class="phone">@if($user->vai_tros->isNotEmpty())
                                                @foreach($user->vai_tros as $vai_tro)
                                                    <span class="badge bg-success">{{$vai_tro->ten_vai_tro}}</span>
                                                @endforeach
                                            @endif</td>
                                        <td class="date">{{$user->created_at}}</td>
                                        <td class="status">
                                            <span
                                                class="badge bg-success-subtle text-success text-uppercase cursor-lg-pointer">Active</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="#showEditModal" data-bs-toggle="modal"
                                                       class="text-primary d-inline-block edit-item-btn edit-btn" data-id="{{ $user->id }}">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                    <a class="text-danger d-inline-block remove-item-btn"
                                                       data-bs-toggle="modal" href="#deleteRecordModal"
                                                       data-id="{{$user->id}}">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
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
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
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
                                <form action="{{route('users.store')}}" enctype="multipart/form-data" autocomplete="on" method="post">
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
                                                   class="form-control"
                                                   placeholder="Enter name" required/>
                                            <div class="invalid-feedback">Please enter a customer name.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="avarta-field" class="form-label">Ảnh đại diện</label>
                                            <input type="file" name="avatar" id="avarta-field"
                                                   class="form-control"
                                                   placeholder="Enter name"/>
                                            <div class="invalid-feedback">Please enter a customer name.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email-field" class="form-label">Email</label>
                                            <input type="email" name="email" id="email-field" class="form-control"
                                                   placeholder="Enter email" required/>
                                            <div class="invalid-feedback">Please enter an email.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender-field" class="form-label">Giới tính</label>
                                            <select class="form-control" data-choices data-choices-search-false
                                                    name="gioi_tinh" id="gender-field" required>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone-field" class="form-label">Phone</label>
                                            <input type="text" id="phone-field" class="form-control"
                                                   placeholder="Enter phone no." name="so_dien_thoai"/>
                                            <div class="invalid-feedback">Please enter a phone.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address-field" class="form-label">Địa chỉ</label>
                                            <input type="text" id="address-field" class="form-control"
                                                   placeholder="Enter phone no." name="dia_chi"/>
                                            <div class="invalid-feedback">Location</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-field" class="form-label">Mật khẩu</label>
                                            <input type="password" id="password-field" class="form-control"
                                                   placeholder="Nhập mật khẩu." name="password" required/>
                                            <div class="invalid-feedback">Please enter a phone.</div>
                                        </div>
                                        <div>
                                            <label for="status-field" class="form-label">Vai trò</label>
                                            <select class="form-control" data-choices data-choices-search-false
                                                    name="vai_tro" id="status-field" required>
                                                @foreach($vai_tros as $vai_tro)
                                                    <option value="{{$vai_tro->id}}">{{$vai_tro->ten_vai_tro}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Add Customer
                                            </button>
                                            {{--                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>--}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End form thm người dùng mới -->

                    <!-- Form sửa người dùng -->
                    <div class="modal fade" id="showEditModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                </div>
                                <form action="#" id="edit-user-form" enctype="multipart/form-data" autocomplete="on" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3" id="modal-id">
                                            <label for="user-id" class="form-label">ID</label>
                                            <input type="text" id="user-id" class="form-control" placeholder="ID"
                                                   readonly/>
                                        </div>

                                        <div class="mb-3">
                                            <label for="user-name" class="form-label">Tên người dùng</label>
                                            <input type="text" name="ten_doc_gia" id="user-name"
                                                   class="form-control"
                                                   placeholder="Enter name" required/>
                                            <div class="invalid-feedback">Please enter a customer name.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="avarta-field" class="form-label">Ảnh đại diện</label>
                                            <input type="file" name="avatar" id="avarta-field"
                                                   class="form-control"
                                                   placeholder="Enter name"/>
                                            <div class="invalid-feedback">Please enter a customer name.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="user-email" class="form-label">Email</label>
                                            <input type="email" name="email" id="user-email" class="form-control"
                                                   placeholder="Enter email" required/>
                                            <div class="invalid-feedback">Please enter an email.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="user-gender" class="form-label">Giới tính</label>
                                            <select class="form-control" data-choices data-choices-search-false
                                                    name="gioi_tinh" id="user-gender" required>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="user-phone" class="form-label">Phone</label>
                                            <input type="text" id="user-phone" class="form-control"
                                                   placeholder="Enter phone no." name="so_dien_thoai"/>
                                            <div class="invalid-feedback">Please enter a phone.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="user-address" class="form-label">Địa chỉ</label>
                                            <input type="text" id="user-address" class="form-control"
                                                   placeholder="Enter phone no." name="dia_chi"/>
                                            <div class="invalid-feedback">Location</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="user-password" class="form-label">Mật khẩu</label>
                                            <input type="password" id="user-password" class="form-control"
                                                   placeholder="Nhập mật khẩu." name="password"/>
                                            <div class="invalid-feedback">Please enter a phone.</div>
                                        </div>
                                        <div>
                                            <label for="user-role" class="form-label">Vai trò</label>
                                            <select class="form-control" data-choices data-choices-search-false
                                                    name="vai_tro" id="user-role" required>
                                                @foreach($vai_tros as $vai_tro)
                                                    <option value="{{$vai_tro->id}}">{{$vai_tro->ten_vai_tro}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Dong
                                            </button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Sửa
                                            </button>
                                            {{--                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>--}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End form sửa người dùng -->

                    <!-- Modal -->
                    <!-- Nút xoá -->
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" id="deleteRecord-close"
                                            data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                   colors="primary:#f7b84b,secondary:#f06548"
                                                   style="width:100px;height:100px"></lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                            <h4>Bạn chắc chắn muốn xoá ?</h4>
                                            <p class="text-muted mx-4 mb-0">Bạn có chắc chắn muốn xoá bản ghi này
                                                ?</p>
                                        </div>
                                    </div>
                                    <input type="hidden" id="user-id-to-delete">
                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng
                                        </button>
                                        <button type="button" class="btn w-sm btn-danger" id="delete-record">Xoá ngay
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
        // Khi modal hiện lên, lấy ID từ nút đã được click và gán vào input ẩn
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.text-danger.d-inline-block.remove-item-btn');
            const deleteRecordModal = document.getElementById('deleteRecordModal');
            const userIdInput = document.getElementById('user-id-to-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Lấy ID từ nút xóa
                    userIdInput.value = this.getAttribute('data-id'); // Gán ID vào input ẩn
                });
            });

            //Đổ dữ liệu cho form sửa
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let userId = this.getAttribute('data-id');
                    fetch(`users/${userId}/edit`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data)
                            // Hiển thị dữ liệu lên modal
                            document.getElementById('user-id').value = data.id;
                            document.getElementById('user-name').value = data.ten_doc_gia;
                            document.getElementById('user-email').value = data.email;
                            document.getElementById('user-gender').value = data.gioi_tinh;
                            document.getElementById('user-phone').value = data.so_dien_thoai;
                            document.getElementById('user-address').value = data.dia_chi;
                            // document.getElementById('user-role').value = data.vai_tro;

                            // Hiển thị modal
                            let modal = new bootstrap.Modal(document.getElementById('showEditModal'));
                            modal.show();
                        })
                        .catch(error => console.error('Error fetching user data:', error));
                    document.getElementById('edit-user-form').action = `users/${userId}`
                });
            });


            // Xử lý xóa khi nhấn nút xác nhận xóa
            document.getElementById('delete-record').addEventListener('click', function () {
                // const userId = userIdInput.value;

                //Gửi yêu cầu xóa tới server (sử dụng AJAX hoặc form submit)
                fetch(`users/${userIdInput.value}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        alert('User deleted successfully!');
                        location.reload();
                    })
                    .catch(error => {
                        console.error('Error deleting user:', error);
                    });
                // Đóng modal sau khi xóa
                const modal = bootstrap.Modal.getInstance(deleteRecordModal);
                modal.hide();
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
