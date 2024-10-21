<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    public function xemThongBao($thongBaoId)
    {
        $thongBao = ThongBao::find($thongBaoId);
        if ($thongBao && in_array(Auth::user()->id, json_decode($thongBao->user_ids, true))) {
            $thongBao->update(['trang_thai' => 'da_xem']);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy thông báo'], 404);
    }

    public function taoThongBaoDuyetSach($sach)
    {
        $congTacViens = User::whereHas('sach', function($query) use ($sach) {
            $query->where('id', $sach->id);
        })->pluck('id')->toArray();

        if (!empty($congTacViens)) {
            ThongBao::create([
                'tieu_de' => 'Sách đã được duyệt',
                'noi_dung' => 'Cuốn sách "' . $sach->ten_sach . '" đã được duyệt.',
                'user_ids' => json_encode($congTacViens),
                'trang_thai' => 'chua_xem',
            ]);
        }
    }


}
