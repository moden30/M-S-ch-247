<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
    {
        $sachXuatBan = Sach::where('kiem_duyet', 'duyet')->count();

        $tongDoanhThu = DonHang::where('trang_thai', 'thanh_cong')->sum('so_tien_thanh_toan');

        $topBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong')->get();

        return view('admin.dashboard', compact('sachXuatBan', 'tongDoanhThu'));
    }

    public function soLuongSachDaBan(request $request)
    {

        $sachBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong');

        //        if ($request->has('created_at')) {
        //            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
        //        }
        // $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');
        //        if ($request->has('created_at')) {
        //            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
        //        }
        //        $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');

        $hienThiBanChay = $sachBanChay->get();

        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact('hienThiBanChay'));
    }

    // public function thongKeDonHang(Request $request)
    // {
    //     $selectedYear = $request->input('year', now()->year);
    //     $startDate = $request->input('start_date', Carbon::today()->toDateString());
    //     $endDate = $request->input('end_date', Carbon::today()->toDateString());

    //     $listDonHang = DonHang::with(['sach', 'user', 'phuongThucThanhToan'])
    //         ->orderByDesc('id')
    //         ->get();

    //     $tongDonHangHomNay = DonHang::where('trang_thai', 'thanh_cong')
    //         ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
    //         ->count();



    //     $tongDongHangHomQua = DonHang::where('trang_thai', 'thanh_cong')
    //         ->where('created_at', '>=', now()->subDay()->startOfDay())
    //         ->where('created_at', '<=', now()->subDay()->endOfDay())
    //         ->count();

    //     // Tính phần trăm
    //     $phanTram = 0;
    //     if ($tongDongHangHomQua > 0) {
    //         $phanTram = (($tongDonHangHomNay - $tongDongHangHomQua) / $tongDongHangHomQua) * 100;
    //         $phanTram = number_format($phanTram, 2);
    //     } elseif ($tongDongHangHomQua == 0) {
    //         $phanTram = $tongDonHangHomNay > 0 ? 100 : 0;
    //     }

    //     // Tính doanh thu
    //     $tongDoanhThuHomNay = DonHang::where('trang_thai', 'thanh_cong')
    //     ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
    //         ->sum('so_tien_thanh_toan');

    //     $tongDoanhThuHomQua = DonHang::where('trang_thai', 'thanh_cong')
    //         ->where('created_at', '>=', now()->subDay()->startOfDay())
    //         ->where('created_at', '<=', now()->subDay()->endOfDay())
    //         ->sum('so_tien_thanh_toan');

    //     // Hóa đơn chưa thanh toán
    //     $hoaDonHomNay = DonHang::where('trang_thai', 'dang_xu_ly')
    //     ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
    //         ->count();

    //     $hoaDonHomQua = DonHang::where('trang_thai', 'dang_xu_ly')
    //         ->where('created_at', '>=', now()->subDay()->startOfDay())
    //         ->where('created_at', '<=', now()->subDay()->endOfDay())
    //         ->count();

    //     // Hóa đơn hủy
    //     $hoaDonHuyHomNay = DonHang::where('trang_thai', 'that_bai')
    //     ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
    //         ->count();

    //     $hoaDonHuyHomQua = DonHang::where('trang_thai', 'that_bai')
    //         ->where('created_at', '>=', now()->subDay()->startOfDay())
    //         ->where('created_at', '<=', now()->subDay()->endOfDay())
    //         ->count();



    //     // Thống kê theo tháng hiện tại (4 tuần)
    //     $currentDate = now();
    //     $startOfMonth = $currentDate->copy()->startOfMonth();
    //     $endOfMonth = $currentDate->copy()->endOfMonth();
    //     $thongKeTuan = [];

    //     for ($week = 0; $week < 4; $week++) {
    //         $startOfWeek = $startOfMonth->copy()->addWeeks($week)->startOfWeek();
    //         $endOfWeek = $startOfMonth->copy()->addWeeks($week)->endOfWeek();

    //         if ($endOfWeek->greaterThan($endOfMonth)) {
    //             $endOfWeek = $endOfMonth;
    //         }

    //         $tongDonHangThanhCong = DonHang::where('trang_thai', 'thanh_cong')
    //             ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //             ->count();

    //         $tongDonHangDangXuLy = DonHang::where('trang_thai', 'dang_xu_ly')
    //             ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //             ->count();

    //         $tongDonHangThatBai = DonHang::where('trang_thai', 'that_bai')
    //             ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    //             ->count();

    //         $thongKeTuan[] = [
    //             'tuan' => "Tuần " . ($week + 1),
    //             'thanh_cong' => $tongDonHangThanhCong,
    //             'dang_xu_ly' => $tongDonHangDangXuLy,
    //             'that_bai' => $tongDonHangThatBai,
    //             'start_of_week' => $startOfWeek->toDateString(),
    //             'end_of_week' => $endOfWeek->toDateString(),
    //         ];

    //         if ($endOfWeek->equalTo($endOfMonth)) {
    //             break;
    //         }
    //     }

    //     // Thống kê theo 12 tháng trong năm hiện tại
    //     $currentYear = now()->year;
    //     $thongKeThang = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $startOfMonth = now()->setYear($currentYear)->setMonth($month)->startOfMonth();
    //         $endOfMonth = now()->setYear($currentYear)->setMonth($month)->endOfMonth();

    //         $tongDonHangThanhCong = DonHang::where('trang_thai', 'thanh_cong')
    //             ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    //             ->count();

    //         $tongDonHangDangXuLy = DonHang::where('trang_thai', 'dang_xu_ly')
    //             ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    //             ->count();

    //         $tongDonHangThatBai = DonHang::where('trang_thai', 'that_bai')
    //             ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    //             ->count();

    //         $thongKeThang[] = [
    //             'thang' => "Tháng " . $month,
    //             'thanh_cong' => $tongDonHangThanhCong,
    //             'dang_xu_ly' => $tongDonHangDangXuLy,
    //             'that_bai' => $tongDonHangThatBai,
    //             'start_of_month' => $startOfMonth->toDateString(),
    //             'end_of_month' => $endOfMonth->toDateString(),
    //         ];
    //     }


    //     $currentYear = now()->year;
    //     $thongKeQuy = [];

    //     for ($quy = 1; $quy <= 4; $quy++) {
    //         // Determine the start and end months of each quarter
    //         switch ($quy) {
    //             case 1:
    //                 $startMonth = 1; // January
    //                 $endMonth = 3; // March
    //                 break;
    //             case 2:
    //                 $startMonth = 4; // April
    //                 $endMonth = 6; // June
    //                 break;
    //             case 3:
    //                 $startMonth = 7; // July
    //                 $endMonth = 9; // September
    //                 break;
    //             case 4:
    //                 $startMonth = 10; // October
    //                 $endMonth = 12; // December
    //                 break;
    //         }

    //         $startOfQuarter = now()->setYear($currentYear)->setMonth($startMonth)->startOfMonth()->startOfDay();
    //         $endOfQuarter = now()->setYear($currentYear)->setMonth($endMonth)->endOfMonth()->endOfDay();

    //         $tongDonHangThanhCongQuy = DonHang::where('trang_thai', 'thanh_cong')
    //             ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
    //             ->count();

    //         $tongDonHangDangXuLyQuy = DonHang::where('trang_thai', 'dang_xu_ly')
    //             ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
    //             ->count();

    //         $tongDonHangThatBaiQuy = DonHang::where('trang_thai', 'that_bai')
    //             ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
    //             ->count();

    //         $thongKeQuy[] = [
    //             'quy' => "Quý " . $quy,
    //             'thanh_cong' => $tongDonHangThanhCongQuy,
    //             'dang_xu_ly' => $tongDonHangDangXuLyQuy,
    //             'that_bai' => $tongDonHangThatBaiQuy,
    //             'start_of_quarter' => $startOfQuarter->toDateString(),
    //             'end_of_quarter' => $endOfQuarter->toDateString(),
    //         ];
    //     }

    //     $years = range(2020, now()->year); // Tạo một mảng các năm từ 2024 đến năm hiện tại
    //     $annualData = []; // Khởi tạo mảng để lưu trữ dữ liệu thống kê hàng năm

    //     foreach ($years as $year) {
    //         $startOfYear = now()->setYear($year)->startOfYear(); // Thiết lập ngày đầu tiên của năm
    //         $endOfYear = now()->setYear($year)->endOfYear(); // Thiết lập ngày cuối cùng của năm

    //         // Thống kê số lượng đơn hàng theo trạng thái trong từng năm
    //         $annualData[$year] = [
    //             'thanh_cong' => DonHang::where('trang_thai', 'thanh_cong')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
    //             'dang_xu_ly' => DonHang::where('trang_thai', 'dang_xu_ly')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
    //             'that_bai' => DonHang::where('trang_thai', 'that_bai')->whereBetween('created_at', [$startOfYear, $endOfYear])->count(),
    //         ];
    //     }

    //     // Bây giờ $annualData chứa dữ liệu thống kê cho mỗi năm từ 2024 đến năm hiện tại


    //     return view('admin.thong-ke.thong-ke-don-hang', compact(
    //         'selectedYear',
    //         'listDonHang',
    //         'tongDonHangHomNay',
    //         'tongDongHangHomQua',
    //         'phanTram',
    //         'tongDoanhThuHomNay',
    //         'tongDoanhThuHomQua',
    //         'hoaDonHomNay',
    //         'hoaDonHomQua',
    //         'hoaDonHuyHomNay',
    //         'hoaDonHuyHomQua',
    //         'thongKeTuan', // Thêm dữ liệu thống kê theo tuần vào view
    //         'thongKeThang', // Dữ liệu thống kê theo tháng trong năm hiện tại
    //         'thongKeQuy', // Dữ liệu thống kê theo quý trong năm hiện tại
    //         'annualData' // Use this variable to pass fiscal year data to the view
    //     ));
    // }

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
