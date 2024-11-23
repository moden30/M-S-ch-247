@extends('admin.layouts.app')
@section('start-point')
    Yêu cầu tút tiền
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách yêu cầu rút tiền</h4>

                </div><!-- end card header -->

                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>

    <div class="modal fade" id="confirmRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận từ chối</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Lý do từ chối -->
                    <div class="mb-3">
                        <label for="ly_do_tu_choi" class="form-label">Nhập lý do từ chối:</label>
                        <textarea class="form-control" name="ly_do_tu_choi" id="ly_do_tu_choi" rows="4" placeholder="Lý do từ chối..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="submitRejectStatus()">Thay đổi trạng thái</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Duyệt -->
    <div class="modal fade" id="confirmApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận đã duyệt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ly_do_duyet" class="form-label">Nhập nội dung nếu có:</label>
                        <textarea class="form-control" name="ly_do_duyet" id="ly_do_duyet" rows="4" placeholder="Lý do duyệt (không bắt buộc)..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imageConfirm" class="form-label">Ảnh xác nhận đã giao dịch:</label>
                        <input type="file" class="form-control" id="imageConfirm" name="imageConfirm" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="submitApproveStatus()">Duyệt</button>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection

@push('styles')
    <!-- Sweet Alert css-->
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush

@push('scripts')
    <!-- list.js min js -->
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>

    <!--list pagination js-->
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>



    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [
                {
                    name: "STT",
                    hidden: true,
                },
                {
                    name: "Họ và tên",
                    width: "auto",
                    formatter: function (e, row) {
                        const id = row.cells[0].data;
                        const detailUrl = "{{ route('yeu-cau-rut-tien.show', ':id') }}".replace(':id', id);

                        return gridjs.html(`
                    <div class="flex-grow-1">
                        <span class="fw-semibold"> ${e}</span>
                    </div>
                    <div class="d-flex justify-content-start mt-2">
                        <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                    </div>
                `);
                    }
                },
                {
                    name: "Số tiền yêu cầu rút",
                    width: "auto",
                    formatter: function (e) {
                        const formattedPrice = Number(e).toLocaleString('vi-VN').replace(/\./g, ',').replace(/,/g, '.').replace(/\./g, ',');
                        return gridjs.html('<a>' + formattedPrice + ' VNĐ</a>');
                    }
                },
                {
                    name: "Số tiền sau khi yêu cầu rút hoàn thành",
                    width: "auto",
                    formatter: function (e, row) {
                        const userBalance = parseFloat(row.cells[3].data);
                        const requestedAmount = parseFloat(row.cells[2].data);
                        const remainingBalance = userBalance - requestedAmount;

                        const formattedBalance = Number(remainingBalance).toLocaleString('vi-VN').replace(/\./g, ',').replace(/,/g, '.').replace(/\./g, ',');

                        const balanceClass = remainingBalance < 0 ? 'text-danger' : '';
                        return gridjs.html(`<a class="${balanceClass}">${formattedBalance} VNĐ</a>`);
                    }
                },
                {
                    name: "Ngày yêu cầu",
                    width: "auto",
                    formatter: function (cell) {
                        const date = new Date(cell);
                        const formattedDate = date.toLocaleDateString('vi-VN', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        });
                        return gridjs.html(`<a >${formattedDate}</a>`);
                    }
                },
                {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function (lien, row) {
                        let trangThaiViet = {
                            'da_huy': 'Đã hủy',
                            'da_duyet': 'Đã duyệt',
                            'dang_xu_ly': 'Đang xử lý'
                        };

                        let statusClass = '';
                        switch (lien) {
                            case 'da_huy':
                                statusClass = 'status-da_huy';
                                break;
                            case 'da_duyet':
                                statusClass = 'status-da_duyet';
                                break;
                            case 'dang_xu_ly':
                                statusClass = 'status-dang_xu_ly';
                                break;
                        }

                        return gridjs.html(`
                    <div class="btn-group btn-group-sm" id="status-${row.cells[0].data}"
                        onmouseover="showStatusOptions(${row.cells[0].data})"
                        onmouseout="hideStatusOptions(${row.cells[0].data})">

                        <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                        <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                            <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'da_huy')">Đã hủy</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'da_duyet')">Đã duyệt</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'dang_xu_ly')">Đang xử lý</a></li>
                        </ul>
                    </div>
                `);
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                    @foreach ($danhSachYeuCau as $yeucau)
                [
                    '{{ $yeucau->id }}',
                    '{{ $yeucau->user->ten_doc_gia }}',
                    '{{ $yeucau->so_tien }}',
                    '{{ $yeucau->user->so_du }}',
                    '{{ $yeucau->created_at }}',
                    '{{ $yeucau->trang_thai }}',

                ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));
        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Sử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Sử lý chuyển đổi trạng thái
        function changeStatus(id, newStatus) {
            if (newStatus === 'da_huy') {
                // Trạng thái hủy: Mở modal từ chối
                document.getElementById('confirmRejectModal').setAttribute('data-id', id);
                document.getElementById('confirmRejectModal').setAttribute('data-status', newStatus);
                var modal = new bootstrap.Modal(document.getElementById('confirmRejectModal'));
                modal.show();
            } else if (newStatus === 'da_duyet') {
                // Trạng thái duyệt: Mở modal duyệt
                document.getElementById('confirmApproveModal').setAttribute('data-id', id);
                document.getElementById('confirmApproveModal').setAttribute('data-status', newStatus);
                var modal = new bootstrap.Modal(document.getElementById('confirmApproveModal'));
                modal.show();
            } else {
                if (!confirm('Bạn muốn thay đổi trạng thái rút tiền chứ?')) {
                    return;
                }
                updateStatus(id, newStatus);
            }
        }

        // Hàm xử lý cập nhật trạng thái với lý do từ chối
        function updateStatus(id, newStatus, reason = null) {
            showLoader();

            fetch(`/admin/rut-tien/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus, ly_do_tu_choi: reason })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let statusClass = '';
                        switch (newStatus) {
                            case 'da_huy':
                                statusClass = 'status-da_huy';
                                break;
                            case 'da_duyet':
                                statusClass = 'status-da_duyet';
                                break;
                            case 'dang_xu_ly':
                                statusClass = 'status-dang_xu_ly';
                                break;
                        }

                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = getStatusLabel(newStatus);

                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color;

                        hideLoader();
                        hideStatusOptions(id);
                    } else {
                        alert(data.message || 'Không thể cập nhật trạng thái này.');
                        hideLoader();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    hideLoader();
                });
        }

        // Hàm xử lý gửi lý do duyệt
        function submitApproveStatus() {
            let id = document.getElementById('confirmApproveModal').getAttribute('data-id');
            let newStatus = document.getElementById('confirmApproveModal').getAttribute('data-status');
            let approveReason = document.getElementById('imageConfirm').value.trim();

            if (!approveReason) {
                alert('Vui lòng chọn ảnh để xác nhận giao dịch.');
                return;
            }
            var modal = bootstrap.Modal.getInstance(document.getElementById('confirmApproveModal'));
            modal.hide();
            updateStatus(id, newStatus, approveReason);
        }

        // Hàm xử lý gửi lý do từ chối
        function submitRejectStatus() {
            let id = document.getElementById('confirmRejectModal').getAttribute('data-id');
            let newStatus = document.getElementById('confirmRejectModal').getAttribute('data-status');
            let rejectReason = document.getElementById('ly_do_tu_choi').value.trim();

            if (!rejectReason) {
                alert('Vui lòng nhập lý do từ chối.');
                return;
            }
            var modal = bootstrap.Modal.getInstance(document.getElementById('confirmRejectModal'));
            modal.hide();
            updateStatus(id, newStatus, rejectReason);
        }

        function getStatusLabel(status) {
            const statusLabels = {
                'da_huy': 'Đã hủy',
                'da_duyet': 'Đã duyệt',
                'dang_xu_ly': 'Đang xử lý'
            };
            return statusLabels[status] || 'Chưa xác định';
        }


    </script>

    <style>
        /* Màu của nút */
        .status-dang_xu_ly {
            background-color: #ffa500;
            color: #fff;
        }

        .status-da_duyet {
            background-color: green;
            color: #fff;
        }

        .status-da_huy {
            background-color: red;
            color: #fff;
        }

        .status-dang_xu_ly:hover {
            background-color: #ffa500;
            color: #fff;
        }

        .status-da_duyet:hover {
            background-color: green;
            color: #fff;
        }

        .status-da_huy:hover {
            background-color: red;
            color: #fff;
        }

        /*.status-da_huy .dropdown-menu {*/
        /*    background-color: red;*/
        /*}*/

        .btn-group-sm .btn {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            height: 1.5rem;
        }

        .dropdown-menu {
            font-size: 0.75rem;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 80px;
        }

    </style>
@endpush
