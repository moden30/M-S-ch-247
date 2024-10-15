<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index()
    {
        $baiviet = BaiViet::all();
        $tongBV = $baiviet->count();
        return view('client.pages.bai-viet', compact('baiviet', 'tongBV'));
    }

}
