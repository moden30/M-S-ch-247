<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year', now()->year);
        $startDate = $request->input('start_date', Carbon::today()->toDateString());
        $endDate = $request->input('end_date', Carbon::today()->toDateString());

        $listDonHang = DonHang::with(['sach', 'user', 'phuongThucThanhToan'])
            ->orderByDesc('id')
            ->get();

        $tongDonHangHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->count();


        //    $tongDongHangHomQua = DonHang::where('trang_thai', 'thanh_cong')
        //        ->where('created_at', '>=', now()->subDay()->startOfDay())
        //        ->where('created_at', '<=', now()->subDay()->endOfDay())
        //        ->count();

        //     Tính phần trăm
        //    $phanTram = 0;
        //    if ($tongDongHangHomQua > 0) {
        //        $phanTram = (($tongDonHangHomNay - $tongDongHangHomQua) / $tongDongHangHomQua) * 100;
        //        $phanTram = number_format($phanTram, 2);
        //    } elseif ($tongDongHangHomQua == 0) {
        //        $phanTram = $tongDonHangHomNay > 0 ? 100 : 0;
        //    }

        // Tính doanh thu
        $tongDoanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->sum('so_tien_thanh_toan');

        $tongDoanhThuHomQua = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->subDay()->startOfDay())
            ->where('created_at', '<=', now()->subDay()->endOfDay())
            ->sum('so_tien_thanh_toan');

        // Hóa đơn chưa thanh toán
        $hoaDonHomNay = DonHang::where('trang_thai', 'dang_xu_ly')
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->count();

        $hoaDonHomQua = DonHang::where('trang_thai', 'dang_xu_ly')
            ->where('created_at', '>=', now()->subDay()->startOfDay())
            ->where('created_at', '<=', now()->subDay()->endOfDay())
            ->count();

        // Hóa đơn hủy
        $hoaDonHuyHomNay = DonHang::where('trang_thai', 'that_bai')
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->count();

        $hoaDonHuyHomQua = DonHang::where('trang_thai', 'that_bai')
            ->where('created_at', '>=', now()->subDay()->startOfDay())
            ->where('created_at', '<=', now()->subDay()->endOfDay())
            ->count();


        $currentYear = now()->year; // Lấy năm hiện tại
        $years = range(2020, $currentYear); // Tạo một mảng từ năm 2020 đến năm hiện tại
        $thongKeTheoTuan = [];

        foreach ($years as $year) {
            for ($month = 1; $month <= 12; $month++) {
                $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                $endOfMonth = $startOfMonth->copy()->endOfMonth();

                for ($week = 0; $week < 4; $week++) {
                    $startOfWeek = $startOfMonth->copy()->addWeeks($week)->startOfWeek(Carbon::MONDAY);
                    $endOfWeek = $startOfWeek->copy()->endOfWeek(Carbon::SUNDAY);

                    if ($endOfWeek->greaterThan($endOfMonth)) {
                        $endOfWeek = $endOfMonth;
                    }

                    $thongKeTuan[$year][$month][$week + 1] = [
                        'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')
                            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->count(),
                        'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')
                            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->count(),
                        'that_bai' => DonHang::where('trang_thai', 'that_bai')
                            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->count(),
                        'doanh_thu' => DonHang::where('trang_thai', 'thanh_cong')
                            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                            ->sum('so_tien_thanh_toan') // Truy vấn tính doanh thu
                    ];

                    if ($endOfWeek->equalTo($endOfMonth)) {
                        break;
                    }
                }
            }
        }


        $currentYear = now()->year;

        // Thống kê theo tháng cho mỗi năm
        $thongKeThang = [];
        for ($year = 2020; $year <= $currentYear; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $startOfMonth = now()->setYear($year)->setMonth($month)->startOfMonth();
                $endOfMonth = now()->setYear($year)->setMonth($month)->endOfMonth();
                $thongKeThang[$year][$month] = [
                    'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')
                        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                    'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')
                        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                    'that_bai' => DonHang::where('trang_thai', 'that_bai')
                        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
                ];
            }
        }

        // Thống kê theo quý cho mỗi năm
        $thongKeQuy = [];
        for ($year = 2020; $year <= $currentYear; $year++) {
            for ($quy = 1; $quy <= 4; $quy++) {
                $startMonth = ($quy - 1) * 3 + 1;
                $endMonth = $startMonth + 2;
                $startOfQuarter = now()->setYear($year)->setMonth($startMonth)->startOfMonth()->startOfDay();
                $endOfQuarter = now()->setYear($year)->setMonth($endMonth)->endOfMonth()->endOfDay();
                $thongKeQuy[$year][$quy] = [
                    'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')
                        ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])->count(),
                    'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')
                        ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])->count(),
                    'that_bai' => DonHang::where('trang_thai', 'that_bai')
                        ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])->count(),
                ];
            }
        }

        // Thống kê hàng năm cho mỗi năm
        $annualData = [];
        for ($year = 2020; $year <= $currentYear; $year++) {
            $startOfYear = now()->setYear($year)->startOfYear();
            $endOfYear = now()->setYear($year)->endOfYear();
            $annualData[$year] = [
                'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
                'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
                'that_bai' => DonHang::where('trang_thai', 'that_bai')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
            ];
        }


        // Bây giờ $annualData chứa dữ liệu thống kê cho mỗi năm từ 2024 đến năm hiện tại


        $doanhThuTuan = [];
        $doanhThuThang = [];
        $doanhThuQuy = [];
        $doanhThuNam = [];
        foreach ($years as $year) {
            for ($month = 1; $month <= 12; $month++) {
                $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

                $weekCounter = 1;
                $startOfWeek = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);

                while ($startOfWeek <= $endOfMonth) {
                    $endOfWeek = (clone $startOfWeek)->endOfWeek(Carbon::SUNDAY);
                    if ($endOfWeek->greaterThan($endOfMonth)) {
                        $endOfWeek = $endOfMonth;
                    }

                    $doanhThuTuan[$year][$month][$weekCounter] = DonHang::where('trang_thai', 'thanh_cong')
                        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                        ->sum('so_tien_thanh_toan');

                    $startOfWeek->addWeek(1);
                    $weekCounter++;
                }
            }
        }


        // Giả sử bạn đã có các truy vấn để thu thập dữ liệu này
        // Ví dụ cho tháng:
        foreach ($years as $year) {
            for ($month = 1; $month <= 12; $month++) {
                $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
                $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

                $doanhThuThang[$year][$month] = DonHang::where('trang_thai', 'thanh_cong')
                    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->sum('so_tien_thanh_toan');
            }
        }

        foreach ($years as $year) {
            for ($quarter = 1; $quarter <= 4; $quarter++) {
                $startOfQuarter = Carbon::create($year)->firstOfQuarter()->addMonths(3 * ($quarter - 1));
                $endOfQuarter = (clone $startOfQuarter)->endOfQuarter();

                $doanhThuQuy[$year][$quarter] = DonHang::where('trang_thai', 'thanh_cong')
                    ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
                    ->sum('so_tien_thanh_toan');
            }
        }
        foreach ($years as $year) {
            $startOfYear = Carbon::create($year)->startOfYear();
            $endOfYear = Carbon::create($year)->endOfYear();

            $doanhThuNam[$year] = DonHang::where('trang_thai', 'thanh_cong')
                ->whereBetween('created_at', [$startOfYear, $endOfYear])
                ->sum('so_tien_thanh_toan');
        }
        $soLuongCongTacVien = [];
        for ($i = 1; $i <= 12; $i++) { // Assuming monthly data
            $soLuongCongTacVien[$i] = rand(10, 100); // Random number of collaborators
        }

        $tongQuan = User::leftJoin('saches', function ($join) {
            $join->on('saches.user_id', '=', 'users.id')
                ->where('saches.kiem_duyet', '=', 'duyet');
        })
            ->leftJoin('don_hangs', function ($join) {
                $join->on('don_hangs.sach_id', '=', 'saches.id')
                    ->where('don_hangs.trang_thai', '=', 'thanh_cong');
            })
            ->select(
                'users.id AS user_id',
                'users.ten_doc_gia as ten',
                DB::raw('COUNT(DISTINCT saches.id) AS tong_so_sach_da_dang'),
                DB::raw('COUNT(don_hangs.id) AS tong_so_luot_dat'),
                DB::raw('COALESCE(SUM(don_hangs.so_tien_thanh_toan), 0) AS tong_doanh_thu')
            )
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->latest('tong_doanh_thu')
            ->get();

        $hienThiYeuThich = Sach::with('theLoai')
            ->withCount('nguoiYeuThich')
            ->orderBy('nguoi_yeu_thich_count', 'desc')
            ->take(10)
            ->get();
        $roleCounts = DB::table('vai_tro_tai_khoans')
            ->join('vai_tros', 'vai_tro_tai_khoans.vai_tro_id', '=', 'vai_tros.id')
            ->select('vai_tros.id', 'vai_tros.ten_vai_tro', DB::raw('count(vai_tro_tai_khoans.user_id) as user_count'))
            ->where('vai_tros.id', 4) // Thêm điều kiện lấy vai trò có id là 4
            ->groupBy('vai_tros.id', 'vai_tros.ten_vai_tro')
            ->get();

        // Lấy số lượng cộng tác viên từ vai trò có id là 4
        $soLuongCongTacVien = $roleCounts->firstWhere('id', 4)->user_count ?? 0;

        // Lọc người dùng theo vai trò nếu có role_id
        $query = User::with('vai_tros');

        // Lọc vai trò có id là 4 cho người dùng nếu role_id là 4
        if ($request->has('role_id') && $request->role_id == 4) {
            $query->whereHas('vai_tros', function ($q) use ($request) {
                $q->where('vai_tros.id', 4);
            });
        }
        $tongSoSach = Sach::where('kiem_duyet', 'duyet')->count();
        return view('admin.dashboard', compact(
            'tongSoSach',
            'roleCounts',
            'soLuongCongTacVien',
            'hienThiYeuThich',
            'tongQuan',
            'soLuongCongTacVien',
            'doanhThuTuan',
            'doanhThuThang',
            'doanhThuQuy',
            'doanhThuNam',
            'selectedYear',
            'listDonHang',
            'tongDonHangHomNay',
            //            'tongDongHangHomQua',
            //            'phanTram',
            'tongDoanhThuHomNay',
            'tongDoanhThuHomQua',
            'hoaDonHomNay',
            'hoaDonHomQua',
            'hoaDonHuyHomNay',
            'hoaDonHuyHomQua',
            'thongKeTuan', // Thêm dữ liệu thống kê theo tuần vào view
            'thongKeThang', // Dữ liệu thống kê theo tháng trong năm hiện tại
            'thongKeQuy', // Dữ liệu thống kê theo quý trong năm hiện tại
            'annualData' // Use this variable to pass fiscal year data to the view
        ));
    }


    public function congTacVien(Request $request)
    {

        $filter = $request->input('filter', 'tong_quan');

        $query = User::leftJoin('saches', function ($join) {
            $join->on('saches.user_id', '=', 'users.id')
                ->where('saches.kiem_duyet', '=', 'duyet');
        })
            ->leftJoin('don_hangs', function ($join) {
                $join->on('don_hangs.sach_id', '=', 'saches.id')
                    ->where('don_hangs.trang_thai', '=', 'thanh_cong');
            })
            ->select(
                'users.ten_doc_gia as ten',
                DB::raw('COUNT(DISTINCT saches.id) AS tong_so_sach_da_dang'),
                DB::raw('COUNT(don_hangs.id) AS tong_so_luot_dat'),
                DB::raw('COALESCE(SUM(don_hangs.so_tien_thanh_toan), 0) AS tong_doanh_thu')
            )
            ->groupBy('users.id', 'users.ten_doc_gia');

        // Thêm điều kiện lọc theo thời gian
        switch ($filter) {
            case 'ngay':
                $query->whereDate('don_hangs.created_at', Carbon::today());
                break;
            case 'tuan':
                $query->whereBetween('don_hangs.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'thang':
                $query->whereMonth('don_hangs.created_at', Carbon::now()->month);
                break;
            case 'tong_quan':

                break;
        }
        // Lấy dữ liệu
        $tongQuan = $query->latest('tong_doanh_thu')->get();

        // Trả về JSON nếu là yêu cầu AJAX
        if ($request->ajax()) {
            return response()->json($tongQuan);
        }
        //=======================end tong quan=========================//



        $chiTietCtv = Sach::with('tai_khoan')->select('user_id', DB::raw('count(*) as tong_sach'))
            ->where('kiem_duyet', 'duyet')
            ->groupBy('user_id')->paginate(5);


        $topDangSach = Sach::with('tai_khoan')
            ->select('user_id', DB::raw('count(*) as tong_sach'))
            ->where('kiem_duyet', 'duyet')
            ->groupBy('user_id')
            ->orderBy('tong_sach')
            ->limit(10)
            ->get();

        $sachData = [];
        $ctvNames = [];

        foreach ($topDangSach as $ctv) {
            $sachData[] = $ctv->tong_sach;
            $ctvNames[] = $ctv->tai_khoan->ten_doc_gia;
        }


        $topDoanhThu = User::leftJoin('saches', function ($join) {
            $join->on('saches.user_id', '=', 'users.id')
                ->where('saches.kiem_duyet', '=', 'duyet');
        })
            ->leftJoin('don_hangs', function ($join) {
                $join->on('don_hangs.sach_id', '=', 'saches.id')
                    ->where('don_hangs.trang_thai', '=', 'thanh_cong');
            })
            ->select(
                'users.id AS user_id',
                'users.ten_doc_gia as ten',
                DB::raw('COUNT(DISTINCT saches.id) AS tong_so_sach_da_dang'),
                DB::raw('COUNT(don_hangs.id) AS tong_so_luot_dat'),
                DB::raw('COALESCE(SUM(don_hangs.so_tien_thanh_toan), 0) AS tong_doanh_thu')
            )
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->latest('tong_doanh_thu')
            ->limit(10)
            ->orderBy(('tong_doanh_thu'))
            ->get();

        foreach ($topDoanhThu as $doanhThu) {
            $tenDocGia[] = $doanhThu->ten;
            $tongDoanhThu[] = $doanhThu->tong_doanh_thu;
        }

        $thongKeDanhGia = User::leftJoin('danh_gias', 'danh_gias.user_id', '=', 'users.id')
            ->select(
                'users.id AS user_id',
                'users.ten_doc_gia AS ten',
                DB::raw('SUM(CASE WHEN danh_gias.muc_do_hai_long = "rat_hay" THEN 1 ELSE 0 END) AS rat_hay'),
                DB::raw('SUM(CASE WHEN danh_gias.muc_do_hai_long = "hay" THEN 1 ELSE 0 END) AS hay'),
                DB::raw('SUM(CASE WHEN danh_gias.muc_do_hai_long = "trung_binh" THEN 1 ELSE 0 END) AS trung_binh'),
                DB::raw('SUM(CASE WHEN danh_gias.muc_do_hai_long = "te" THEN 1 ELSE 0 END) AS te'),
                DB::raw('SUM(CASE WHEN danh_gias.muc_do_hai_long = "rat_te" THEN 1 ELSE 0 END) AS rat_te')
            )
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->orderBy(DB::raw('COUNT(danh_gias.id)'), 'DESC')
            ->limit(10)
            ->get();

        $labels = [];
        $data = [
            'rat_hay' => [],
            'hay' => [],
            'trung_binh' => [],
            'te' => [],
            'rat_te' => []
        ];

        foreach ($thongKeDanhGia as $item) {
            $labels[] = $item->ten;
            $data['rat_hay'][] = $item->rat_hay;
            $data['hay'][] = $item->hay;
            $data['trung_binh'][] = $item->trung_binh;
            $data['te'][] = $item->te;
            $data['rat_te'][] = $item->rat_te;
        }

        $labelsJson = json_encode($labels);
        $dataJson = json_encode($data);

        return view('admin.thong-ke.cong-tac-vien', compact(
            'topDangSach',
            'sachData',
            'ctvNames',
            'chiTietCtv',
            'tongQuan',
            'tenDocGia',
            'tongDoanhThu',
            'topDoanhThu',
            'labelsJson',
            'dataJson',
            'data'
        ));
    }


    public function getRevenueByCategory(Request $request)
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
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
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
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
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
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
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
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
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
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu')
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

    public function getSachData(Request $request)
    {
        $timeFilter = $request->input('time_filter', 'tong_quan');

        $topDangSach = Sach::with('tai_khoan')
            ->select('user_id', DB::raw('count(*) as tong_sach'))
            ->where('kiem_duyet', 'duyet');

        // Lọc theo ngày, tuần, tháng
        switch ($timeFilter) {
            case 'ds_ngay':
                $topDangSach->whereDate('created_at', Carbon::today());
                break;
            case 'ds_tuan':
                $topDangSach->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'ds_thang':
                $topDangSach->whereMonth('created_at', Carbon::now()->month);
                break;
            default:
                // Không có lọc gì thêm (tổng quan)
                break;
        }

        $topDangSach = $topDangSach->groupBy('user_id')
            ->orderBy('tong_sach', 'desc')
            ->limit(10)
            ->get();

        $sachData = [];
        $ctvNames = [];

        foreach ($topDangSach as $ctv) {
            $sachData[] = $ctv->tong_sach;
            $ctvNames[] = $ctv->tai_khoan->ten_doc_gia;
        }

        return response()->json([
            'sachData' => $sachData,
            'ctvNames' => $ctvNames
        ]);
    }
}
