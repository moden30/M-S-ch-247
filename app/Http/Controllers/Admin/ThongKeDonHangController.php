<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeDonHangController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:thong-ke-don-hang')->only('thongKeDonHang');
    }
    public function thongKeDonHang(Request $request)
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
                            'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
                            'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
                            'that_bai' => DonHang::where('trang_thai', 'that_bai')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
                            'start_of_week' => $startOfWeek->toDateString(),
                            'end_of_week' => $endOfWeek->toDateString()
                        ];

                        if ($endOfWeek->equalTo($endOfMonth)) {
                            break; // Không tiếp tục nếu đã đạt đến cuối tháng
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


        return view('admin.thong-ke.thong-ke-don-hang', compact(
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
    public function index()
    {
        //
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
