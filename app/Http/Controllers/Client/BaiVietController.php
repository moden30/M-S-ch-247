<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index()
    {
        // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
        $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
            ->whereNull('chuyen_muc_cha_id')
            ->get();

        // Lấy danh sách bài viết, phân trang với 9 bài mỗi trang
        $baiViets = BaiViet::paginate(9);

        // Lấy top 10 bài viết được bình luận nhiều nhất
        $topBaiViets = BaiViet::withCount('binhLuans')
            ->orderBy('binh_luans_count', 'desc')
            ->take(10)
            ->get();

        return view('client.pages.bai-viet', compact(
            'chuyenMucs',
            'baiViets',
            'topBaiViets'
        ));
    }

    public function filterByChuyenMuc($id)
    {
        // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
        $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
            ->whereNull('chuyen_muc_cha_id')
            ->get();

        // Lấy bài viết theo chuyên mục
        $baiViets = BaiViet::where('chuyen_muc_id', $id)->paginate(9);

        // Lấy chuyên mục hiện tại
        $currentChuyenMuc = ChuyenMuc::findOrFail($id);

        return view('client.pages.bai-viet', compact(
            'chuyenMucs',
            'baiViets',
            'currentChuyenMuc'
        ));
    }
}
