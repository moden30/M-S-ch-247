<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RutTien;
use Illuminate\Http\Request;

class RutTienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhSachYeuCau = RutTien::with('user')->latest('id')->get();

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

    public function update(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $contact = RutTien::find($id);

        if ($contact) {
            $currentStatus = $contact->trang_thai;
            if (
                // Khi ở trạng thái 'da_duyet' sẽ không chuyển về trạng thái 'dang_xu_ly'
                ($currentStatus == 'da_duyet' && $newStatus == 'dang_xu_ly') ||
                // Khi ở trạng thái 'da_duyet' sẽ không chuyển về trạng thái 'da_huy'
                ($currentStatus == 'da_duyet' && $newStatus == 'da_huy') ||
                // Khi ở trạng thái 'da_huy' sẽ không chuyển về trạng thái 'da_duyet'
                ($currentStatus == 'da_huy' && $newStatus == 'da_duyet') ||
                // Khi ở trạng thái 'da_huy' sẽ không chuyển về trạng thái 'dang_xu_ly'
                ($currentStatus == 'da_huy' && $newStatus == 'dang_xu_ly')
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }
            // Khi trạng thái sang đã duyệt thì trừ tiền
            // Lấy thông tin ctv yêu cầu rút tiền
            // Sau đó kiểm tra xem đủ số dư không
            // Nếu đủ thì - tiền vào số dư ctv đó
            if ($newStatus == 'da_duyet') {
                $user = $contact->user;
                if ($user->so_du < $contact->so_tien) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Số dư của cộng tác viên không đủ để duyệt yêu cầu rút tiền.'
                    ], 403);
                }
                $user->so_du -= $contact->so_tien;
                $user->save();
            }
            $contact->trang_thai = $newStatus;
            $contact->save();
            return response()->json(['success' => true, 'new_balance' => number_format($user->so_du, 0, ',', '.') . ' VNĐ']);
        }
        return response()->json(['success' => false, 'message' => 'Không tìm thấy yêu cầu.'], 404);
    }

}
