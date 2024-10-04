<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
    {
        $sachXuatBan = Sach::where('kiem_duyet','duyet')->count();

        $tongDoanhThu = DonHang::where('trang_thai','thanh_cong')->sum('so_tien_thanh_toan');

        $topBanChay = DonHang::with('sach')->where('trang_thai','thanh_cong')->get();

        return view('admin.dashboard', compact('sachXuatBan','tongDoanhThu'));
    }

    public function soLuongSachDaBan(request $request)
    {

        $sachBanChay = DonHang::with('sach')->where('trang_thai','thanh_cong');

//        if ($request->has('created_at')) {
//            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
//        }
//        $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');

        $hienThiBanChay = $sachBanChay->get();

        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact('hienThiBanChay'));
    }

    public function sachDanhGiaCaoNhat(Request $request)
    {
        $tong_danh_gia = DanhGia::selectRaw("
            SUM(CASE WHEN muc_do_hai_long = 'rat_hay' THEN 1 ELSE 0 END) as tong_rat_hay,
            SUM(CASE WHEN muc_do_hai_long = 'hay' THEN 1 ELSE 0 END) as tong_hay,
            SUM(CASE WHEN muc_do_hai_long = 'trung_binh' THEN 1 ELSE 0 END) as tong_trung_binh,
            SUM(CASE WHEN muc_do_hai_long = 'te' THEN 1 ELSE 0 END) as tong_te,
            SUM(CASE WHEN muc_do_hai_long = 'rat_te' THEN 1 ELSE 0 END) as tong_rat_te
        ")->first();

        $total = $tong_danh_gia->tong_rat_hay + $tong_danh_gia->tong_hay + $tong_danh_gia->tong_trung_binh + $tong_danh_gia->tong_te + $tong_danh_gia->tong_rat_te;

        $phan_tram_rat_hay = $total > 0 ? ($tong_danh_gia->tong_rat_hay / $total) * 100 : 0;
        $phan_tram_hay = $total > 0 ? ($tong_danh_gia->tong_hay / $total) * 100 : 0;
        $phan_tram_trung_binh = $total > 0 ? ($tong_danh_gia->tong_trung_binh / $total) * 100 : 0;
        $phan_tram_te = $total > 0 ? ($tong_danh_gia->tong_te / $total) * 100 : 0;
        $phan_tram_rat_te = $total > 0 ? ($tong_danh_gia->tong_rat_te / $total) * 100 : 0;
    
        // Lấy danh sách Top 10 sách được yêu thích
        $hienThiYeuThich = Sach::with('theLoai')  
        ->withCount('nguoiYeuThich')         
        ->orderBy('nguoi_yeu_thich_count', 'desc')
        ->take(10)                         
        ->get();

        $topBaiVietBinhLuan = BaiViet::withCount('binhLuans')  
        ->orderByDesc('binh_luans_count')  
        ->take(10)  
        ->get();
        
        return view('admin.thong-ke.thong-ke-sach-danh-gia-cao-nhat', compact(
            'phan_tram_rat_hay', 'phan_tram_hay', 'phan_tram_trung_binh', 'phan_tram_te', 'phan_tram_rat_te',
            'hienThiYeuThich', 'topBaiVietBinhLuan'
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
