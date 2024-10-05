<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
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
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->count();



        $tongDongHangHomQua = DonHang::where('trang_thai', 'thanh_cong')
            ->where('created_at', '>=', now()->subDay()->startOfDay())
            ->where('created_at', '<=', now()->subDay()->endOfDay())
            ->count();

        // Tính phần trăm
        $phanTram = 0;
        if ($tongDongHangHomQua > 0) {
            $phanTram = (($tongDonHangHomNay - $tongDongHangHomQua) / $tongDongHangHomQua) * 100;
            $phanTram = number_format($phanTram, 2);
        } elseif ($tongDongHangHomQua == 0) {
            $phanTram = $tongDonHangHomNay > 0 ? 100 : 0;
        }

        // Tính doanh thu
        $tongDoanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
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
        return view('admin.dashboard', compact(
            'soLuongCongTacVien',
            'doanhThuTuan',
            'doanhThuThang',
            'doanhThuQuy',
            'doanhThuNam',
            'selectedYear',
            'listDonHang',
            'tongDonHangHomNay',
            'tongDongHangHomQua',
            'phanTram',
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
                    ->select('the_loais.ten_the_loai',
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '2': // Tuần
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereBetween('don_hangs.created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->select('the_loais.ten_the_loai',
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '3': // Tháng
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereMonth('don_hangs.created_at', now()->month)
                    ->select('the_loais.ten_the_loai',
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '4': // Năm
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereYear('don_hangs.created_at', now()->year)
                    ->select('the_loais.ten_the_loai',
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
                    ->groupBy('the_loais.ten_the_loai')
                    ->get();
                break;
            case '5': // Quý
                $doanhThuTheoTheLoai = DB::table('don_hangs')
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->whereRaw('QUARTER(don_hangs.created_at) = QUARTER(NOW())')
                    ->select('the_loais.ten_the_loai',
                        DB::raw('SUM(don_hangs.so_tien_thanh_toan) as tong_doanh_thu'))
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
