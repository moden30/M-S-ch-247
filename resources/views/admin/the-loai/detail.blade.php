@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <img src="{{ asset('assets/admin/images/products/img-8.png') }}" alt="" class="img-fluid d-block" />
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>Khoa học viễn tưởng</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="vr"></div>
                                            <div class="text-muted">Mã thể loại : <span class="text-body fw-medium">#00001</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày tạo : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ route('the-loai.edit') }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                    <div class="text-muted fs-16">
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                    </div>
                                    <div class="text-muted">( 6.368 mãi đỉnh )</div>
                                </div>

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Mô tả :</h5>
                                    <p>Khoa học viễn tưởng trong sách là một thể loại văn học hư cấu tập trung vào các ý tưởng về công nghệ và khoa học vượt xa hiện tại, thường dựa trên những gì có thể xảy ra trong tương lai hoặc trong các bối cảnh khác với thế giới thực.</p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Trạng thái :</h5>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked="">
                                                <label class="form-check-label" for="customSwitchsizelg">Ẩn / Hiện</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                                <h5 class="fs-14">Danh sách các sách thuộc thể loại :</h5>
                                            <table class="table table-nowrap mb-0 mt-3">

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
                                                            <a href="edit" class="btn btn-link p-0">Sửa |</a>
                                                            <a href="detail" class="btn btn-link p-0">Xem |</a>
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
                                                            <a href="edit" class="btn btn-link p-0">Sửa |</a>
                                                            <a href="detail" class="btn btn-link p-0">Xem |</a>
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
                                                            <a href="edit" class="btn btn-link p-0">Sửa |</a>
                                                            <a href="detail" class="btn btn-link p-0">Xem |</a>
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
                                                            <a href="edit" class="btn btn-link p-0">Sửa |</a>
                                                            <a href="detail" class="btn btn-link p-0">Xem |</a>
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
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!--Swiper slider css-->
<link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')

    <!-- ecommerce product details init -->
    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-details.init.js') }}"></script>
@endpush
