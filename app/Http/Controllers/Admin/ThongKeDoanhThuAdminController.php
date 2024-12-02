<?php

namespace App\Http\Controllers\Admin;

use App\Models\DonHang;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


use App\Http\Controllers\Controller;
use App\Models\ContributorCommissionEarning;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeDoanhThuAdminController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:thong-ke-loi-nhuan')->only('index');
    }

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

        // Initialize the Laravel models and request as necessary
        $adminRoleId = VaiTro::where('ten_vai_tro', 'admin')->first()->id;
        $adminUserId = DB::table('vai_tro_tai_khoans')
            ->where('vai_tro_id', $adminRoleId)
            ->first()->user_id;
        $currentUserId = $request->user()->id;
        $isAdmin = ($currentUserId == $adminUserId);

        // Modify the revenue calculations to dynamically apply commission rates
        $doanhThu = DonHang::join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->where('don_hangs.trang_thai', 'thanh_cong')
            ->first()->totalRevenue;

        // For today's revenue with dynamic commission rates
        $doanhThuHomNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereDate('don_hangs.created_at', now())
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        // For yesterday's revenue
        $doanhThuHomQua = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereDate('don_hangs.created_at', now()->subDay())
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        // Detailed revenue calculation for today
        $chiTietDoanhThuHomNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereDate('don_hangs.created_at', now())
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->get()
            ->map(function ($donHang) {
                return $donHang->sach->user_id == 1
                    ? $donHang->so_tien_thanh_toan
                    : $donHang->so_tien_thanh_toan * 0.4;
            })
            ->toArray();





        // Percentage change calculation, same as before
        $phanTram = 0;
        if ($doanhThuHomQua > 0) {
            $phanTram = (($doanhThuHomNay - $doanhThuHomQua) / $doanhThuHomQua) * 100;
        } elseif ($doanhThuHomQua == 0) {
            $phanTram = $doanhThuHomNay > 0 ? 100 : 0;
        }


        $doanhThuThangNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')  // Specifying the table name
            ->whereMonth('don_hangs.created_at', now()->month)
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        $doanhThuThangTruoc = 0;
        if (now()->month > 1) {
            $doanhThuThangTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereMonth('don_hangs.created_at', now()->subMonth()->month)
                ->whereYear('don_hangs.created_at', now()->year)
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')  // Joining with the 'saches' table
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * 0.4 end) as totalRevenue'))
                ->first()->totalRevenue;
        }
        $phanTramThang = 0;
        if ($doanhThuThangTruoc > 0) {
            $phanTramThang = (($doanhThuThangNay - $doanhThuThangTruoc) / $doanhThuThangTruoc) * 100;
        } elseif ($doanhThuThangTruoc == 0) {
            $phanTramThang = $doanhThuThangNay > 0 ? 100 : 0;
        }

        $chiTietDoanhThuThang = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereMonth('don_hangs.created_at', now()->month)
            ->whereYear('don_hangs.created_at', now()->year)
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->get()
            ->map(function ($donHang) {
                return $donHang->sach->user_id == 1
                    ? $donHang->so_tien_thanh_toan
                    : $donHang->so_tien_thanh_toan * 0.4;
            })
            ->toArray();

        $doanhThuNamNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', now()->year)
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        $doanhThuNamTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', now()->subYear()->year)
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')  // Joining with the 'saches' table
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * 0.4 end) as totalRevenue'))
            ->first()->totalRevenue;

        $chiTietNamNay = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', now()->year)
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->get()
            ->map(function ($donHang) {
                return $donHang->sach->user_id == 1
                    ? $donHang->so_tien_thanh_toan
                    : $donHang->so_tien_thanh_toan * 0.4;
            })
            ->toArray();

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
        $doanhThuQuyHienTai = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', $nam)
            ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quy])
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        // Tính doanh thu quý trước
        $quyTruoc = $quy - 1;
        $doanhThuQuyTruoc = 0;

        if ($quyTruoc > 0) {
            // Tính doanh thu quý trước của cùng năm
            $doanhThuQuyTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereYear('don_hangs.created_at', $nam)
                ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quyTruoc])
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
                ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
                ->first()->totalRevenue;
        } elseif ($quy === 1) {
            // Nếu quý hiện tại là quý 1, thì tính doanh thu quý 4 của năm trước
            $previousYear = $nam - 1;
            $doanhThuQuyTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereYear('don_hangs.created_at', $previousYear)
                ->whereRaw('QUARTER(don_hangs.created_at) = 4')
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
                ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
                ->first()->totalRevenue;
        }

        // Tính phần trăm thay đổi doanh thu giữa các quý
        $phanTramQuy = 0;
        if ($doanhThuQuyTruoc > 0) {
            $phanTramQuy = (($doanhThuQuyHienTai - $doanhThuQuyTruoc) / $doanhThuQuyTruoc) * 100;
        } elseif ($doanhThuQuyTruoc == 0) {
            $phanTramQuy = $doanhThuQuyHienTai > 0 ? 100 : 0;
        }


        // Lấy chi tiết doanh thu trong quý hiện tại

        $chiTietDoanhThuQuy = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', $nam)
            ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quy])
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->get()
            ->map(function ($donHang) {
                return $donHang->sach->user_id == 1
                    ? $donHang->so_tien_thanh_toan
                    : $donHang->so_tien_thanh_toan * 0.4;
            })
            ->toArray();
        $monthlyRevenues = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyRevenue = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereMonth('don_hangs.created_at', $month)
                ->whereYear('don_hangs.created_at', now()->year)
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
                ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
                ->first()
                ->totalRevenue ?? 0;
            $monthlyRevenues[] = $monthlyRevenue;
        }

        // Chi tiết doanh thu sách của admin
        $sachAdmin = Sach::where('user_id', Auth::id())
            ->withCount(['dh' => function ($query) {
                $query->where('trang_thai', 'thanh_cong');
            }])
            ->addSelect(['total_loinhuan' => function ($query) {
                $query->from('don_hangs')
                    ->whereColumn('don_hangs.sach_id', 'saches.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->selectRaw('sum(don_hangs.so_tien_thanh_toan) as total_loinhuan');
            }])
            ->orderByDesc('dh_count')
            ->get();

        $hoaHongRate1 = ContributorCommissionEarning::where('user_id', Auth::id())->value('commission_rate');
        if (!$hoaHongRate1) {
            $hoaHongRate1 = 0;
        }
        if ($hoaHongRate1 > 1) {
            $hoaHongRate1 = $hoaHongRate1 / 100; // Convert percentage to decimal if it's greater than 1
        }

        $sachCTV = Sach::where('user_id', '!=', Auth::id())
        ->withCount(['dh' => function ($query) {
            $query->where('trang_thai', 'thanh_cong');
        }])
        ->addSelect(['total_loinhuan' => function ($query) {
            $query->from('don_hangs')
                ->join('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->whereColumn('don_hangs.sach_id', 'saches.id')
                ->where('don_hangs.trang_thai', 'thanh_cong')
                ->selectRaw('SUM(don_hangs.so_tien_thanh_toan * (1 - contributor_commission_earnings.commission_rate)) as total_loinhuan');
        }])
        ->orderBy('dh_count', 'desc')
        ->get();

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
            'monthlyRevenues',
            'sachAdmin',
            'sachCTV'
        ));
    }


    public function getRevenueData1(Request $request)
    {
        $quy = (int) $request->query('quy');
        $nam = (int) $request->query('nam');

        if ($quy < 1 || $quy > 4 || $nam <= 0) {
            return response()->json(['error' => 'Dữ liệu không hợp lệ'], 400);
        }
        // Doanh thu quý hiện tại
        $doanhThuQuyHienTai = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
            ->whereYear('don_hangs.created_at', $nam)
            ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quy])
            ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
            ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
            ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
            ->first()->totalRevenue;

        // Tính doanh thu quý trước
        $quyTruoc = $quy - 1;
        $doanhThuQuyTruoc = 0;

        if ($quyTruoc > 0) {
            $doanhThuQuyTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereYear('don_hangs.trang_thai', 'thanh_cong', $nam)
                ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quyTruoc])
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
                ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
                ->first()->totalRevenue;
        } elseif ($quy === 1) {
            $previousYear = $nam - 1;
            $doanhThuQuyTruoc = DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereYear('don_hangs.created_at', $previousYear)
                ->whereRaw('QUARTER(don_hangs.created_at) = 4')
                ->join('saches', 'saches.id', '=', 'don_hangs.sach_id')
                ->leftJoin('contributor_commission_earnings', 'contributor_commission_earnings.id_don_hang', '=', 'don_hangs.id')
                ->select(DB::raw('sum(case when saches.user_id = 1 then don_hangs.so_tien_thanh_toan else don_hangs.so_tien_thanh_toan * (1 - coalesce(contributor_commission_earnings.commission_rate, 0.60)) end) as totalRevenue'))
                ->first()->totalRevenue;
        }

        // phần trăm
        $phanTramQuy = 0;
        if ($doanhThuQuyTruoc > 0) {
            $phanTramQuy = (($doanhThuQuyHienTai - $doanhThuQuyTruoc) / $doanhThuQuyTruoc) * 100;
        } elseif ($doanhThuQuyTruoc == 0) {
            $phanTramQuy = $doanhThuQuyHienTai > 0 ? 100 : 0;
        }
        return response()->json([
            'doanhThuQuyHienTai' => $doanhThuQuyHienTai,
            'phanTramQuy' => $phanTramQuy,
            'chiTietDoanhThuQuy' => DonHang::where('don_hangs.trang_thai', 'thanh_cong')
                ->whereYear('don_hangs.created_at', $nam)
                ->whereRaw('QUARTER(don_hangs.created_at) = ?', [$quy])
                ->pluck('so_tien_thanh_toan')
                ->toArray()
        ]);
    }

    public function getRevenueByCategory1(Request $request)
    {
        $type = $request->query('type');
        switch ($type) {
            case '1': // Ngày
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereDate('don_hangs.created_at', now())
                    ->select(
                        'the_loais.ten_the_loai',
                        DB::raw('SUM(CASE WHEN saches.user_id = 1 THEN don_hangs.so_tien_thanh_toan ELSE don_hangs.so_tien_thanh_toan * 0.4 END) as tong_doanh_thu')
                    )
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '2': // Tuần
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->select(
                        'the_loais.ten_the_loai',
                        DB::raw('SUM(CASE WHEN saches.user_id = 1 THEN don_hangs.so_tien_thanh_toan ELSE don_hangs.so_tien_thanh_toan * 0.4 END) as tong_doanh_thu')
                    )
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '3': // Tháng
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereMonth('don_hangs.created_at', now()->month)
                    ->select(
                        'the_loais.ten_the_loai',
                        DB::raw('SUM(CASE WHEN saches.user_id = 1 THEN don_hangs.so_tien_thanh_toan ELSE don_hangs.so_tien_thanh_toan * 0.4 END) as tong_doanh_thu')
                    )
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '4': // Năm
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereYear('don_hangs.created_at', now()->year)
                    ->select(
                        'the_loais.ten_the_loai',
                        DB::raw('SUM(CASE WHEN saches.user_id = 1 THEN don_hangs.so_tien_thanh_toan ELSE don_hangs.so_tien_thanh_toan * 0.4 END) as tong_doanh_thu')
                    )
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '5': // Quý
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereRaw('QUARTER(don_hangs.created_at) = QUARTER(NOW())')
                    ->select(
                        'the_loais.ten_the_loai',
                        DB::raw('SUM(CASE WHEN saches.user_id = 1 THEN don_hangs.so_tien_thanh_toan ELSE don_hangs.so_tien_thanh_toan * 0.4 END) as tong_doanh_thu')
                    )
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            default:
                return response()->json(['error' => 'Dữ liệu không hợp lệ'], 400);
        }
        return response()->json([
            'theLoai' => $doanhThuTheoTheLoai->pluck('ten_the_loai'),
            'doanhThu' => $doanhThuTheoTheLoai->pluck('tong_doanh_thu', 'ten_the_loai')
        ]);
    }



}
