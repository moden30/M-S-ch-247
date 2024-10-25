<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KiemDuyetCongTacVien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            if (
                ($currentStatus == 'tu_choi' && $newStatus == 'duyet') ||
                ($currentStatus == 'tu_choi' && $newStatus == 'chua_ho_tro') ||
                ($currentStatus == 'duyet' && $newStatus == 'tu_choi') ||
                ($currentStatus == 'duyet' && $newStatus == 'chua_ho_tro')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }
            $contact->trang_thai = $newStatus;
            if ($newStatus === 'duyet') {
                $user = User::find($contact->user_id);
                if ($user) {
                    $user->vai_tros()->sync([4]);
                }
            }
            $contact->save();

            $tieuDe = '';
            $noiDung = '';
            if ($newStatus === 'duyet') {
                $tieuDe = 'Yêu cầu làm cộng tác viên đã được duyệt';
                $noiDung = 'Chúc mừng! Yêu cầu của bạn đã được duyệt. Bạn đã trở thành cộng tác viên.';
            } elseif ($newStatus === 'tu_choi') {
                $tieuDe = 'Yêu cầu làm cộng tác viên đã bị từ chối';
                $noiDung = 'Rất tiếc, yêu cầu của bạn đã bị từ chối. Vui lòng liên hệ để biết thêm thông tin.';
            }

            DB::table('thong_baos')->insert([
                'user_id' => $contact->user_id,
                'tieu_de' => $tieuDe,
                'noi_dung' => $noiDung,
                'trang_thai' => 'chua_xem',
                'url' => null,
                'type' => 'kiemDuyetCTV',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

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
