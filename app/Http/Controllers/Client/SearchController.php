<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sach;
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
            $saches = Sach::where('kiem_duyet', '=', 'duyet')->where('trang_thai', '=', 'hien')->where('ten_sach', 'like', "%{$query}%")->limit(10)->get('ten_sach');


            return response()->json($saches);
        } catch (\Exception $e) {
            // Trả về lỗi với mã 500 nếu xảy ra lỗi không mong muốn
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }

}
