<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeDanhGiaController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:thong-ke-danh-gia')->only('sachDanhGiaCaoNhat');
    }
    public function sachDanhGiaCaoNhat(Request $request)
    {
        $danh_sach_sach = Sach::all();

        // Lấy tham số từ request
        $sach_id = $request->input('sach_id');
        $muc_do_hai_long = $request->input('muc_do_hai_long');
        $loai_thoi_gian = $request->input('loai_thoi_gian');
        $ngay_bat_dau = $request->input('ngay_bat_dau');

        // Query đánh giá theo sách và mức độ hài lòng nếu có
        $query = DanhGia::query();

        if ($sach_id) {
            $query->where('sach_id', $sach_id);
        }

        if ($muc_do_hai_long) {
            $query->where('muc_do_hai_long', $muc_do_hai_long);
        }

        // Lọc theo thời gian nếu người dùng chọn
        if ($loai_thoi_gian && $ngay_bat_dau) {
            switch ($loai_thoi_gian) {
                case 'ngay':
                    $query->whereDate('created_at', $ngay_bat_dau);
                    break;
                case 'tuan':
                    $query->whereBetween('created_at', [Carbon::parse($ngay_bat_dau)->startOfWeek(), Carbon::parse($ngay_bat_dau)->endOfWeek()]);
                    break;
                case 'thang':
                    $query->whereMonth('created_at', Carbon::parse($ngay_bat_dau)->month)
                        ->whereYear('created_at', Carbon::parse($ngay_bat_dau)->year);
                    break;
                case 'nam':
                    $query->whereYear('created_at', Carbon::parse($ngay_bat_dau)->year);
                    break;
            }
        }

        // Tính tổng số lượt đánh giá theo từng mức độ hài lòng
        $tong_danh_gia = $query->select('muc_do_hai_long')
            ->selectRaw('COUNT(*) as so_luong')   // Tính tổng số lượt đánh giá
            ->groupBy('muc_do_hai_long')
            ->get()
            ->pluck('so_luong', 'muc_do_hai_long');

        // Tính tổng tất cả các lượt đánh giá
        $total = $tong_danh_gia->sum();

        // Tính số lượt đánh giá cho từng mức độ
        $luot_danh_gia_rat_hay = $tong_danh_gia->get('rat_hay', 0);
        $luot_danh_gia_hay = $tong_danh_gia->get('hay', 0);
        $luot_danh_gia_trung_binh = $tong_danh_gia->get('trung_binh', 0);
        $luot_danh_gia_te = $tong_danh_gia->get('te', 0);
        $luot_danh_gia_rat_te = $tong_danh_gia->get('rat_te', 0);

        // Tính phần trăm cho từng mức độ nếu có lượt đánh giá
        $phan_tram_rat_hay = $total > 0 ? round(($luot_danh_gia_rat_hay / $total) * 100, 2) : 0;
        $phan_tram_hay = $total > 0 ? round(($luot_danh_gia_hay / $total) * 100, 2) : 0;
        $phan_tram_trung_binh = $total > 0 ? round(($luot_danh_gia_trung_binh / $total) * 100, 2) : 0;
        $phan_tram_te = $total > 0 ? round(($luot_danh_gia_te / $total) * 100, 2) : 0;
        $phan_tram_rat_te = $total > 0 ? round(($luot_danh_gia_rat_te / $total) * 100, 2) : 0;

        // Nếu yêu cầu là AJAX thì trả về JSON để cập nhật biểu đồ
        if ($request->ajax()) {
            return response()->json([
                'phan_tram_rat_hay' => $phan_tram_rat_hay,
                'phan_tram_hay' => $phan_tram_hay,
                'phan_tram_trung_binh' => $phan_tram_trung_binh,
                'phan_tram_te' => $phan_tram_te,
                'phan_tram_rat_te' => $phan_tram_rat_te,
                'luot_danh_gia' => [
                    'rat_hay' => $luot_danh_gia_rat_hay,
                    'hay' => $luot_danh_gia_hay,
                    'trung_binh' => $luot_danh_gia_trung_binh,
                    'te' => $luot_danh_gia_te,
                    'rat_te' => $luot_danh_gia_rat_te,
                ]
            ]);
        }

        // Nhận giá trị lọc thời gian cho sách và bài viết
        $timeFilterSach = $request->input('time_filter_sach', 'all');
        $timeFilterBaiViet = $request->input('time_filter_baiviet', 'all');

        $querySach = Sach::with('theLoai')->withCount('nguoiYeuThich');
        if ($timeFilterSach != 'all') {
            switch ($timeFilterSach) {
                case 'ngay':
                    $querySach->whereDate('created_at', Carbon::today());
                    break;
                case 'tuan':
                    $querySach->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'thang':
                    $querySach->whereMonth('created_at', Carbon::now()->month);
                    break;
                case 'nam':
                    $querySach->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }

        $queryBaiViet = BaiViet::withCount('binhLuans');
        if ($timeFilterBaiViet != 'all') {
            switch ($timeFilterBaiViet) {
                case 'ngay':
                    $queryBaiViet->whereDate('created_at', Carbon::today());
                    break;
                case 'tuan':
                    $queryBaiViet->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'thang':
                    $queryBaiViet->whereMonth('created_at', Carbon::now()->month);
                    break;
                case 'nam':
                    $queryBaiViet->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }

        // Luôn lấy top 10 dựa trên lượt yêu thích hoặc bình luận nhiều nhất
        $hienThiYeuThich = $querySach->orderBy('nguoi_yeu_thich_count', 'desc')->take(10)->get();
        $topBaiVietBinhLuan = $queryBaiViet->orderByDesc('binh_luans_count')->take(10)->get();

        return view('admin.thong-ke.thong-ke-sach-danh-gia-cao-nhat', compact(
            'phan_tram_rat_hay',
            'phan_tram_hay',
            'phan_tram_trung_binh',
            'phan_tram_te',
            'phan_tram_rat_te',
            'danh_sach_sach',
            'luot_danh_gia_rat_hay',
            'luot_danh_gia_hay',
            'luot_danh_gia_trung_binh',
            'luot_danh_gia_te',
            'luot_danh_gia_rat_te',
            'hienThiYeuThich',
            'topBaiVietBinhLuan',
            'timeFilterSach',
            'timeFilterBaiViet'
        ));
    }
}
