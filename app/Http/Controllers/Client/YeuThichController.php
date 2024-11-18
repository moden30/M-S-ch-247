<?php

namespace App\Http\Controllers\Client;

use App\Events\MessageSent;
use App\Events\TestPS;
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

    public function ThemYeuThich(Request $request, string $sachId)
    {
        $userId = Auth::user()->id;

        $yeuThich = YeuThich::where('user_id', $userId)
            ->where('sach_id', $sachId)
            ->first();

        if ($yeuThich) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bạn thật tuyệt vời <3'
            ]);
        } else {
            $yeuThich = new YeuThich();
            $yeuThich->sach_id = $sachId;
            $yeuThich->user_id = $userId;
            $yeuThich->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Cảm ơn bạn <3'
            ]);
        }

    }

    public function destroy($id)
    {
        $user = Auth::user();
        try {
            $yeuThich = YeuThich::query()->where('sach_id', $id)->where('user_id', $user->id)->first();
            $yeuThich->delete();
            return response()->json(['success' => true, 'message' => 'Xóa thành công!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Xóa không thành công!', 'error' => $e->getMessage()]);
        }
    }
}
