<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chuong;
use App\Models\LuuViTriDoc;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    public function chiTietChuong($sachId, $chuongId, $name)
    {
        $chuong = Chuong::with('sach')->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->findOrFail($chuongId);
        $noiDung = $chuong->noi_dung;
        $countText = str_word_count($noiDung);
        $danhSachChuong = Chuong::where('sach_id', $chuong->sach->id)->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')->get();

        // Lấy chương tiếp theo (cùng sách)
        $nextChuong = Chuong::where('sach_id', $chuong->sach->id)->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')
            ->where('id', '>', $chuongId)
            ->first();

        // Lấy chương trước (cùng sách)
        $backChuong = Chuong::where('sach_id', $chuong->sach->id)->where('trang_thai', 'hien')->where('kiem_duyet', 'duyet')
            ->where('id', '<', $chuongId)
            ->orderBy('id', 'desc')
            ->first();

        // Lấy thông tin điểm đánh dấu cho chương này
        $highlight = LuuViTriDoc::where('user_id', auth()->id())
            ->where('chuong_id', $chuongId)
            ->first();

        return view('client.pages.doc-sach', compact('chuong', 'countText', 'danhSachChuong', 'nextChuong', 'backChuong', 'highlight'));
    }
    public function luuViTriChuong(Request $request)
    {
        $validated = $request->validate([
            'sach_id' => 'required|integer',
            'chuong_id' => 'required|integer',
            'position' => 'required|integer',
            'highlight_text' => 'nullable|string',
        ]);

        LuuViTriDoc::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'sach_id' => $validated['sach_id'],
                'chuong_id' => $validated['chuong_id']
            ],
            [
                'position' => $validated['position'],
                'highlight_text' => $validated['highlight_text'],
            ]
        );

        return response()->json(['message' => 'Điểm đánh dấu đã được lưu.']);
    }


}
