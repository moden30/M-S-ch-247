<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
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
        $slider = Banner::with('hinhAnhBanner')
            ->where('loai_banner', '=', 'slider')
            ->where('trang_thai', '=', 'hien')
            ->first();

        // $topBooks = Sach::withAvg([
        //     'danhGias as diem_trung_binh' => function ($query) {
        //         $query->selectRaw('CASE
        //                 WHEN danh_gia = "rat_hay" THEN 10
        //                 WHEN danh_gia = "hay" THEN 8
        //                 WHEN danh_gia = "trung_binh" THEN 5
        //                 WHEN danh_gia = "te" THEN 3
        //                 WHEN danh_gia = "rat_te" THEN 1
        //             END');
        //     }
        // ])
        //     ->whereHas('danh_gias', function ($query) {
        //         $query->whereMonth('created_at', 10);
        //     })
        //     ->orderByDesc('diem_trung_binh')
        //     ->limit(5)
        //     ->get();

        //     dd($topBooks);


        return view('client.home', [
            'hotBooks' => Sach::orderBy('luot_xem', 'desc')->get(),
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
            'slider' => $slider
        ]);
    }
}
