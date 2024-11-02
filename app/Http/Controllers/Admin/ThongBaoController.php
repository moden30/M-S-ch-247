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


}
