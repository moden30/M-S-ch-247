<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use Illuminate\Http\Request;

class TimKiemController extends Controller
{
    public function timSach(Request $request)
    {
        $tu_khoa = $request->input('tu_khoa');
    
        // Tìm kiếm sách theo tên chứa từ khóa
        $ket_qua = Sach::where('ten_sach', 'LIKE', "%{$tu_khoa}%")->get();
    
        // Trả về kết quả dưới dạng JSON
        return response()->json($ket_qua);
    }
    
}
