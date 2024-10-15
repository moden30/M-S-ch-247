<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    public function index(Request $request)
    {
        $theloai = TheLoai::all();
        $sach = collect();
        if ($request->has('id')) {
            $theloaiSach = TheLoai::find($request->input('id'));
            if ($theloaiSach) {
                $sach = $theloaiSach->saches->map(function($item) {
                    $item->anh_bia_sach = Storage::url($item->anh_bia_sach);
                    return $item;
                });
            }
        }
        if ($request->ajax()) {
            return response()->json([
                'sach' => $sach,
                'total' => $sach->count(),
            ]);
        }
        return view('client.pages.the-loai', compact('theloai', 'sach'));
    }

}
