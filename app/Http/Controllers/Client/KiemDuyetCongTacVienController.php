<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\KiemDuyetCongTacVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KiemDuyetCongTacVienController extends Controller
{
    public function store(Request $request)
    {
//        dd($request->all());
        $userId = Auth::user()->id;
        $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:kiem_duyet_cong_tac_viens,email,' . $userId,
            'so_dien_thoai' => 'required|numeric',
            'dia_chi' => 'required|string|max:255',
            'sinh_nhat' => 'required|date',
            'gioi_tinh' => 'required|string|in:Nam,Nữ',
            'cmnd_mat_truoc' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cmnd_mat_sau' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ok' => 'accepted'
        ]);

        $cmnd_mat_truoc = $request->file('cmnd_mat_truoc')->store('uploads/cmnd', 'public');
        $cmnd_mat_sau = $request->file('cmnd_mat_sau')->store('uploads/cmnd', 'public');

        $congTacVien = new KiemDuyetCongTacVien();
        $congTacVien->ten_doc_gia = $request->ten_doc_gia;
        $congTacVien->email = $request->email;
        $congTacVien->so_dien_thoai = $request->so_dien_thoai;
        $congTacVien->dia_chi = $request->dia_chi;
        $congTacVien->sinh_nhat = $request->sinh_nhat;
        $congTacVien->gioi_tinh = $request->gioi_tinh;
        $congTacVien->cmnd_mat_truoc = $cmnd_mat_truoc;
        $congTacVien->cmnd_mat_sau = $cmnd_mat_sau;
        $congTacVien->user_id = Auth::id();
        $congTacVien->save();

        return redirect()->back()->with('success', 'Đăng ký thành công.');
    }
}
