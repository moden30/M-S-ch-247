<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KiemDuyetCongTacVien;
use App\Models\User;
use Illuminate\Http\Request;

class KiemDuyetCongTacVienController extends Controller
{
    public function index() {
        $congTacViens = KiemDuyetCongTacVien::with('user')->get();
        return view('admin.kiem-duyet-cong-tac-vien.index', compact('congTacViens'));
    }

    // Sử lý chuyển đổi trạng thái
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $contact = KiemDuyetCongTacVien::find($id);

        if ($contact) {
            $currentStatus = $contact->trang_thai;

            // Trạng thái
            if (
                // Khi ở trạng thái 'tu_choi' sẽ không chuyển về trạng thái 'duyet'
                ($currentStatus == 'tu_choi' && $newStatus == 'duyet') ||
                // Khi ở trạng thái 'tu_choi' sẽ không chuyển về trạng thái 'chua_ho_tro'
                ($currentStatus == 'tu_choi' && $newStatus == 'chua_ho_tro') ||
                // Khi ở trạng thái 'duyet' sẽ không chuyển về trạng thái 'tu_choi'
                ($currentStatus == 'duyet' && $newStatus == 'tu_choi')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            // Cập nhật trạng thái
            $contact->trang_thai = $newStatus;

            // Nếu trạng thái mới là 'duyet', cập nhật vai trò của người dùng thành 'cộng tác viên'
            if ($newStatus === 'duyet') {
                $user = User::find($contact->user_id);
                if ($user) {
                    $user->vai_tros()->sync([4]);
                }
            }
            $contact->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    // chi tiết
    public function show($id)
    {
        $kiemDuyet = KiemDuyetCongTacVien::findOrFail($id);
        return view('admin.kiem-duyet-cong-tac-vien.chi-tiet-kiem-duyet', compact('kiemDuyet'));
    }
}
