@extends('admin.layouts.app')
@section('start-point')
    Chi tiết
@endsection
@section('title')
    Biểu đồ
@endsection
@section('content')
    <div class="flex-grow-1 mb-3">
        <h4 class="fs-16 mb-1">Chào mừng, Quang Sơn<span
                class="text-danger d-none d-xl-inline-block ms-1 fw-medium user-name-text">
            </span></h4>
        <p class="text-muted mb-0">Khám phá không gian sáng tạo và chia sẻ tác phẩm của bạn tại Mê Sách 247!</p>
    </div>

    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle text-success rounded-2 fs-2">
                                        <i data-feather="dollar-sign" class="text-success"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Doanh số tổng</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>567.000 vnđ</span></h4>
                                        <span class="badge bg-danger-subtle text-danger fs-12"><i
                                                class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02 %</span>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Xem chi tiết</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle text-warning rounded-2 fs-2">
                                        <i data-feather="award" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Hoa hồng ước tính</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>300.00vnđ</span></h4>
                                        <span class="badge bg-success-subtle text-success fs-12"><i
                                                class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58 %</span>
                                    </div>
                                    <p class="text-muted mb-0">Xem chi tiết</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle text-info rounded-2 fs-2">
                                        <i data-feather="star" class="text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Đánh giá</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0"><span>40</span></h4>
                                        <span class="badge bg-danger-subtle text-danger fs-12"><i
                                                class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35 %</span>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Xem chi tiết</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="row">
                <div class="col-xxl-5">
                    <div class="d-flex flex-column h-100">
                        <div class="row h-100">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center"
                                            role="alert">
                                            <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i>
                                            <div class="flex-grow-1 text-truncate">
                                                Mọi tác phẩm đăng lên đều phải tuân thủ quy tắc mà admin đưa ra
                                            </div>

                                        </div>

                                        <div class="row align-items-end">
                                            <div class="col-sm-8">
                                                <div class="p-3">
                                                    <p class="fs-16 lh-base"><span style="font-size: 90%"
                                                            class="fw-semibold">Nếu vi phạm bạn có thể bị khoá truyện, nếu
                                                            tái phạm có thể bị khoá tài khoản vĩnh viễn<i
                                                                class="mdi mdi-arrow-right"></i></p>
                                                    <div class="mt-3">
                                                        <a href="pages-pricing.html" class="btn btn-success">Xem quy
                                                            định</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="px-3">
                                                    <img src="{{ asset('assets/admin/images/user-illustarator-2.png') }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Thông số khác</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Lượt xem</p>
                                                <h4 class="mt-4 ff-secondary cfs-22 fw-semibold">4360</h4>
                                                <p class="mb-0 text-muted text-truncate"><span
                                                        class="badge bg-light text-success mb-0"> <i
                                                            class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs.
                                                    previous month</p>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                        <i data-feather="eye" class="text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Yêu thích</p>
                                                <h4 class="mt-4 ff-secondary cfs-22 fw-semibold">5000</h4>
                                                <p class="mb-0 text-muted text-truncate"><span
                                                        class="badge bg-light text-danger mb-0"> <i
                                                            class="ri-arrow-down-line align-middle"></i> 3.96 % </span> vs.
                                                    previous month</p>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-danger-subtle rounded-circle fs-2">
                                                        <i data-feather="heart" class="text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div> <!-- end row-->



                    </div> <!-- end row-->
                </div>

                <div class="col-xxl-7">


                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between">
                            <!-- Select option bên trái -->
                            <select class="form-select form-select-sm w-auto">
                                <option selected>Chọn một lựa chọn</option>
                                <option value="1">Lựa chọn 1</option>
                                <option value="2">Lựa chọn 2</option>
                                <option value="3">Lựa chọn 3</option>
                            </select>

                            <!-- Nhóm chọn ngày và nút lọc bên phải -->
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control form-control-sm me-2" id="start-date">
                                <span>đến</span>
                                <input type="date" class="form-control form-control-sm ms-2 me-2" id="end-date">
                                <button class="btn btn-sm btn-primary">Lọc</button>
                            </div>
                        </div>


                        <div class="card-body">

                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">

                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Invoice</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#VZ2110</a></th>
                                                <td>Bobby Davis</td>
                                                <td>October 15, 2021</td>
                                                <td>$2,300</td>
                                                <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#VZ2110</a></th>
                                                <td>Bobby Davis</td>
                                                <td>October 15, 2021</td>
                                                <td>$2,300</td>
                                                <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#VZ2110</a></th>
                                                <td>Bobby Davis</td>
                                                <td>October 15, 2021</td>
                                                <td>$2,300</td>
                                                <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#VZ2110</a></th>
                                                <td>Bobby Davis</td>
                                                <td>October 15, 2021</td>
                                                <td>$2,300</td>
                                                <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>

                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#VZ2110</a></th>
                                                <td>Bobby Davis</td>
                                                <td>October 15, 2021</td>
                                                <td>$2,300</td>
                                                <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                                            </tr>
<br>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="d-none code-view">

                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->

                </div><!-- end col -->
            </div> <!-- end col-->


        </div> <!-- end row-->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tổng quan</h4>
                        <div>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary material-shadow-none btn-sm">
                                1Y
                            </button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-light-subtle">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="7585">0</span></h5>
                                    <p class="text-muted mb-0">Orders</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">$<span class="counter-value" data-target="22.89">0</span>k</h5>
                                    <p class="text-muted mb-0">Earnings</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="367">0</span></h5>
                                    <p class="text-muted mb-0">Refunds</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value"
                                            data-target="18.92">0</span>%</h5>
                                    <p class="text-muted mb-0">Conversation Ratio</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body p-0 pb-2">
                        <div class="w-100">
                            <div id="customer_impression_charts"
                                data-colors='["--vz-primary", "--vz-success", "--vz-danger"]'
                                data-colors-minimal='["--vz-light", "--vz-primary", "--vz-info"]'
                                data-colors-saas='["--vz-success", "--vz-info", "--vz-danger"]'
                                data-colors-modern='["--vz-warning", "--vz-primary", "--vz-success"]'
                                data-colors-interactive='["--vz-info", "--vz-primary", "--vz-danger"]'
                                data-colors-creative='["--vz-warning", "--vz-primary", "--vz-danger"]'
                                data-colors-corporate='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                data-colors-galaxy='["--vz-secondary", "--vz-primary", "--vz-primary-rgb, 0.50"]'
                                data-colors-classic='["--vz-light", "--vz-primary", "--vz-secondary"]'
                                data-colors-vintage='["--vz-success", "--vz-primary", "--vz-secondary"]'
                                class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->


            <!-- end col -->
        </div>
    </div><!-- end col -->
@endsection
