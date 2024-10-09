@extends('admin.layouts.app')

@section('title', 'Ví')

@section('start-point')
    Rút tiền
@endsection

@push('styles')
    <style>
        .confirm-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .confirm-details h5 {
            font-size: 1.25rem;
            /* 20px */
            color: #333;
        }

        .confirm-details p {
            font-size: 1rem;
            /* 16px */
            color: #555;
            margin-bottom: 5px;
        }

        .confirm-action-buttons .btn {
            font-size: 1rem;
            padding: 10px 20px;
        }

        /* New styles for modal centering and size */
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-dialog {
            max-width: 500px;
            /* Adjust width here */
        }
    </style>
@endpush

@section('content')
    {{-- <div class="row justify-content-center">
    <div class="col-lg-10 d-flex justify-content-center">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#withdrawModal">
            Rút tiền
        </button>
    </div>
</div> --}}


    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="bg-warning-subtle position-relative">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                                Rút tiền
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="withdrawModalLabel">Rút tiền</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-steps" autocomplete="off">
                            <div class="text-center pt-3 pb-4 mb-1">
                                <h4>Rút tiền</h4>
                            </div>
                            <div id="custom-progress-bar" class="progress-nav mb-4">
                                <div class="progress" style="height: 1px;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-pill active" data-progressbar="custom-progress-bar"
                                            id="pills-gen-info-tab" data-bs-toggle="pill" data-bs-target="#pills-gen-info"
                                            type="button" role="tab" aria-controls="pills-gen-info"
                                            aria-selected="true">1</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                            id="pills-info-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-info-desc"
                                            type="button" role="tab" aria-controls="pills-info-desc"
                                            aria-selected="false">2</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                            id="pills-success-tab" data-bs-toggle="pill" data-bs-target="#pills-success"
                                            type="button" role="tab" aria-controls="pills-success"
                                            aria-selected="false">3</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel"
                                    aria-labelledby="pills-gen-info-tab">
                                    <div>
                                        <div class="mb-4">
                                            <h5 class="mb-1">Thông tin rút tiền</h5>
                                            <p class="text-muted">Nhập thông tin chi tiết để rút tiền của bạn bên dưới</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="bank-name-input">Tên ngân hàng</label>
                                                    <select class="form-control" id="bank-name-input" required>
                                                        <option value="">Chọn ngân hàng</option>
                                                        <option value="bank1">Bank 1</option>
                                                        <option value="bank2">Bank 2</option>
                                                        <!-- Add other banks as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="account-number-input">Số thẻ</label>
                                                    <input type="text" class="form-control" id="account-number-input"
                                                        placeholder="xxxx.xxxx.xx" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="recipient-name-input">Tên chủ tài
                                                        khoản</label>
                                                    <input type="text" class="form-control" id="recipient-name-input"
                                                        placeholder="VD:NGUYEN VAN A" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="amount-input">Tiền muốn rút</label>
                                                    <select class="form-control" id="amount-input" required>
                                                        <option value="">Chọn mốc</option>
                                                        <option value="500000">500,000</option>
                                                        <option value="1000000">1,000,000</option>
                                                        <option value="2000000">2,000,000</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button" class="btn btn-success btn-label right ms-auto nexttab"
                                                data-nexttab="pills-info-desc-tab">
                                                <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Go
                                                to
                                                confirmation
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="pills-info-desc" role="tabpanel"
                                    aria-labelledby="pills-info-desc-tab">
                                    <div class="text-center mb-4">
                                        <h5>Vui lòng xác nhận thông tin của bạn</h5>
                                    </div>
                                    <div class="confirm-details">
                                        <p><strong>Ngân hàng</strong> <span id="confirm-bank"></span></p>
                                        <p><strong>Số tài khoản:</strong> <span id="confirm-account-number"></span></p>
                                        <p><strong>Tên chủ tài khoản:</strong> <span id="confirm-recipient-name"></span>
                                        </p>
                                        <p><strong>Số tiền rút:</strong> <span id="confirm-amount"></span></p>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between align-items-center confirm-action-buttons mt-4">
                                        <button type="button"
                                            class="btn btn-link text-decoration-none btn-label previestab"
                                            data-previous="pills-gen-info-tab">
                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Quay lại
                                        </button>
                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab"
                                            data-nexttab="pills-success-tab">
                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Rút
                                        </button>
                                    </div>
                                </div>

                                <!-- end tab pane -->

                                <div class="tab-pane fade" id="pills-success" role="tabpanel"
                                    aria-labelledby="pills-success-tab">
                                    <div>
                                        <div class="text-center">
                                            <div class="mb-4">
                                                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                                    colors="primary:#0ab39c,secondary:#405189"
                                                    style="width:120px;height:120px"></lord-icon>
                                            </div>
                                            <h5>Gửi yêu cầu rút thành công!</h5>
                                            <p class="text-muted">Đơn hàng sẽ được xử lý trong 24h đến 48h</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Other contents and footer -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/pages/form-wizard.init.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('withdrawModal'));
            const nextTabButton = document.querySelector('.nexttab[data-nexttab="pills-info-desc-tab"]');
            const previousTabButton = document.querySelector('.previestab[data-previous="pills-gen-info-tab"]');

            nextTabButton.addEventListener('click', function() {
                if (validateInputs()) {
                    updateConfirmations(); // Cập nhật thông tin xác nhận
                    new bootstrap.Tab(document.querySelector('button[data-bs-target="#pills-info-desc"]'))
                        .show();
                } else {
                    alert('Vui lòng điền đầy đủ thông tin trước khi tiếp tục.');
                }
            });

            previousTabButton.addEventListener('click', function() {
                new bootstrap.Tab(document.querySelector('button[data-bs-target="#pills-gen-info"]'))
                    .show();
            });

            function validateInputs() {
                // Kiểm tra xem tất cả các trường input có giá trị chưa
                const bankName = document.getElementById('bank-name-input').value;
                const accountNumber = document.getElementById('account-number-input').value;
                const recipientName = document.getElementById('recipient-name-input').value;
                const amount = document.getElementById('amount-input').value;

                return bankName && accountNumber && recipientName && amount;
            }

            function updateConfirmations() {
                document.getElementById('confirm-bank').textContent = document.getElementById('bank-name-input')
                    .value;
                document.getElementById('confirm-account-number').textContent = document.getElementById(
                    'account-number-input').value;
                document.getElementById('confirm-recipient-name').textContent = document.getElementById(
                    'recipient-name-input').value;
                document.getElementById('confirm-amount').textContent = document.getElementById('amount-input')
                    .value;
            }
        });
    </script>
@endpush
