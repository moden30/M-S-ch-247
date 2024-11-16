<?php

namespace App\Http\Controllers\Admin;

use App\Models\DonHang;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Log;


use App\Http\Controllers\Controller;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeDoanhThuAdminController extends Controller
{

    // public function index(Request $request)
    // {
    //     $period = $request->input('period');

    //     // Lấy dữ liệu từ phương thức thongKeDoanhThu và trả về tổng hoa hồng
    //     $result = $this->thongKeDoanhThu($period);

    //     // Truyền kết quả vào view
    //     return view('admin.thong-ke.thong-ke-doanh-thu-admin', [
    //         'thongKe' => $result['thongKe'],
    //         'tongHoaHongAdmin' => $result['tongHoaHongAdmin'], // Hoa hồng của admin
    //         'tongHoaHongCTV' => $result['tongHoaHongCTV'], // Hoa hồng của cộng tác viên
    //     ]);
    // }



    public function index(Request $request)
    {

        // Lấy ID người dùng admin
        $adminRoleId = VaiTro::where('ten_vai_tro', 'admin')->first()->id;
        $adminUserId = DB::table('vai_tro_tai_khoans')
            ->where('vai_tro_id', $adminRoleId)
            ->first()->user_id;

        // Kiểm tra xem người dùng hiện tại có phải là admin không
        $currentUserId = $request->user()->id;
        $isAdmin = ($currentUserId == $adminUserId);

        $doanhThu = DonHang::select(
            DB::raw('sum(case when user_id = 1 then so_tien_thanh_toan else so_tien_thanh_toan * 0.4 end) as totalRevenue')
        )->where('trang_thai', 'thanh_cong')->first()->totalRevenue;

        // Tính doanh thu theo ngày (lấy từ các dơn hàng có trạng thái thanh_cong)
        // now lọc các đơn hàng hôm nay
        // now()->subDay() lọc các đơn hàng hôm qua
        $doanhThuHomNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')  // Specifying the table name
            ->whereDate('don_hangs.created_at', now())
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')  // Joining with the 'saches' table
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * 0.4 end) as totalRevenue'))
            ->first()->totalRevenue;


        $doanhThuHomQua = DonHang::where('trang_thai', 'thanh_cong')
            ->whereDate('created_at', now()->subDay())
            ->sum('so_tien_thanh_toan');
        // Lấy so_tien_thanh_toan của hôm nay dựa trên đơn hàng có trang_thai=thanh_cong
        $chiTietDoanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereDate('created_at', now())
            ->pluck('so_tien_thanh_toan')->toArray();
        // Tính phần trăm cho doanh thu
        // Tính % dựa trên công thức ở if đầu tiên
        // Nếu doanh thu hôm qua không có thì sẽ thực hiện công thức elseif, phần trăm sẽ là 100%
        $phanTram = 0;
        if ($doanhThuHomQua > 0) {
            $phanTram = (($doanhThuHomNay - $doanhThuHomQua) / $doanhThuHomQua) * 100;
        } elseif ($doanhThuHomQua == 0) {
            $phanTram = $doanhThuHomNay > 0 ? 100 : 0;
        }
        // Hiển thị % nếu thông số quá lớn
        // $phanTram = min($phanTram, 100);

        // Tính doanh thu theo tháng (lấy từ các dơn hàng có trạng thái thanh_cong)
        // whereMonth + now()->month để lọc theo tháng hiện tại & whereMonth +  now()->subMonth()->month để lọc theo tháng trước
        // Ở đây phải lọc kèm theo cả năm vì tránh gây nhầm lẫn giữa các tháng của năm nay và năm trước ...
        // whereYear + now()->year lọc theo năm hiện tại không theo các năm trước đó
        $doanhThuThangNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('so_tien_thanh_toan');

        $doanhThuThangTruoc = 0;
        if (now()->month > 1) {
            $doanhThuThangTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereMonth('created_at', now()->subMonth()->month)
                ->whereYear('created_at', now()->year)
                ->sum('so_tien_thanh_toan');
        }
        $phanTramThang = 0;
        if ($doanhThuThangTruoc > 0) {
            $phanTramThang = (($doanhThuThangNay - $doanhThuThangTruoc) / $doanhThuThangTruoc) * 100;
        } elseif ($doanhThuThangTruoc == 0) {
            $phanTramThang = $doanhThuThangNay > 0 ? 100 : 0;
        }
        // Hiển thị % nếu thông số quá lớn
        //        $phanTramThang = min($phanTramThang, 100);
        // Lấy doanh thu cho từng đơn hàng trong tháng này
        $chiTietDoanhThuThang = DonHang::where('trang_thai', 'thanh_cong')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->pluck('so_tien_thanh_toan');

        // Tính doanh thu theo năm (lấy từ các dơn hàng có trạng thái thanh_cong)
        $doanhThuNamNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->year)
            ->sum('so_tien_thanh_toan');

        $doanhThuNamTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->subYear()->year)
            ->sum('so_tien_thanh_toan');

        $chiTietNamNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', now()->year)
            ->pluck('so_tien_thanh_toan')->toArray();

        $phanTramNam = 0;
        if ($doanhThuNamTruoc > 0) {
            $phanTramNam = (($doanhThuNamNay - $doanhThuNamTruoc) / $doanhThuNamTruoc) * 100;
        } elseif ($doanhThuNamTruoc == 0) {
            $phanTramNam = $doanhThuNamNay > 0 ? 100 : 0;
        }



        // Doanh thu quý hiện tại (lấy từ các đơn hàng có trạng thái thanh_cong)
        $quy = ceil(now()->month / 3); // Tính quý hiện tại
        $nam = now()->year;

        // Tính doanh thu quý hiện tại
        $doanhThuQuyHienTai = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', $nam)
            ->whereRaw('QUARTER(created_at) = ?', [$quy])
            ->sum('so_tien_thanh_toan');

        // Tính doanh thu quý trước
        $quyTruoc = $quy - 1;
        $doanhThuQuyTruoc = 0;

        if ($quyTruoc > 0) {
            // Tính doanh thu quý trước của cùng năm
            $doanhThuQuyTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereYear('created_at', $nam)
                ->whereRaw('QUARTER(created_at) = ?', [$quyTruoc])
                ->sum('so_tien_thanh_toan');
        } elseif ($quy === 1) {
            // Nếu quý hiện tại là quý 1, thì tính doanh thu quý 4 của năm trước
            $previousYear = $nam - 1;
            $doanhThuQuyTruoc = DonHang::where('trang_thai', 'thanh_cong')
                ->whereYear('created_at', $previousYear)
                ->whereRaw('QUARTER(created_at) = 4')
                ->sum('so_tien_thanh_toan');
        }

        // Tính phần trăm thay đổi doanh thu giữa các quý
        $phanTramQuy = 0;
        if ($doanhThuQuyTruoc > 0) {
            $phanTramQuy = (($doanhThuQuyHienTai - $doanhThuQuyTruoc) / $doanhThuQuyTruoc) * 100;
        } elseif ($doanhThuQuyTruoc == 0) {
            $phanTramQuy = $doanhThuQuyHienTai > 0 ? 100 : 0;
        }


        // Lấy chi tiết doanh thu trong quý hiện tại

        $chiTietDoanhThuQuy = DonHang::where('trang_thai', 'thanh_cong')
            ->whereYear('created_at', $nam)
            ->whereRaw('QUARTER(created_at) = ?', [$quy])
            ->pluck('so_tien_thanh_toan')
            ->toArray();


        // if ($isAdmin) {
        //     $doanhThuHomNay *= 0.4;
        //     $doanhThuHomQua *= 0.4;
        //     $doanhThuThangNay *= 0.4;
        //     $doanhThuThangTruoc *= 0.4;
        //     $doanhThuNamNay *= 0.4;
        //     $doanhThuNamTruoc *= 0.4;
        //     $doanhThuQuyHienTai *= 0.4;
        //     $doanhThuQuyTruoc *= 0.4;

        // }

        return view('admin.thong-ke.thong-ke-doanh-thu-admin', compact(
            'doanhThuHomNay',
            'doanhThuHomQua',
            'phanTram',
            'chiTietDoanhThuHomNay',
            'doanhThuThangNay',
            'doanhThuThangTruoc',
            'phanTramThang',
            'chiTietDoanhThuThang',
            'doanhThuNamNay',
            'doanhThuNamTruoc',
            'chiTietNamNay',
            'phanTramNam',
            'quy',
            'doanhThuQuyHienTai',
            'doanhThuQuyTruoc',
            'phanTramQuy',
            'chiTietDoanhThuQuy',

        ));
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
