<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        try {
            $query = $request->get('query');

            if (!$query) {
                return response()->json(['error' => 'Không có sách tương ứng'], 400);
            }

            // Tìm kiếm theo tên sách, tác giả hoặc thể loại
            $saches = Sach::where('kiem_duyet', 'duyet')
                ->where('trang_thai', 'hien')
                ->where('ten_sach', 'like', "%{$query}%")
                ->limit(10)
                ->get(['ten_sach']); // Retrieve only the 'ten_sach' field

            $tacGia = User::with('vai_tros')->where('ten_doc_gia', 'like', "%{$query}%")
                ->whereHas('vai_tros', function ($q) {
                    $q->where('vai_tro_id', 4);
                })
                ->limit(10)
                ->get(['ten_doc_gia', 'id']);

            return response()->json([
                'saches' => $saches,
                'users' => $tacGia,
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }

}
