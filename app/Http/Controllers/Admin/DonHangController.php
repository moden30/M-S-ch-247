<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDonHang = DonHang::with(['sach', 'user', 'phuongThucThanhToan'])
            ->orderByDesc('id')
            ->get();
        // Tính đơn hàng
        // Tổng đơn hàng tuần này, dùng created_at để lấy thời gian của đơn hàng sau đó so sánh
        $tongDonHangTuanNay = DonHang::where('trang_thai', 'thanh_cong') // Lọc theo trạng thái đơn hàng có trạng thái là "thanh_cong"
        ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();
        // Tổng đơn hàng tuần trước, dùng created_at để lấy thời gian của đơn hàng sau đó so sánh
        $tongDongHangTuanTruoc = DonHang::where('trang_thai', 'thanh_cong') // Lọc theo trạng thái đơn hàng có trạng thái là "thanh_cong"
        ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->count();
        // Tính phần trăm
        $phanTram = 0;
        if ($tongDongHangTuanTruoc > 0) {
            $phanTram = (($tongDonHangTuanNay - $tongDongHangTuanTruoc) / $tongDongHangTuanTruoc) * 100;
        }

        // Tính doanh thu
        // Tổng doanh thu tuần này từ đơn hàng thành công
        $tongDoanhThuTuanNay = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->sum('so_tien_thanh_toan');
        // Tổng doanh thu tuần trước từ đơn hàng thành công
        $tongDoanhThuTuanTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->sum('so_tien_thanh_toan');

        // Hóa đơn chưa thanh toán
        // Tổng hóa đơn tuần này từ đơn hàng chưa thanh toán
        $hoaDonTuanNay = DonHang::where('trang_thai', 'dang_xu_ly')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();
        // Tổng hóa đơn tuần này trước đơn hàng chưa thanh toán
        $hoaDonTuanTruoc = DonHang::where('trang_thai', 'dang_xu_ly')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->count();

        // Hóa đơn hủy
        // Tổng hóa đơn tuần này từ trạng thái đơn hàng that_bai
        $hoaDonHuyTN = DonHang::where('trang_thai', 'that_bai')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();
        // Tổng hóa đơn tuần trước từ trạng thái đơn hàng that_bai
        $hoaDonHuyTC = DonHang::where('trang_thai', 'that_bai')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->count();

        return view('admin.don-hang.index', compact(
            'listDonHang',
            'tongDonHangTuanNay',
            'tongDongHangTuanTruoc',
            'phanTram',
            'tongDoanhThuTuanNay',
            'tongDoanhThuTuanTruoc',
            'hoaDonTuanNay',
            'hoaDonTuanTruoc',
            'hoaDonHuyTN',
            'hoaDonHuyTC',
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonHang $donHang)
    {

        return view('admin.don-hang.detail', compact('donHang'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonHang $donHang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonHang $donHang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonHang $donHang)
    {
        //
    }
}
