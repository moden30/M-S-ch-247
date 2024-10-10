<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\Sach;
use App\Models\User;
use Illuminate\Http\Request;

class CongTacVienController extends Controller
{
    public function show($id)
    {
        $user = User::with('sach')->findOrFail($id);
        $sach = Sach::where('user_id', $user->id)
            ->with('tai_khoan')
            ->get();
        $user->sinh_nhat = \Carbon\Carbon::parse($user->sinh_nhat)->format('d-m-Y');
        return view('admin.cong-tac-vien.detail', compact('user', 'sach'));
    }


}
