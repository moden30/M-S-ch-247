<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Quyền truy cập view index
        $this->middleware('permission:don-hang-index')->only('index');

        // Quyền truy cập view detail
        $this->middleware('permission:don-hang-detail')->only('show');

    }

    public function index()
    {
        $listDonHang = DonHang::with(['sach.theLoai', 'user', 'phuongThucThanhToan']) // Add the relationship path to the eager load
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
        } elseif ($tongDongHangTuanTruoc == 0) {
            $phanTram = $tongDonHangTuanNay > 0 ? 100 : 0;
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

    public function notificationDonHang($id = null)
    {
        if ($id) {
            $listDonHang = DonHang::with(['sach.theLoai', 'user', 'phuongThucThanhToan'])
                ->where('id', $id)
                ->get();

            if ($listDonHang->isEmpty()) {
                return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
            }
            $thongBao = ThongBao::where('url', route('notificationDonHang', ['id' => $id]))
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
        } else {
            $listDonHang = DonHang::with(['sach.theLoai', 'user', 'phuongThucThanhToan'])
                ->orderByDesc('id')
                ->get();
        }

        // Tính toán các chỉ số
        $tongDonHangTuanNay = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();

        $tongDongHangTuanTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->count();

        // Tính phần trăm
        $phanTram = 0;
        if ($tongDongHangTuanTruoc > 0) {
            $phanTram = (($tongDonHangTuanNay - $tongDongHangTuanTruoc) / $tongDongHangTuanTruoc) * 100;
        } elseif ($tongDongHangTuanTruoc == 0) {
            $phanTram = $tongDonHangTuanNay > 0 ? 100 : 0;
        }

        // Tính doanh thu
        $tongDoanhThuTuanNay = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->sum('so_tien_thanh_toan');

        $tongDoanhThuTuanTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->sum('so_tien_thanh_toan');

        // Hóa đơn chưa thanh toán
        $hoaDonTuanNay = DonHang::where('trang_thai', 'dang_xu_ly')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();

        $hoaDonTuanTruoc = DonHang::where('trang_thai', 'dang_xu_ly')
            ->where('created_at', '>=', now()->subWeek()->startOfWeek())
            ->where('created_at', '<=', now()->subWeek()->endOfWeek())
            ->count();

        // Hóa đơn hủy
        $hoaDonHuyTN = DonHang::where('trang_thai', 'that_bai')
            ->where('created_at', '>=', now()->startOfWeek())
            ->where('created_at', '<=', now()->endOfWeek())
            ->count();

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
            'hoaDonHuyTC'
        ));
    }


    public function getDonHangDangXuLy($userId): \Illuminate\Http\JsonResponse
    {
        $orders = DonHang::query()
            ->where('user_id', $userId)
            ->where('trang_thai', 'dang_xu_ly')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'name' => $order->ma_don_hang,
                    'payment_link' => $order->payment_link,
                    'timeLeft' => $order->expires_at ? max(0, strtotime($order->expires_at) - time()) : 0,
                ];
            });
        return response()->json($orders);
    }

    public function huyDonHang($orderId): \Illuminate\Http\JsonResponse
    {
        try {
            $order = DonHang::query()->findOrFail($orderId);
            $order->update(['trang_thai' => 'that_bai', 'payment_link' => null]);
            return response()->json(['order' => $order, 'success' => true]);
        }
        catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage(), 'success' => false]);
        }
    }
}
