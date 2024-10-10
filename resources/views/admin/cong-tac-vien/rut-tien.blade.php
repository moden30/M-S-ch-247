@extends('admin.layouts.app')

@section('title', 'Rút tiền')

@section('content')

<div class="container mt-5">
    <div class="card shadow p-4">
        <!-- Giao diện chính -->
        <h2 class="text-center mb-4"><i class="bx bx-wallet text-primary"></i> 2.000.000</h2>

        <!-- Trigger Button -->
        <div class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                Rút tiền
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="#" autocomplete="off">
                        <div class="text-center pt-4 pb-2">
                            <h4>Rút tiền</h4>
                        </div>
                        <div class="modal-body">
                            <div class="mb-4">
                                <h5 class="mb-3">Thông tin rút tiền</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="bank-name-input">Tên ngân hàng</label>
                                    <select class="form-control" id="bank-name-input" required>
                                        <option value="">Chọn ngân hàng</option>
                                        <option value="bank1">Bank 1</option>
                                        <option value="bank2">Bank 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="account-number-input">Số thẻ</label>
                                    <input type="text" class="form-control" id="account-number-input" placeholder="xxxx.xxxx.xx" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="recipient-name-input">Tên chủ tài khoản</label>
                                    <input type="text" class="form-control" id="recipient-name-input" placeholder="VD:NGUYEN VAN A" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="amount-input">Số tiền muốn rút</label>
                                    <select class="form-control" id="amount-input" required>
                                        <option value="">Chọn mốc</option>
                                        <option value="500000">500,000</option>
                                        <option value="1000000">1,000,000</option>
                                        <option value="2000000">2,000,000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <button type="submit" class="btn btn-success">Xác nhận rút tiền</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="row mt-5"></div>
        <div class="table-responsive table-card">
            <table class="table table-nowrap table-striped-columns mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck">
                                <label class="form-check-label" for="cardtableCheck"></label>
                            </div>
                        </th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
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
                        <td><a href="#" class="fw-semibold">#VL2110</a></td>
                        <td>William Elmore</td>
                        <td>07 Oct, 2021</td>
                        <td>$24.05</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-light">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck02">
                                <label class="form-check-label" for="cardtableCheck02"></label>
                            </div>
                        </td>
                        <td><a href="#" class="fw-semibold">#VL2109</a></td>
                        <td>Georgie Winters</td>
                        <td>07 Oct, 2021</td>
                        <td>$26.15</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-light">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck03">
                                <label class="form-check-label" for="cardtableCheck03"></label>
                            </div>
                        </td>
                        <td><a href="#" class="fw-semibold">#VL2108</a></td>
                        <td>Whitney Meier</td>
                        <td>06 Oct, 2021</td>
                        <td>$21.25</td>
                        <td><span class="badge bg-danger">Refund</span></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-light">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cardtableCheck04">
                                <label class="form-check-label" for="cardtableCheck04"></label>
                            </div>
                        </td>
                        <td><a href="#" class="fw-semibold">#VL2107</a></td>
                        <td>Justin Maier</td>
                        <td>05 Oct, 2021</td>
                        <td>$25.03</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-light">Details</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>







    </div>
</div>

@endsection

@push('scripts')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
