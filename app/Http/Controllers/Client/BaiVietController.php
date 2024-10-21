<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function filterByChuyenMuc(Request $request, $id = null)
    {
        // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
        $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
            ->whereNull('chuyen_muc_cha_id')
            ->get();

        // Lấy chuyên mục hiện tại nếu có ID
        $currentChuyenMuc = null;
        if ($id) {
            $currentChuyenMuc = ChuyenMuc::findOrFail($id);
        }

        // Lấy bài viết theo yêu cầu lọc
        $filter = $request->get('filter');

        $baiViets = BaiViet::when($id, function ($query) use ($id) {
            $query->where('chuyen_muc_id', $id);
        });

        if ($filter === 'new-chap') {
            $baiViets->orderBy('ngay_dang', 'desc');
        }

        // Thực hiện truy vấn
        $baiViets = $baiViets->get();

        // Lấy top 10 bài viết được bình luận nhiều nhất
        $topBaiViets = BaiViet::withCount('binhLuans')
            ->orderBy('binh_luans_count', 'desc')
            ->take(10)
            ->get();

        return view('client.pages.bai-viet', compact(
            'chuyenMucs',
            'baiViets',
            'currentChuyenMuc',
            'topBaiViets'
        ));
    }

    public function show($id)
    {
        // Lấy bài viết kèm theo thông tin chuyên mục, tác giả và bình luận
        $baiViet = BaiViet::with(['chuyenMuc', 'tacGia', 'binhLuans.user'])
            ->findOrFail($id);

        return view('client.pages.chi-tiet-bai-viet', compact('baiViet'));
    }
    public function addComment(Request $request, $baiVietId)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để bình luận.'], 401);
        }

        $request->validate([
            'noi_dung' => 'required|string|max:500',
        ]);

        $baiViet = BaiViet::findOrFail($baiVietId);
        $binhLuan = $baiViet->binhLuans()->create([
            'noi_dung' => $request->noi_dung,
            'user_id' => auth()->id(),
            'ngay_binh_luan' => now(),
        ]);

        return response()->json([
            'success' => true,
            'binhLuan' => $binhLuan->load('user'),
        ]);
    }
}
