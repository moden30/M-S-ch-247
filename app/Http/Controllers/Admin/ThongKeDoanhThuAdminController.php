<?php

namespace App\Http\Controllers\Admin;
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
        // Thực hiện truy vấn và lấy dữ liệu
        $doanhThuData = $this->doanhThuAdmin($period);
       return view('admin.thong-ke.thong-ke-doanh-thu-admin', compact('doanhThuData'));
    }

    public function doanhThuAdmin($period)
    {
        $doanhThuData = [];

        // Lấy ID người dùng admin
        $adminRoleId = VaiTro::where('ten_vai_tro', 'admin')->first()->id;
        $adminUserId = DB::table('vai_tro_tai_khoans')
            ->where('vai_tro_id', $adminRoleId)
            ->first()->user_id;

        try {
            switch ($period) {
                case 1: // Ngày
                    $doanhThuData = DB::table('don_hangs')
                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                        ->select(
                            DB::raw('DATE(don_hangs.created_at) as ngay'),
                            'saches.ten_sach',
                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                            DB::raw('SUM(
                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
                            ELSE don_hangs.so_tien_thanh_toan * 0.4
                        END) as tong_doanh_thu_admin', [$adminUserId])
                        )
                        ->where('don_hangs.trang_thai', 'thanh_cong')
                        ->whereDate('don_hangs.created_at', now()->toDateString())
                        ->groupBy('ngay', 'saches.ten_sach')
                        ->orderBy('tong_doanh_thu_admin', 'desc')
                        ->get();
                    break;

                case 2: // Tuần
                    $doanhThuData = DB::table('don_hangs')
                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                        ->select(
                            DB::raw('DATE(don_hangs.created_at) as ngay'),
                            'saches.ten_sach',
                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                            DB::raw('SUM(
                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
                            ELSE don_hangs.so_tien_thanh_toan * 0.4
                        END) as tong_doanh_thu_admin', [$adminUserId])
                        )
                        ->where('don_hangs.trang_thai', 'thanh_cong')
                        ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()])
                        ->groupBy('ngay', 'saches.ten_sach')
                        ->orderBy('tong_doanh_thu_admin', 'desc')
                        ->get();
                    break;

                case 3: // Tháng
                    $doanhThuData = DB::table('don_hangs')
                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                        ->select(
                            DB::raw('MONTH(don_hangs.created_at) as thang'),
                            DB::raw('YEAR(don_hangs.created_at) as nam'),
                            'saches.ten_sach',
                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                            DB::raw('SUM(
                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
                            ELSE don_hangs.so_tien_thanh_toan * 0.4
                        END) as tong_doanh_thu_admin', [$adminUserId])
                        )
                        ->where('don_hangs.trang_thai', 'thanh_cong')
                        ->whereYear('don_hangs.created_at', now()->year)
                        ->groupBy('thang', 'nam', 'saches.ten_sach')
                        ->orderBy('tong_doanh_thu_admin', 'desc')
                        ->get();
                    break;

                case 4: // Quý
                    $doanhThuData = DB::table('don_hangs')
                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                        ->select(
                            DB::raw('QUARTER(don_hangs.created_at) as quy'),
                            DB::raw('YEAR(don_hangs.created_at) as nam'),
                            'saches.ten_sach',
                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                            DB::raw('SUM(
                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
                            ELSE don_hangs.so_tien_thanh_toan * 0.4
                        END) as tong_doanh_thu_admin', [$adminUserId])
                        )
                        ->where('don_hangs.trang_thai', 'thanh_cong')
                        ->whereYear('don_hangs.created_at', now()->year)
                        ->groupBy('quy', 'nam', 'saches.ten_sach')
                        ->orderBy('tong_doanh_thu_admin', 'desc')
                        ->get();
                    break;

                case 5: // Năm
                    $doanhThuData = DB::table('don_hangs')
                        ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                        ->select(
                            DB::raw('YEAR(don_hangs.created_at) as nam'),
                            'saches.ten_sach',
                            DB::raw('COUNT(don_hangs.id) as so_luong_ban'),
                            DB::raw('SUM(
                            CASE WHEN saches.user_id = ? THEN don_hangs.so_tien_thanh_toan
                            ELSE don_hangs.so_tien_thanh_toan * 0.4
                        END) as tong_doanh_thu_admin', [$adminUserId])
                        )
                        ->where('don_hangs.trang_thai', 'thanh_cong')
                        ->groupBy('nam', 'saches.ten_sach')
                        ->orderBy('tong_doanh_thu_admin', 'desc')
                        ->get();
                    break;

                default:
                    return response()->json(['error' => 'Invalid period provided'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve data', 'message' => $e->getMessage()], 500);
        }

        return response()->json($doanhThuData ?: []);
    }


}
