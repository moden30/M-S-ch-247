<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhGiaAjaxController extends Controller
{
    public function getDanhGia(Request $request)
    {
        $limit = 3;
        $page = $request->input('page', 1);

        $danhGia = DanhGia::with('user')
            ->where('sach_id', $request->input('sach_id'))
            ->orderBy('ngay_danh_gia', 'desc')->latest('id')
            ->paginate($limit, ['*'], 'page', $page);


        $danhGia->getCollection()->transform(function ($item) {
            $filePath = 'public/' . $item->user->hinh_anh;
            if ($item->user->hinh_anh && Storage::exists($filePath)) {
                $item->user->hinh_anh_url = Storage::url($item->user->hinh_anh);
            } else {
                $item->user->hinh_anh_url = asset('assets/admin/images/users/user-dummy-img.jpg');
            }
            return $item;
        });

        return response()->json($danhGia);
    }
}
