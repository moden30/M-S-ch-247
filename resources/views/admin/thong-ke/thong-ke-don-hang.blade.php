@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">ĐƠN HÀNG HÔM NAY</h4>
            <form action="{{ route('thong-ke-don-hang.thongKeDonHang') }}" method="GET"
                class="form-inline d-flex justify-content-end">
                <button type="button" class="btn btn-light mb-2" id="restoreButton" title="Khôi phục ngày">
                    <i id="restoreButton" class="ri-refresh-line"></i>
                </button>
                <div class="form-group mb-2 ps-3">
                    <label for="start_date" class="sr-only">Từ ngày</label>
                    <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="form-group  mb-2 ps-3 pe-3">
                    <label for="end_date" class="sr-only">Đến ngày</label>
                    <input type="date" class="form-control" name="end_date" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Xem Thống Kê</button>


                <script>
                    document.getElementById('restoreButton').addEventListener('click', function() {
                        window.location.href = window.location.pathname; // Chỉ lấy phần đường dẫn mà không có tham số truy vấn
                    });
                </script>

            </form>

