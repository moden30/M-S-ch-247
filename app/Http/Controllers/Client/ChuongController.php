<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BanSaoChuong;
use App\Models\Chuong;
use App\Models\GhiChu;
use App\Models\User;
use App\Models\UserSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChuongController extends Controller
{
    public function chiTietChuong($sachId, $chuongId)
    {
        $user = auth()->user();
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


        $chuongDaDoc = [];
        $soLuongChuongDaDoc = 0;
        if ($user) {
            $userSach = UserSach::where('user_id', $user->id)->where('sach_id', $sachId)->first();
            $chuongDaDoc = $userSach ? json_decode($userSach->chuong_da_doc, true) : [];
            $soLuongChuongDaDoc = is_array($chuongDaDoc) ? count($chuongDaDoc) : 0;
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
        $notes = GhiChu::where('chuong_id', $chuongId)->where('user_id', $user->id)->get();

        if ($notes->isNotEmpty()) {
            foreach ($notes as $note) {
                // Thực hiện thay thế các đoạn văn bản được ghi chú
                $chuong->noi_dung = str_replace(
                    $note->ghi_chu,
                    '<span class="highlight" data-id="' . $note->id . '" style="background-color: ' . htmlspecialchars($note->mau_sac) . '" title="' . htmlspecialchars($note->tieu_de) . '">' . htmlspecialchars($note->ghi_chu) . '</span>',
                    $chuong->noi_dung
                );
            }
        }

        return view('client.pages.doc-sach', compact('chuong', 'countText', 'danhSachChuong', 'nextChuong', 'backChuong', 'chuongDaDoc', 'soLuongChuongDaDoc', 'notes'));
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

    public function luuGhiChu(Request $request)
    {

        $validated = $request->validate([
            'content' => 'required|string',
            'color' => 'required|string',
            'element_id' => 'required|string',
            'chapter_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $note = new GhiChu;
        $note->tieu_de = $validated['content'];
        $note->mau_sac = $validated['color'];
        $note->ghi_chu = $validated['element_id'];
        $note->chuong_id = $validated['chapter_id'];
        $note->user_id = $validated['user_id'];
        $note->save();

        return response()->json(['message' => 'Ghi chú đã được lưu thành công!']);
    }
    public function xoaGhiChu($id)
    {
        $ghiChu = GhiChu::find($id);

        if ($ghiChu) {
            $ghiChu->delete();
            return response()->json(['success' => true, 'message' => 'Ghi chú đã được xóa thành công.']);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy ghi chú.']);
    }




}
