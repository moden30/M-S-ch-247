<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Storage;

class YeuThichController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Lấy danh sách sách yêu thích của người dùng 
        $sachYeuThich = YeuThich::with('sach.theLoai')
            ->where('user_id', $user->id)
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien')
                    ->whereHas('theLoai', function ($query) {
                        $query->where('trang_thai', 'hien');
                    });
            })
            ->get();

        return view('client.pages.yeu-thich', compact('sachYeuThich'));
    }

    public function destroy($id)
    {
        try {
            $yeuThich = YeuThich::findOrFail($id);
            $yeuThich->delete();
            return response()->json(['success' => true, 'message' => 'Xóa thành công!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Xóa không thành công!', 'error' => $e->getMessage()]);
        }
    }
}
