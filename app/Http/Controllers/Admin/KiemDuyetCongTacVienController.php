<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\SendRawEmailJob;
use App\Models\KiemDuyetCongTacVien;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class KiemDuyetCongTacVienController extends Controller
{

    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:kiem-duyet-cong-tac-vien')->only('index');
    }

    public function index()
    {
        $congTacViens = KiemDuyetCongTacVien::with('user')->get();
        return view('admin.kiem-duyet-cong-tac-vien.index', compact('congTacViens',));
    }

    // Sử lý chuyển đổi trạng thái
    public function updateStatus(Request $request, $id)
    {
        $user = auth()->user();
        $newStatus = $request->input('status');
        $rejectReason = $request->input('ly_do_tu_choi');
        $contact = KiemDuyetCongTacVien::find($id);

        if ($contact) {
            $currentStatus = $contact->trang_thai;

            // 2 tab
            if($currentStatus === "duyet"){
                return response()->json(['success' => false, 'message' => 'Yêu cầu này đã được xử lý trước đó. Bạn không thể xử lý.'], 403);
            }else if($currentStatus === "tu_choi"){
                return response()->json(['success' => false, 'message' => 'Yêu cầu này đã được xử lý trước đó. Bạn không thể xử lý.'], 403);
            }
            if (
                ($currentStatus == 'tu_choi' && $newStatus == 'duyet') ||
                ($currentStatus == 'tu_choi' && $newStatus == 'chua_ho_tro') ||
                ($currentStatus == 'duyet' && $newStatus == 'tu_choi') ||
                ($currentStatus == 'duyet' && $newStatus == 'chua_ho_tro')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }

            $contact->trang_thai = $newStatus;
            $contact->save();
            if ($newStatus === 'duyet') {
                $user = User::find($contact->user_id);
                if ($user) {
                    $user->vai_tros()->sync([VaiTro::CONTRIBUTOR_ROLE_ID]);
                    $user->commission()->updateOrCreate([], ['rate' => 0.60]);
                }
//                DB::table('thong_baos')->insert([
//                    'user_id' => $contact->user_id,
//                    'tieu_de' => 'Yêu cầu làm cộng tác viên đã được duyệt',
//                    'noi_dung' => 'Chúc mừng! Yêu cầu của bạn đã được duyệt. Bạn đã trở thành cộng tác viên.',
//                    'trang_thai' => 'chua_xem',
//                    'url' => route('notificationCTV', ['id' => $contact->id]),
//                    'type' => 'chung',
//                    'created_at' => now(),
//                    'updated_at' => now(),
//                ]);

                $notification = ThongBao::create([
                    'user_id' => $contact->user_id,
                    'tieu_de' => 'Yêu cầu làm cộng tác viên đã được duyệt',
                    'noi_dung' => 'Chúc mừng! Yêu cầu của bạn đã được duyệt. Bạn đã trở thành cộng tác viên.',
                    'trang_thai' => 'chua_xem',
                    'url' => route('notificationCTV', ['id' => $contact->id]),
                    'type' => 'chung',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                broadcast(new NotificationSent($notification));

//                $emailToSend = $contact->email;
//                Mail::raw('Chúc mừng! Yêu cầu của bạn đã được duyệt. Bạn đã trở thành cộng tác viên.', function ($message) use ($emailToSend) {
//                    $message->to($emailToSend)
//                        ->subject('Yêu cầu làm cộng tác viên đã được duyệt');
//                });
                SendRawEmailJob::dispatch(
                    $contact->email,
                    'Yêu cầu làm cộng tác viên đã được duyệt',
                    'Chúc mừng! Yêu cầu của bạn đã được duyệt. Bạn đã trở thành cộng tác viên.'
                );
            } elseif ($newStatus === 'tu_choi') {
                $noiDungTuChoi = 'Rất tiếc, yêu cầu của bạn đã bị từ chối. Lý do: ' . $rejectReason;
                $notification = ThongBao::create([
                    'user_id' => $contact->user_id,
                    'tieu_de' => 'Yêu cầu làm cộng tác viên đã bị từ chối',
                    'noi_dung' => $noiDungTuChoi,
                    'trang_thai' => 'chua_xem',
                    'url' => route('notificationCTV', ['id' => $contact->id]),
                    'type' => 'chung',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                broadcast(new NotificationSent($notification));
//                $emailToSend = $contact->email;
//                Mail::raw($noiDungTuChoi, function ($message) use ($emailToSend) {
//                    $message->to($emailToSend)
//                        ->subject('Yêu cầu làm cộng tác viên đã bị từ chối');
//                });
                SendRawEmailJob::dispatch(
                    $contact->email,
                    'Yêu cầu làm cộng tác viên đã bị từ chối',
                    $noiDungTuChoi
                );
            }
            $thongBao = ThongBao::where('url', route('notificationCTV', ['id' => $contact->id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
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

    public function notificationCTV(Request $request, $idCTV = null)
    {
        $congTacVien = KiemDuyetCongTacVien::with('user')->findOrFail($idCTV);
        $congTacViens = [$congTacVien];
        return view('admin.kiem-duyet-cong-tac-vien.index', compact('congTacViens'));
    }

}
