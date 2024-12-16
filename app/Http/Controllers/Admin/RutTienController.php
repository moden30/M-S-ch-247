<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\CashoutReqestStatusEmailJob;
use App\Models\RutTien;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RutTienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachYeuCau = RutTien::with('user')
            ->orderByRaw("CASE WHEN trang_thai = 'dang_xu_ly' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.cong-tac-vien.yeu-cau-rut-tien', compact('danhSachYeuCau'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chiTietYeuCau = RutTien::findOrFail($id);

        return view('admin.cong-tac-vien.chi-tiet-rut-tien', compact('chiTietYeuCau'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $newStatus = $request->input('status');
            $contact = RutTien::query()->findOrFail($id);
            if (!$contact) {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy yêu cầu.'], 404);
            }

            $currentStatus = $contact->trang_thai;
            if ($currentStatus === "da_duyet") {
                return response()->json(['success' => false, 'message' => 'Yêu cầu này đã được xử lý trước đó. Bạn không thể xử lý.'], 403);
            } else if ($currentStatus === "da_huy") {
                return response()->json(['success' => false, 'message' => 'Yêu cầu này đã được xử lý trước đó. Bạn không thể xử lý.'], 403);
            }

            if (
                ($currentStatus == 'da_duyet' && $newStatus == 'dang_xu_ly') ||
                ($currentStatus == 'da_duyet' && $newStatus == 'da_huy') ||
                ($currentStatus == 'da_huy' && $newStatus == 'da_duyet') ||
                ($currentStatus == 'da_huy' && $newStatus == 'dang_xu_ly')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            $user = $contact->user;

            if ($newStatus == 'da_duyet') {
                if (!$user || $user->so_du < $contact->so_tien) {
                    return response()->json(['success' => false, 'message' => 'Số dư của cộng tác viên không đủ để duyệt yêu cầu rút tiền.'], 403);
                }
                $user->so_du -= $contact->so_tien;
                $user->save();
            }
            $contact->trang_thai = $newStatus;
            if ($request->hasFile('anh_ket_qua')) {
                // Lấy file từ request
                $file = $request->file('anh_ket_qua');

                // Tạo tên file mới bằng cách kết hợp thời gian và tên gốc (hoặc chỉ dùng thời gian)
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Lưu file vào thư mục 'anh_ket_qua' trong 'storage/app/public'
                $filepath = $file->storeAs('anh_ket_qua', $fileName, 'public');

                // Cập nhật tên file vào database
                $contact->anh_ket_qua = $filepath;
            }
            else if ($request->ly_do_tu_choi) {
                $contact->ly_do_tu_choi = $request->ly_do_tu_choi;
            }

            $contact->save();


            if ($user) {
                $trangThai = '';
                switch ($newStatus) {
                    case 'dang_xu_ly':
                        $trangThai = 'Đang xử lý';
                        break;
                    case 'da_duyet':
                        $trangThai = 'Duyệt';
                        break;
                    case 'da_huy':
                        $trangThai = 'Hủy';
                        break;
                }
                $notification = ThongBao::create([
                    'user_id' => $user->id,
                    'tieu_de' => 'Trạng thái yêu cầu rút tiền đã thay đổi',
                    'noi_dung' => 'Yêu cầu rút tiền với số tiền ' . number_format($contact->so_tien, 0, ',', '.') . ' VNĐ đã được cập nhật trạng thái: ' . $trangThai . '.',
                    'url' => route('rut-tien.rutTien'),
                    'trang_thai' => 'chua_xem',
                    'type' => 'tien',
                ]);

                broadcast(new NotificationSent($notification));
                $url = route('rut-tien.rutTien');
                $soTien = $contact->so_tien;
                CashoutReqestStatusEmailJob::dispatch($user, $soTien, $trangThai, $url);
            }
            $thongBao = ThongBao::where('url', route('notificationRutTien', ['id' => $contact->id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }

            return response()->json(['success' => true, 'new_balance' => number_format($user->so_du, 0, ',', '.') . ' VNĐ', 'rqStatus' => $contact->trang_thai, 'id' => $contact->id]);
        } catch (\Exception $e) {
            \Log::error("Error updating status for ID {$id}: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi.'], 500);
        }
    }
}
