@extends('admin.layouts.app')
@section('start-point')
    Hồ sơ
@endsection
@section('title')
    Thông tin cá nhân
@endsection
@section('content')
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ Storage::url($user->hinh_anh) }}" class="profile-wid-img" alt="" id="profile-img-preview">
            {{--            <div class="overlay-content">--}}
            {{--                <div class="text-end p-3">--}}
            {{--                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">--}}
            {{--                        <input id="profile-foreground-img-file-input" type="file"--}}
            {{--                               class="profile-foreground-img-file-input">--}}
            {{--                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">--}}
            {{--                                    <i class="ri-image-edit-line align-bottom me-1"></i> Thay đổi bìa--}}
            {{--                        </label>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                            <img id="profile-image-preview"
                                 src="{{ (isset($user->hinh_anh)) ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                 class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow"
                                 alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                    <i class="ri-camera-fill"></i>
                </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1">{{ $user->ten_doc_gia }}</h5>
                        <p class="text-muted mb-0">
                            @foreach($user->vai_tros as $vaiTro)
                                {{ $vaiTro->ten_vai_tro }}@if(!$loop->last) @endif
                            @endforeach
                        </p>
                    </div>
                    @push('scripts')
                        <script>
                            document.getElementById('profile-img-file-input').addEventListener('change', function (event) {
                                const input = event.target;

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function (e) {
                                        // Cập nhật src của ảnh profile với ảnh mới đã chọn
                                        document.getElementById('profile-image-preview').src = e.target.result;
                                    }

                                    // Đọc file ảnh đã chọn
                                    reader.readAsDataURL(input.files[0]);
                                }
                            });

                        </script>
                    @endpush
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Hoàn thành hồ sơ của bạn</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('users.showProfile', $user->id) }}"
                               class="badge bg-light text-primary fs-12">
                                <i class="ri-edit-box-line align-bottom me-1"></i> Sửa
                            </a>
                        </div>
                    </div>
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $completion }}%;"
                             aria-valuenow="{{ $completion }}"
                             aria-valuemin="0" aria-valuemax="100">
                            <div class="label">{{ $completion }}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Chi tiết cá nhân
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i> Thay đổi mật khẩu
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
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
                            <form action="{{ route('users.updateProfile', $user->id) }}" method="post"
                                  enctype="multipart/form-data" id="profile-form">
                                @csrf
                                @method('PUT')
                                <input type="file" name="hinh_anh" id="hidden-profile-img-file-input"
                                       style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Họ và tên</label>
                                            <input type="text"
                                                   class="form-control @error('ten_doc_gia') is-invalid @enderror"
                                                   id="firstnameInput" name="ten_doc_gia" placeholder="Nhập họ và tên"
                                                   value="{{ old('ten_doc_gia', $user->ten_doc_gia) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Địa chỉ</label>
                                            <input type="text"
                                                   class="form-control @error('dia_chi') is-invalid @enderror"
                                                   id="lastnameInput" name="dia_chi" placeholder="Nhập địa chỉ"
                                                   value="{{ old('dia_chi', $user->dia_chi) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Số điện thoại</label>
                                            <input type="text"
                                                   class="form-control @error('so_dien_thoai') is-invalid @enderror"
                                                   id="phonenumberInput" name="so_dien_thoai"
                                                   placeholder="Nhập số điện thoại"
                                                   value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" id="emailInput" placeholder="Nhập email"
                                                   value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Ngày tham gia</label>
                                            <input type="text" class="form-control" data-provider="flatpickr"
                                                   id="JoiningdatInput"
                                                   value="{{ $user->created_at->format('H:i:s d-m-Y') }} ({{$user->created_at->diffForHumans()}})"
                                                   disabled/>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="designationInput" class="form-label">Sinh nhật</label>
                                            <input type="date"
                                                   class="form-control @error('sinh_nhat') is-invalid @enderror"
                                                   name="sinh_nhat" id="designationInput"
                                                   placeholder="Nhập ngày tháng năm sinh"
                                                   value="{{ old('sinh_nhat', $user->sinh_nhat) }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Giới tính</label>
                                            <select name="gioi_tinh" id=""
                                                    class="form-select @error('gioi_tinh') is-invalid @enderror">
                                                <option value="Nam"
                                                        {{ $user->gioi_tinh == 'Nam' ? 'selected' : '' }} @if (old('gioi_tinh') == 'Nam') selected @endif>
                                                    Nam
                                                </option>
                                                <option value="Nữ"
                                                        {{ $user->gioi_tinh == 'Nữ' ? 'selected' : '' }} @if (old('gioi_tinh') == 'Nữ') selected @endif>
                                                    Nữ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            <button type="reset" class="btn btn-soft-success">Hủy bỏ</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="{{ route('users.updatePassword', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Mật khẩu cũ*</label>
                                            <input type="password" name="old_password" class="form-control"
                                                   id="oldpasswordInput"
                                                   placeholder="Nập mật khẩu cũ">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">Mật khẩu mới*</label>
                                            <input type="password" name="new_password" class="form-control"
                                                   id="newpasswordInput"
                                                   placeholder="Nhập mật khẩu mới">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Nhập lại mật khẩu
                                                mới*</label>
                                            <input type="password" name="new_password_confirmation" class="form-control"
                                                   id="confirmpasswordInput"
                                                   placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                    </div>
                                    {{--                                    <div class="col-lg-12">--}}
                                    {{--                                        <div class="mb-3">--}}
                                    {{--                                            <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Thay đổi mật khẩu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <div class="float-end">
                                    <a href="javascript:void(0);" class="link-primary">Đăng xuất toàn bộ</a>
                                </div>
                                <h5 class="card-title">Lịch sử đăng nhập</h5>
                            </div>
                            @foreach($user->lich_su_dang_nhap as $item)
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">
                                            <i class="ri-macbook-line"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6>{{$item->ten_thiet_bi}}</h6>
                                        <p class="text-muted mb-0">{{$item->dia_diem}} - {{$item->login_time}}</p>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);">Đăng xuất</a>
                                    </div>
                                </div>
                            @endforeach
                            {{--                            <div class="d-flex align-items-center mb-3">--}}
                            {{--                                <div class="flex-shrink-0 avatar-sm">--}}
                            {{--                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">--}}
                            {{--                                        <i class="ri-tablet-line"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="flex-grow-1 ms-3">--}}
                            {{--                                    <h6>Apple iPad Pro</h6>--}}
                            {{--                                    <p class="text-muted mb-0">Washington, United States - November 06 at 10:43AM</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a href="javascript:void(0);">Đăng xuất</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="d-flex align-items-center mb-3">--}}
                            {{--                                <div class="flex-shrink-0 avatar-sm">--}}
                            {{--                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">--}}
                            {{--                                        <i class="ri-smartphone-line"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="flex-grow-1 ms-3">--}}
                            {{--                                    <h6>Galaxy S21 Ultra 5G</h6>--}}
                            {{--                                    <p class="text-muted mb-0">Conneticut, United States - June 12 at 3:24PM</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a href="javascript:void(0);">Đăng xuất</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="d-flex align-items-center">--}}
                            {{--                                <div class="flex-shrink-0 avatar-sm">--}}
                            {{--                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">--}}
                            {{--                                        <i class="ri-macbook-line"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="flex-grow-1 ms-3">--}}
                            {{--                                    <h6>Dell Inspiron 14</h6>--}}
                            {{--                                    <p class="text-muted mb-0">Phoenix, United States - July 26 at 8:10AM</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a href="javascript:void(0);">Đăng xuất</a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@push('scripts')
    <script>
        // Lắng nghe sự kiện khi người dùng chọn file
        document.getElementById('profile-img-file-input').addEventListener('change', function (event) {
            // Lấy file từ input bên ngoài form
            var file = event.target.files[0];

            // Gán file đó vào input ẩn bên trong form
            var hiddenFileInput = document.getElementById('hidden-profile-img-file-input');
            hiddenFileInput.files = event.target.files;
        });
    </script>
@endpush
