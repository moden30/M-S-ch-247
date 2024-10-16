<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use App\Models\Sach;

class TrangChuController extends Controller
{
    public function index()
    {
        $thong_baos = ThongBao::where('user_id', auth()->id())->orderBy('created_at', 'desc')->limit(4)->get();
        $tong_thong_baos = ThongBao::where('user_id', auth()->id())->count();
        return view('client.home', [
            'hotBooks' => Sach::orderBy('luot_xem', 'desc')->get(),
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
        ]);
    }
}
