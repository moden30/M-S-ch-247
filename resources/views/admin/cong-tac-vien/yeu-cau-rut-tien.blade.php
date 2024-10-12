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
            columns: [{
                    name: "STT",
                    hidden: true,
                }, {
                    name: "Họ và tên",
                    width: "auto",
                    formatter: function(e, row) {
                        const id = row.cells[0].data;
                        const detailUrl = "{{ route('yeu-cau-rut-tien.show', ':id') }}".replace(':id', id);

                        return gridjs.html(`
                            <div class="flex-grow-1">
                                <span class="fw-semibold">  ${e}</span>
                            </div>
                            <div class="d-flex justify-content-start mt-2">
                                <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                            </div>
                        `);
                    }
                },
                {
                    name: "Email",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Số tiền",
                    width: "auto",
                    formatter: function(e) {
                        const formattedPrice = Number(e).toLocaleString('vi-VN').replace(/\./g, ',').replace(/,/g, '.').replace(/\./g, ',');
                        return gridjs.html('<a>' + formattedPrice + ' VNĐ</a>');
                    }
                },
                {
                    name: "Ngày yêu cầu",
                    width: "auto",
                    formatter: function(cell) {
                        const date = new Date(cell);
                        const formattedDate = date.toLocaleDateString('vi-VN', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        });
                        return gridjs.html(`<a >${formattedDate}</a>`);
                    }
                }, {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function (lien, row) {
                        let trangThaiViet = {
                            'da_huy' : 'Đã Hủy',
                            'da_duyet' : 'Đã Duyệt',
                            'dang_xu_ly' : 'Đang Xử Lý'
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
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'da_huy')">Đã Hủy</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'da_duyet')">Đã Duyệt</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'dang_xu_ly')">Đang Xử Lý</a></li>
                                   </ul>
                                </div>
                            `);
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                @foreach ($danhSachYeuCau as $yeucau)
                    [
                        '{{ $yeucau->id }}',
                        '{{ $yeucau->user->ten_doc_gia }}',
                        '{{ $yeucau->user->email }}',
                        '{{ $yeucau->so_tien }}',
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
            if (!confirm('Bạn muốn thay đổi trạng thái rút tiền chứ?')) {
                return;
            }

            fetch(`/admin/rut-tien/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({status: newStatus})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'da_huy' : 'Đã Hủy',
                            'da_duyet' : 'Đã Duyệt',
                            'dang_xu_ly' : 'Đang Xử Lý'
                        };

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

                        // Cập nhật nút trạng thái và màu sắc dropdown
                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color;

                        hideStatusOptions(id);

                        // Cập nhật số dư mới
                        if (data.new_balance) {
                            document.getElementById('soDu').textContent = data.new_balance;
                        }
                    } else {
                        alert(data.message || 'Không thể cập nhật trạng thái này.');
                    }
                })
        }


    </script>

    <style>
        /* Màu của nút */
        .status-dang_xu_ly {
            background-color: #B0B0B0;
            color: #fff;
        }

        .status-da_duyet {
            background-color: #28A745;
            color: #fff;
        }

        .status-da_huy {
            background-color: #DC3545;
            color: #fff;
        }

        .status-dang_xu_ly:hover {
            background-color: #9C9C9C;
            color: #fff;
        }

        .status-da_duyet:hover {
            background-color: #218838;
            color: #fff;
        }

        .status-da_huy:hover {
            background-color: #C82333;
            color: #fff;
        }

        .status-da_huy .dropdown-menu {
            background-color: #DC3545;
        }

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
