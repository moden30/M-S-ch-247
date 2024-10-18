<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chuong;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    public function chiTietChuong(string $id)
    {
        $chuong = Chuong::with('sach')->find($id);
        $noiDung = $chuong->noi_dung;
        $countText = str_word_count($noiDung);
        return view('client.pages.doc-sach', compact('chuong', 'countText'));
    }
}
