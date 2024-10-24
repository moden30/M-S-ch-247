<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KiemDuyetCongTacVien;
use Illuminate\Http\Request;

class KiemDuyetCongTacVienController extends Controller
{
    public function index() {
        $congTacViens = KiemDuyetCongTacVien::with('user')->get();
        return view('admin.kiem-duyet-cong-tac-vien.index', compact('congTacViens'));
    }
}
