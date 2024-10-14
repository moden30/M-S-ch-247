<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Models\Sach;

class TrangChuController extends Controller
{
    public function index()
    {
        return view('client.home', [
            'hotBooks' => Sach::orderBy('luot_xem', 'desc')->get(),
        ]);
    }
}
