<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BanSaoChuong;
use App\Models\Chuong;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    public function chiTietChuong($sachId, $chuongId)
    {
        $chuong = Chuong::with('sach')->find($chuongId);
        if (!$chuong) {
            $chuong = BanSaoChuong::with('sach')->where('chuong_id', $chuongId)->orderBy('so_phien_ban', 'desc')->first();
            if (!$chuong) {
                abort(404, 'Chương hoặc bản sao chương không tồn tại.');
            }
        }

        if ($chuong->kiem_duyet != 'duyet') {
            $chuongBanSao = BanSaoChuong::with('sach')->where('chuong_id', $chuongId)->orderBy('so_phien_ban', 'desc')->first();
            if ($chuongBanSao) {
                $chuong = $chuongBanSao;
            } else {
                abort(403, 'Chương chưa được duyệt.');
            }
        }
        $countText = str_word_count(strip_tags($chuong->noi_dung));
        $danhSachChuong = Chuong::where('sach_id', $chuong->sach->id)->get();

        // Lấy chương tiếp theo (cùng sách)
        $nextChuong = Chuong::where('sach_id', $chuong->sach->id)
            ->where('id', '>', $chuongId)
            ->first();

        // Lấy chương trước (cùng sách)
        $backChuong = Chuong::where('sach_id', $chuong->sach->id)
            ->where('id', '<', $chuongId)
            ->orderBy('id', 'desc')
            ->first();

        return view('client.pages.doc-sach', compact('chuong', 'countText', 'danhSachChuong', 'nextChuong', 'backChuong'));
    }

    public function luotXem(Request $request)
    {
        $validated = $request->validate([
            'chuong_id' => 'required|exists:chuongs,id',
        ]);
        $chuong = Chuong::findOrFail($validated['chuong_id']);
        $sach = $chuong->sach;
        $sach->increment('luot_xem');
        return response()->json(['message' => 'Lượt xem đã được cập nhật'], 200);
    }



}
