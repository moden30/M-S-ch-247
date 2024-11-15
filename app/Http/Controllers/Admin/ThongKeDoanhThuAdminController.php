<?php

namespace App\Http\Controllers\Admin;
use App\Models\DonHang;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Log;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeDoanhThuAdminController extends Controller
{

    public function index(Request $request)
    {
        $period = $request->input('period');

        // Lấy dữ liệu từ phương thức thongKeDoanhThu và trả về tổng hoa hồng
        $result = $this->thongKeDoanhThu($period);

        // Truyền kết quả vào view
        return view('admin.thong-ke.thong-ke-doanh-thu-admin', [
            'thongKe' => $result['thongKe'],
            'tongHoaHongAdmin' => $result['tongHoaHongAdmin'], // Hoa hồng của admin
            'tongHoaHongCTV' => $result['tongHoaHongCTV'], // Hoa hồng của cộng tác viên
        ]);
    }



    public function thongKeDoanhThu($period = null)
    {
        $thongKe = DonHang::where('trang_thai', 'thanh_cong')
            ->with(['sach.user.vai_tros']) // Tải sách, user, và vai_tros liên quan
            ->get()
            ->map(function ($donHang) {
                $giaTriDonHang = $donHang->so_tien_thanh_toan;
                $ngayMua = $donHang->created_at->format('Y-m-d');
                $tuan = $donHang->created_at->format('W'); // Lấy tuần trong năm

                // Lấy vai trò của người bán sách
                $vaiTroNguoiBan = optional(optional($donHang->sach)->user)->vai_tros->pluck('ten_vai_tro')->first();

                // Khởi tạo hoa hồng
                $hoaHongAdmin = 0;
                $hoaHongCTV = 0;

                // Nếu sách thuộc admin, lấy 100% giá trị đơn hàng
                if ($vaiTroNguoiBan === 'admin') {
                    $hoaHongAdmin = $giaTriDonHang; // 100% cho admin
                }
                // Nếu sách thuộc cộng tác viên, admin nhận 40% giá trị đơn hàng
                elseif ($vaiTroNguoiBan === 'cộng tác viên') {
                    $hoaHongCTV = $giaTriDonHang * 0.4; // 40% cho cộng tác viên
                }

                return [
                    'tuan' => $tuan,
                    'ngay' => $ngayMua,
                    'gia_tri' => $giaTriDonHang,
                    'hoa_hong_admin' => $hoaHongAdmin,
                    'hoa_hong_ctv' => $hoaHongCTV
                ];
            });

        // Tính tổng hoa hồng của admin và cộng tác viên theo tuần
        $tongHoaHongAdmin = $thongKe->groupBy('tuan')->map(function ($tuans) {
            return $tuans->sum('hoa_hong_admin');
        });

        $tongHoaHongCTV = $thongKe->groupBy('tuan')->map(function ($tuans) {
            return $tuans->sum('hoa_hong_ctv');
        });

        // Bạn có thể trả về tổng hoa hồng để sử dụng trong view
        return [
            'thongKe' => $thongKe,
            'tongHoaHongAdmin' => $tongHoaHongAdmin,
            'tongHoaHongCTV' => $tongHoaHongCTV,
        ];
    }






//    public function doanhThuAdmin($period)
//    {
//        $doanhThuData = [];
//
//        // Lấy ID người dùng admin
//        $adminRoleId = VaiTro::where('ten_vai_tro', 'admin')->first()->id;
//        $adminUserId = DB::table('vai_tro_tai_khoans')
//            ->where('vai_tro_id', $adminRoleId)
//            ->first()->user_id;
//
//        try {
//            switch ($period) {
//                case 1: // Ngày
//                    $doanhThuData = DB::table('don_hangs')
//                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//                        ->select(
//                            DB::raw('DATE(don_hangs.created_at) as ngay'),
//                            'saches.ten_sach',
//                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
//                            DB::raw('SUM(
//                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
//                            ELSE don_hangs.so_tien_thanh_toan * 0.4
//                        END) as tong_doanh_thu_admin', [$adminUserId])
//                        )
//                        ->where('don_hangs.trang_thai', 'thanh_cong')
//                        ->whereDate('don_hangs.created_at', now()->toDateString())
//                        ->groupBy('ngay', 'saches.ten_sach')
//                        ->orderBy('tong_doanh_thu_admin', 'desc')
//                        ->get();
//                    break;
//
//                case 2: // Tuần
//                    $doanhThuData = DB::table('don_hangs')
//                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//                        ->select(
//                            DB::raw('DATE(don_hangs.created_at) as ngay'),
//                            'saches.ten_sach',
//                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
//                            DB::raw('SUM(
//                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
//                            ELSE don_hangs.so_tien_thanh_toan * 0.4
//                        END) as tong_doanh_thu_admin', [$adminUserId])
//                        )
//                        ->where('don_hangs.trang_thai', 'thanh_cong')
//                        ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()])
//                        ->groupBy('ngay', 'saches.ten_sach')
//                        ->orderBy('tong_doanh_thu_admin', 'desc')
//                        ->get();
//                    break;
//
//                case 3: // Tháng
//                    $doanhThuData = DB::table('don_hangs')
//                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//                        ->select(
//                            DB::raw('MONTH(don_hangs.created_at) as thang'),
//                            DB::raw('YEAR(don_hangs.created_at) as nam'),
//                            'saches.ten_sach',
//                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
//                            DB::raw('SUM(
//                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
//                            ELSE don_hangs.so_tien_thanh_toan * 0.4
//                        END) as tong_doanh_thu_admin', [$adminUserId])
//                        )
//                        ->where('don_hangs.trang_thai', 'thanh_cong')
//                        ->whereYear('don_hangs.created_at', now()->year)
//                        ->groupBy('thang', 'nam', 'saches.ten_sach')
//                        ->orderBy('tong_doanh_thu_admin', 'desc')
//                        ->get();
//                    break;
//
//                case 4: // Quý
//                    $doanhThuData = DB::table('don_hangs')
//                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//                        ->select(
//                            DB::raw('QUARTER(don_hangs.created_at) as quy'),
//                            DB::raw('YEAR(don_hangs.created_at) as nam'),
//                            'saches.ten_sach',
//                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
//                            DB::raw('SUM(
//                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
//                            ELSE don_hangs.so_tien_thanh_toan * 0.4
//                        END) as tong_doanh_thu_admin', [$adminUserId])
//                        )
//                        ->where('don_hangs.trang_thai', 'thanh_cong')
//                        ->whereYear('don_hangs.created_at', now()->year)
//                        ->groupBy('quy', 'nam', 'saches.ten_sach')
//                        ->orderBy('tong_doanh_thu_admin', 'desc')
//                        ->get();
//                    break;
//
//                case 5: // Năm
//                    $doanhThuData = DB::table('don_hangs')
//                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
//                        ->select(
//                            DB::raw('YEAR(don_hangs.created_at) as nam'),
//                            'saches.ten_sach',
//                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
//                            DB::raw('SUM(
//                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
//                            ELSE don_hangs.so_tien_thanh_toan * 0.4
//                        END) as tong_doanh_thu_admin', [$adminUserId])
//                        )
//                        ->where('don_hangs.trang_thai', 'thanh_cong')
//                        ->groupBy('nam', 'saches.ten_sach')
//                        ->orderBy('tong_doanh_thu_admin', 'desc')
//                        ->get();
//                    break;
//
//                default:
//                    return response()->json(['error' => 'Invalid period provided'], 400);
//            }
//        } catch (\Exception $e) {
//            return response()->json(['error' => 'Failed to retrieve data', 'message' => $e->getMessage()], 500);
//        }
//
//        return response()->json($doanhThuData ?: []);
//    }


}
