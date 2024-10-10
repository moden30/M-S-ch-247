@extends('admin.layouts.app')
@section('start-point')
    Quản lý cộng tác viên
@endsection
@section('title')
    Tài khoản cộng tác viên: {{ $user->ten_doc_gia }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card" id="contact-view-detail">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        @php
                            $hinhAnh = $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg');
                        @endphp
                        <img src="{{ $hinhAnh }}"
                             alt="Avatar"
                             class="avatar-lg rounded-circle img-thumbnail material-shadow">
                    </div>
                    <h5 class="mt-4 mb-1">{{ $user->ten_doc_gia }}</h5>
                    <p class="text-muted">Cộng Tác Viên</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td class="fw-medium" scope="row">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Số Điện Thoại</td>
                                <td>{{ $user->so_dien_thoai }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Giới Tính</td>
                                <td>{{ $user->gioi_tinh }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Ngày Tháng Năm Sinh</td>
                                <td>{{ $user->sinh_nhat }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Số Dư</td>
                                <td>{{ $user->so_du }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Địa Chỉ</td>
                                <td>{{ $user->dia_chi }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <div class="col-xl-8">
            <h5>Sách</h5>
            @foreach($sach as $sach)
                <div class="card product">
                    <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}" alt=""
                                             style="width: 95px; height: 90px;"
                                             class="img-fluid d-block">
                                    </div>

                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">{{ $sach->ten_sach }}</a></h5>
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item">
                                            <p class="text-muted mb-0 d-inline">Giá Sách:</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="fs-14 mb-0 d-inline"><span id="ticket_price" class="product-price">{{ number_format($sach->gia_goc) }}</span> VNĐ</h5>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary" onclick="window.location.href='{{ route('sach.show', ['sach' => $sach->id]) }}'">Xem Sách</button>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        <li  class="list-inline-item text-muted">Ngày Đăng : <span class="fw-medium">{{ $sach->created_at = \Carbon\Carbon::parse($sach->created_at)->format('d-m-Y') }}</span></li>
                                    </div>

                                </div>
                                <div class="col-sm-auto text-end">

                                </div>
                            </div>
                    </div>
                    <!-- end card footer -->
                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('styles')
    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- ecommerce product details init -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-details.init.js') }}"></script>
@endpush
