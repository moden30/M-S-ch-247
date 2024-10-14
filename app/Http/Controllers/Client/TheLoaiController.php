<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function index(Request $request)
    {
        $theloai = TheLoai::all();
        $sach = collect();
        if ($request->has('id')) {
            $theloaiSach = TheLoai::find($request->input('id'));
            $sach = $theloaiSach ? $theloaiSach->saches : collect();
        }
        return view('client.pages.the-loai', compact('theloai', 'sach'));
    }

}
