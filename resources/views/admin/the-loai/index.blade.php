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
                        <form action="" method="post">
                            <div class="filter-choices-input">
                                <label class="form-label">Mã thể loại</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Tên thể loại</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả</label>
                                <input class="form-control" type="text">
                            </div>
                            <label class="form-check-label mt-3" for="SwitchCheck3">Trạng thái</label>
                            <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
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
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-md-auto ms-auto">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="text-muted ">Sắp xếp theo: </span>
                                    <select class="form-control mb-0" data-choices data-choices-search-false id="choices-single-default">
                                        <option value="Company">Sắp xếp</option>
                                        <option value="Company">Trạng thái</option>
                                        <option value="Name">Tăng dần</option>
                                        <option value="Company">Giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Tìm thể loại...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                            Tất cả<span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
                                            Đã xuất bản<span class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
                                            Bản nháp
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3 material-shadow-none" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="table-responsive table-card">
                            <table class="table table-nowrap mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                            <label class="form-check-label" for="cardtableCheck"></label>
                                        </div>
                                    </th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Ảnh đại diện</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Ngày đăng</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="fw-semibold text-primary">#VL2110</a>
                                        <div class="d-flex justify-content-start mt-2">
                                            <a href="{{ route('the-loai.edit') }}" class="btn btn-link p-0">Sửa |</a>
                                            <a href="{{ route('the-loai.detail') }}" class="btn btn-link p-0">Xem |</a>
                                            <a href="#" class="btn btn-link p-0 text-danger">Xóa</a>
                                        </div>
                                    </td>
                                    <td><img src="{{ asset('assets/admin/images/about.jpg') }}" width="50px"></td>
                                    <td>William Elmore</td>
                                    <td>William Elmore</td>
                                    <td>07 Oct, 2021</td>
                                    <td>$24.05</td>
                                    <td><span class="badge bg-success">Paid</span></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('js-page')

@endsection
