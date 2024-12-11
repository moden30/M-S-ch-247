@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết : {{ $sach->ten_sach }}
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
                                    <div class="swiper-wrapper d-flex justify-content-center">
                                        <img src="{{ Storage::url($sach->anh_bia_sach) }}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    @if (Auth::check() && Auth::user()->hasPermission('chuong-create') && Auth()->user()->id == $sach->user_id)
                                        <div class="col-sm-4 mt-3">
                                            <a href="{{ route('chuong.create', $sach->id) }}"><button class="btn btn-success" type="submit">Thêm chương mới</button></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="d-flex">
                                            <h4 class="me-3">{{ $sach->ten_sach }}</h4>
                                        </div>
                                        <div class="row mb-3">
                                            <!-- First row -->
                                            <div class="col-md-4">
                                                <div class="text-muted">Tác giả :
                                                    <a href="" class="text-primary">{{ $sach->user->but_danh ? $sach->user->but_danh : $sach->user->ten_doc_gia }}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Thể loại :
                                                    <span class="text-body fw-medium">{{ $sach->TheLoai->ten_the_loai }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Ngày đăng :
                                                    <span class="text-body fw-medium">{{ \Carbon\Carbon::parse($sach->created_at)->format('d-m-Y') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <!-- Second row -->
                                            <div class="col-md-4">
                                                <div class="text-muted">Giá sách :
                                                    <span class="text-body fw-medium">{{ number_format($sach->gia_goc, 0, ',', '.') }} VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Trạng thái :
                                                    <span class="fs-5 {{ $sach->trang_thai === 'an' ? 'text-danger' : 'text-success' }}">
                                                        {{ $sach->trang_thai === 'an' ? 'Ẩn' : 'Hiện' }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted">Loại sách :
                                                    <span class="text-body fw-medium">{{ $sach->noi_dung_nguoi_lon === 'co' ? '18+' : '13+' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        @if (Auth::check() && Auth::user()->hasPermission('chuong-update') && Auth()->user()->id == $sach->user_id)
                                            <div>
                                                <a href="{{ route('sach.edit', $sach->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Tóm tắt :</h5>
                                    <p class="text-clamp" id="summary">{{ $sach->tom_tat }}</p>
                                    <div class="text-end">
                                        <button class="btn-toggle" id="toggleButton">Xem thêm</button>
                                    </div>
                                </div>

                                <div class="row mt-3">
                           <div class="d-flex row">
                               <div class="col-lg-3">
                                   <h5 class="fs-14">Danh sách :</h5>
                               </div>
                               <div class="col-lg-9">
                                   <form action="{{ route('sach.show', $sach->id) }}" method="GET" id="filterForm">
                                            <div class="d-flex justify-content-end gap-2">
                                           <div class="col-lg-3">
                                               <select class="form-select" name="kiem_duyet" id="kiemDuyetSelect">
                                                   <option value="all">Tất cả</option>
                                                   <option
                                                       value="cho_xac_nhan" {{ request('kiem_duyet') == 'cho_xac_nhan' ? 'selected' : '' }}>
                                                       Chờ xác nhận
                                                   </option>
                                                   <option
                                                       value="duyet" {{ request('kiem_duyet') == 'duyet' ? 'selected' : '' }}>
                                                       Duyệt
                                                   </option>
                                                   <option
                                                       value="tu_choi" {{ request('kiem_duyet') == 'tu_choi' ? 'selected' : '' }}>
                                                       Từ chối
                                                   </option>
                                               </select>
                                           </div>
                                           <div class="col-lg-2">
                                               <select class="form-select" name="trang_thai" id="trangThaiSelect">
                                                   <option value="all">Tất cả</option>
                                                   <option
                                                       value="hien" {{ request('trang_thai') == 'hien' ? 'selected' : '' }}>
                                                       Hiện
                                                   </option>
                                                   <option value="an" {{ request('trang_thai') == 'an' ? 'selected' : '' }}>
                                                       Ẩn
                                                   </option>
                                               </select>
                                           </div>
                                            </div>
                                   </form>
                                   <script>
                                       document.getElementById('kiemDuyetSelect').addEventListener('change', function () {
                                           document.getElementById('filterForm').submit();
                                       });

                                       document.getElementById('trangThaiSelect').addEventListener('change', function () {
                                           document.getElementById('filterForm').submit();
                                       });
                                   </script>
                               </div>
                           </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="table-gridjs"></div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="mt-5">

                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <h5 class="fs-14 mb-3">Đánh giá </h5>
                                            </div>
                                            <div>
                                                @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                    <div class="mt-3">
                                                        <div class="row align-items-center g-2 d-flex">
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0">{{ $mucDoHaiLong[$mucDo]['label'] }}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="p-2">
                                                                    <div class="progress animated-progress progress-sm w-100">
                                                                        @php
                                                                            $tongSoLuotDanhGia = \App\Models\DanhGia::where('sach_id', $id)->count();
                                                                            $count = count($danhGias);
                                                                            $tong = $tongSoLuotDanhGia > 0 ? ($count / $tongSoLuotDanhGia) * 100 : 0;
                                                                        @endphp
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format($tong, 2) }}%;" aria-valuenow="{{ number_format($tong, 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="p-2">
                                                                    <h6 class="mb-0 text-muted">{{ $count }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">
{{--                                                <div class="d-flex flex-wrap align-items-start gap-3">--}}
{{--                                                    <h5 class="fs-14">Chi tiết đánh giá: </h5>--}}
{{--                                                </div>--}}
                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($ketQuaDanhGia as $mucDo => $danhGias)
                                                            @foreach($danhGias as $danhGia)
                                                                <li class="py-2">
                                                                    <div class="border border-dashed rounded p-3">
                                                                        <div class="d-flex align-items-end">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 mb-0">{{ $danhGia['ten_nguoi_danh_gia'] }}</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted fs-13 mb-0">{{ \Carbon\Carbon::parse($danhGia['ngay_danh_gia'])->format('d-m-Y') }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="d-flex align-items-start mb-3">
                                                                            <div class="hstack gap-3">
                                                                                <div class="badge rounded-pill {{ $mucDoHaiLong[$mucDo]['colorClass'] }} mb-0">
                                                                                    <i class="mdi mdi-star"></i> {{ $mucDoHaiLong[$mucDo]['label'] }}
                                                                                </div>
                                                                                <div class="vr"></div>
                                                                                <div class="flex-grow-1">
                                                                                    <p class="text-muted mb-0">{{ $danhGia['noi_dung'] }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
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

    <div class="modal fade" id="confirmRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận từ chối</h5>
                </div>
                <div class="modal-body">
                    <label class="form-label">Nhập lý do từ chối:</label>
                    <textarea class="form-control" name="ly_do_tu_choi" id="ly_do_tu_choi" cols="30" rows="4" placeholder="Lý do từ chối..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="submitRejectStatus()">Thay đổi trạng thái</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">

@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chuongs = @json($chuongs);
            var canKiemDuyet = @json(Auth::user()->hasPermission('sach-kiemDuyet'));
            var canAnHien = @json(Auth::user()->hasPermission('sach-anHien'));
            new gridjs.Grid({
                columns: [
                    { name: "ID", hidden: true},
                    { name: "Chương", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('chuong.edit', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            var detailUrl = `{{ route('chuong.show', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            var deleteUrl = `{{ route('chuong.destroy', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', '{{ $sach->id }}').replace(':id', id);
                            var currentChuong = chuongs.find(chuong => chuong.id == id);
                            var canDelete = @json(Auth::user()->hasPermission('sach-destroy')) && @json(Auth::user()->id) == currentChuong.sach.user_id;
                            var canUpdate = @json(Auth::user()->hasPermission('sach-update')) && @json(Auth::user()->id) == currentChuong.sach.user_id;
                            var html = ` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">`;
                            if (canUpdate) {
                                html += `<a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>`
                            }
                            html += ` <a href="${detailUrl}" class="btn btn-link p-0">Xem </a>`;
                            if (canDelete) {
                                html += ` <form action="${deleteUrl}" method="post">
                                            @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa bản ghi!')">| Xóa</button>
                           </form>`
                            }
                            html += `</div>`;
                            return gridjs.html(html);
                        }},
                    { name: "Tiêu đề ", width: "auto"},
                    {
                        name: "Tình trạng kiểm duyệt", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'cho_xac_nhan': 'Chờ Xác Nhận',
                                'tu_choi': 'Từ Chối',
                                'duyet': 'Duyệt',
                                'ban_nhap': 'Bản Nháp'
                            };

                            let statusClass = '';
                            switch (lien) {
                                case 'cho_xac_nhan':
                                    statusClass = 'status-cho_xac_nhan';
                                    break;
                                case 'tu_choi':
                                    statusClass = 'status-tu_choi';
                                    break
                                case 'duyet':
                                    statusClass = 'status-duyet';
                                    break;
                                case 'ban_nhap':
                                    statusClass = 'status-ban_nhap';
                                    break;
                            }
                            var html = '';
                            if (canKiemDuyet) {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-toggle-split-before">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'cho_xac_nhan')">Chờ Xác Nhận</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'tu_choi')">Từ Chối</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'duyet')">Duyệt</a></li>
                                    </ul>
                                </div>
                            `;
                            } else {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                </div>
                            `;
                            }
                            return gridjs.html(html);
                        }
                    },
                    {
                        name: "Trạng thái", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'an': 'Ẩn',
                                'hien': 'Hiện'
                            };

                            let statusClass = lien === 'an' ? 'status-an' : 'status-hien';
                            var html = '';
                            if (canAnHien) {
                                html = `
                                <div class="btn-group btn-group-sm" id="visibility-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'an')">Ẩn</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'hien')">Hiện</a></li>
                                    </ul>
                                </div>
                            `;
                            } else {
                                html = `
                                <div class="btn-group btn-group-sm" id="visibility-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>

                                </div>
                            `;
                            }
                            return gridjs.html(html);
                        }
                    },
                ],
                data: chuongs.map(function(item) {
                    return [
                        item.id,
                        item.so_chuong,
                        item.tieu_de,
                        item.kiem_duyet,
                        item.trang_thai,
                    ];
                }),
                pagination: { limit: 5 },
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });


        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Xử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Xử lý chuyển đổi trạng thái Ẩn & Hiện
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái cập nhật chứ?')) {
                return;
            }
            fetch(`/admin/chuong/an-hien/${id}`, {
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
                            'an': 'Ẩn',
                            'hien': 'Hiện'
                        };
                        let statusClass = newStatus === 'an' ? 'status-an' : 'status-hien';
                        let statusButton = document.querySelector(`#visibility-status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#visibility-status-${id} .dropdown-toggle`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

        // Xử lý tình trạng kiểm duyệt
        function tinhKiemDuyet(id, newStatus) {
            if (newStatus === 'tu_choi') {
                document.getElementById('confirmRejectModal').setAttribute('data-id', id);
                document.getElementById('confirmRejectModal').setAttribute('data-status', newStatus);
                var modal = new bootstrap.Modal(document.getElementById('confirmRejectModal'));
                modal.show();
            } else if (newStatus === 'duyet') {
                const isConfirmed = confirm("Bạn có chắc chắn muốn thay đổi trạng thái thành 'Duyệt' không?");
                if (isConfirmed) {
                    updateStatus(id, newStatus);
                }
            } else {
                updateStatus(id, newStatus);
            }
        }

        function updateStatus(id, newStatus, rejectReason = null) {
            showLoader();
            fetch(`/admin/chuong/tinh-trang-cap-nhat/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus, ly_do_tu_choi: rejectReason })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'cho_xac_nhan': 'Chờ Xác Nhận',
                            'tu_choi': 'Từ Chối',
                            'duyet': 'Duyệt',
                        };
                        let statusClass = '';
                        switch (newStatus) {
                            case 'cho_xac_nhan':
                                statusClass = 'status-cho_xac_nhan';
                                break;
                            case 'tu_choi':
                                statusClass = 'status-tu_choi';
                                break;
                            case 'duyet':
                                statusClass = 'status-duyet';
                                break;
                        }

                        let statusButton = document.querySelector(`#update-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#update-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color;
                        hideLoader();
                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                        hideLoader();
                    }
                })
                .catch(error => {
                    console.error('Có lỗi xảy ra:', error);
                    alert('Đã xảy ra lỗi trong quá trình cập nhật trạng thái.');
                    hideLoader();
                });
        }

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
        document.addEventListener("DOMContentLoaded", function () {
            const summary = document.getElementById("summary");
            const toggleButton = document.getElementById("toggleButton");

            toggleButton.addEventListener("click", function () {
                if (summary.classList.contains("text-expanded")) {
                    // Thu gọn
                    summary.classList.remove("text-expanded");
                    toggleButton.textContent = "Xem thêm";
                } else {
                    // Mở rộng
                    summary.classList.add("text-expanded");
                    toggleButton.textContent = "Thu gọn";
                }
            });
        });


    </script>
    <style>
        .text-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            transition: all 0.3s ease;
            text-align: justify;
        }

        .text-expanded {
            -webkit-line-clamp: unset;
            overflow: visible;
        }
        .btn-toggle {
            background-color: transparent;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            margin-top: 10px;
            font-size: 14px;
        }
        .btn-toggle:hover {
            text-decoration: underline;
        }

        /* Màu của nút */
        .status-an {
            background-color: red; /* Màu đỏ cho trạng thái Ẩn */
            color: #fff;
        }

        .status-hien {
            background-color: green; /* Màu xanh cho trạng thái Hiện */
            color: #fff;
        }

        /* Giữ nguyên màu khi hover */
        .status-an:hover {
            background-color: red; /* Giữ nguyên màu đỏ cho nút trạng thái Ẩn */
            color: #fff;
        }

        .status-hien:hover {
            background-color: green; /* Giữ nguyên màu xanh cho nút trạng thái Hiện */
            color: #fff;
        }

        /* Màu nền dropdown */
        .status-an .dropdown-menu {
            background-color: red;
        }

        .status-hien .dropdown-menu {
            background-color: green;
        }

        /* Mũi tên của dropdown */
        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff;
        }


        /* Màu của nút của Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        .status-da_full:hover {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat:hover {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        /* Màu nền dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-menu {
            background-color: blue; /* Màu xanh cho Đã Full */
        }

        .status-tiep_tuc_cap_nhat .dropdown-menu {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
        }

        /* Mũi tên của dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-toggle::after,
        .status-tiep_tuc_cap_nhat .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Màu của nút cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        .status-cho_xac_nhan:hover {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi:hover {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet:hover {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap:hover {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        /* Màu nền dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-menu {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
        }

        .status-tu_choi .dropdown-menu {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
        }

        .status-duyet .dropdown-menu {
            background-color: green; /* Màu xanh cho Duyệt */
        }

        .status-ban_nhap .dropdown-menu {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
        }

        /* Mũi tên của dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-toggle::after,
        .status-tu_choi .dropdown-toggle::after,
        .status-duyet .dropdown-toggle::after,
        .status-ban_nhap .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

    </style>

    <style>
        .col-auto {
            flex: 0 0 80px; /* Giảm chiều rộng của cột chứa tiêu đề và số lượng đánh giá để dành nhiều không gian cho thanh tiến trình */
        }

        .progress {
            width: 100%; /* Đảm bảo thanh tiến trình chiếm toàn bộ chiều rộng của cột */
            height: 5px; /* Chiều cao cho thanh tiến trình */
        }

        .p-2 {
            padding: 8px; /* Điều chỉnh khoảng cách padding */
        }

        .mt-3 {
            margin-top: 6px; /* Khoảng cách giữa các mục */
        }


    </style>


@endpush
