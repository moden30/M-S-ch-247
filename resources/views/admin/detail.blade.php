@extends('admin.layouts.app')
@section('start-point')
    Quản lý cộng tác viên
@endsection
@section('title')
    Chi tiết tài khoản cộng tác viên
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card" id="contact-view-detail">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-lg rounded-circle img-thumbnail material-shadow">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                    </div>
                    <h5 class="mt-4 mb-1">Tonya Noble</h5>
                    <p class="text-muted">Nesta Technologies</p>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-success-subtle text-success fs-15 rounded">
                                <i class="ri-phone-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                <i class="ri-mail-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-warning-subtle text-warning fs-15 rounded">
                                <i class="ri-question-answer-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
                    <p class="text-muted mb-4">Hello, I'm Tonya Noble, The most effective objective is one that is tailored to the job you are applying for. It states what kind of career you are seeking, and what skills and experiences.</p>
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td class="fw-medium" scope="row">Designation</td>
                                <td>Lead Designer / Developer</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Email ID</td>
                                <td>tonyanoble@velzon.com</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Phone No</td>
                                <td>414-453-5725</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Lead Score</td>
                                <td>154</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Tags</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Lead</span>
                                    <span class="badge bg-primary-subtle text-primary">Partner</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Last Contacted</td>
                                <td>15 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <div class="col-xl-8">
            <div class="row align-items-center gy-3 mb-3">
                <div class="col-sm">
                    <div>
                        <h5 class="fs-14 mb-0">Your Cart (03 items)</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <a href="apps-ecommerce-products.html" class="link-primary text-decoration-underline">Continue Shopping</a>
                </div>
            </div>

            <div class="card product">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-sm-auto">
                            <div class="avatar-lg bg-light rounded p-1">
                                <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block">
                            </div>
                        </div>
                        <div class="col-sm">
                            <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">Sweatshirt for Men (Pink)</a></h5>
                            <ul class="list-inline text-muted">
                                <li class="list-inline-item">Color : <span class="fw-medium">Pink</span></li>
                                <li class="list-inline-item">Size : <span class="fw-medium">M</span></li>
                            </ul>

                            <div class="input-step">
                                <button type="button" class="minus material-shadow">–</button>
                                <input type="number" class="product-quantity" value="2" min="0" max="100">
                                <button type="button" class="plus material-shadow">+</button>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="text-lg-end">
                                <p class="text-muted mb-1">Item Price:</p>
                                <h5 class="fs-14">$<span id="ticket_price" class="product-price">119.99</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-footer">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <div class="d-flex flex-wrap my-n1">
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove</a>
                                </div>
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center gap-2 text-muted">
                                <div>Total :</div>
                                <h5 class="fs-14 mb-0">$<span class="product-line-price">239.98</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card footer -->
            </div>
            <!-- end card -->

            <div class="card product">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-sm-auto">
                            <div class="avatar-lg bg-light rounded p-1">
                                <img src="assets/images/products/img-7.png" alt="" class="img-fluid d-block">
                            </div>
                        </div>
                        <div class="col-sm">
                            <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">Noise NoiseFit Endure Smart Watch</a></h5>

                            <ul class="list-inline text-muted">
                                <li class="list-inline-item">Color : <span class="fw-medium">Black</span></li>
                                <li class="list-inline-item">Size : <span class="fw-medium">32.5mm</span></li>
                            </ul>

                            <div class="input-step">
                                <button type="button" class="minus material-shadow">–</button>
                                <input type="number" class="product-quantity" value="1" min="0" max="100">
                                <button type="button" class="plus material-shadow">+</button>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="text-lg-end">
                                <p class="text-muted mb-1">Item Price:</p>
                                <h5 class="fs-14">$<span class="product-price">94.99</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-footer">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <div class="d-flex flex-wrap my-n1">
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove</a>
                                </div>
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center gap-2 text-muted">
                                <div>Total :</div>
                                <h5 class="fs-14 mb-0">$<span class="product-line-price">94.99</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card footer -->
            </div>
            <!-- end card -->

            <div class="card product">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-sm-auto">
                            <div class="avatar-lg bg-light rounded p-1">
                                <img src="assets/images/products/img-3.png" alt="" class="img-fluid d-block">
                            </div>
                        </div>
                        <div class="col-sm">
                            <h5 class="fs-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-body">350 ml Glass Grocery Container</a></h5>

                            <ul class="list-inline text-muted">
                                <li class="list-inline-item">Color : <span class="fw-medium">White</span></li>
                                <li class="list-inline-item">Size : <span class="fw-medium">350 ml</span></li>
                            </ul>

                            <div class="input-step">
                                <button type="button" class="minus material-shadow">–</button>
                                <input type="number" class="product-quantity" value="1" min="0" max="100">
                                <button type="button" class="plus material-shadow">+</button>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="text-lg-end">
                                <p class="text-muted mb-1">Item Price:</p>
                                <h5 class="fs-14">$<span class="product-price">24.99</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-footer">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <div class="d-flex flex-wrap my-n1">
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove</a>
                                </div>
                                <div>
                                    <a href="#" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center gap-2 text-muted">
                                <div>Total :</div>
                                <h5 class="fs-14 mb-0">$<span class="product-line-price">24.99</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card footer -->
            </div>
            <!-- end card -->


            <div class="text-end mb-4">
                <a href="apps-ecommerce-checkout.html" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Checkout</a>
            </div>
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
