<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index()
    {
        // Lấy các chuyên mục cha và chuyên mục con nhiều cấp
        $chuyenMucs = ChuyenMuc::with('chuyenMucCons.chuyenMucCons')
            ->whereNull('chuyen_muc_cha_id')
            ->get();

        return view('client.pages.bai-viet', compact('chuyenMucs'));
    }

    

    // public function index()
    // {
    //     $baiviet = BaiViet::all();
    //     $tongBV = $baiviet->count(); // Đếm tổng số bài viết

    //     return view('client.pages.bai-viet', compact(

    //         'baiviet',
    //         'tongBV'
    //     ));
    // }
}
