<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    public function index(Request $request, $id)
    {
        $sach = collect();
        $theloaiSach = TheLoai::find($id);

        if ($theloaiSach) {
            // Lấy sách thuộc thể loại
            $sach = $theloaiSach->saches->map(function ($anh) {
                $anh->anh_bia_sach = Storage::url($anh->anh_bia_sach);
                return $anh;
            });
            // Lọc
            if ($request->has('filter')) {
                $kiemDuyet = $request->input('filter');
                $sach = $sach->filter(function ($item) use ($kiemDuyet) {
                    switch ($kiemDuyet) {
                        case 'new-chap':
                            return $item->created_at >= now()->subMonth() && $item->kiem_duyet === 'duyet';
                        case 'ticket_new':
                            return $item->tinh_trang_cap_nhat === 'da_full' && $item->kiem_duyet === 'duyet';
                        case 'new':
                            return $item->tinh_trang_cap_nhat === 'tiep_tuc_cap_nhat' && $item->kiem_duyet === 'duyet';
                        default:
                            return $item->kiem_duyet === 'duyet';
                    }
                });
            }
            // Top 10 sách bán chạy dựa trên đơn hàng thành công
            $topSachs = DB::table('don_hangs')
                ->select('sach_id', DB::raw('COUNT(*) as total_sales'))
                ->where('trang_thai', 'thanh_cong')
                ->whereIn('sach_id', $theloaiSach->saches->pluck('id'))
                ->groupBy('sach_id')
                ->orderBy('total_sales', 'desc')
                ->limit(10)
                ->get();
            $topSachsTL = Sach::whereIn('id', $topSachs->pluck('sach_id'))->get();
            $topSachsTL->map(function ($sach) {
                $sach->anh_bia_sach = Storage::url($sach->anh_bia_sach);
                return $sach;
            });
            if ($request->ajax()) {
                return response()->json([
                    'sach' => $sach,
                    'top_sachs' => $topSachsTL,
                    'total' => $sach->count(),
                ]);
            }
            $theLoai = $theloaiSach;
            return view('client.pages.the-loai', compact('theLoai', 'sach', 'topSachsTL', 'id'));
        }
        return redirect()->back()->with('error', 'Không tìm thấy thể loại.');
    }

}
