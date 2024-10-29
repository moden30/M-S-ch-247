<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TrangCaNhanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $page = $request->input('page', 1);

        $danhSachYeuThich = YeuThich::with('user', 'sach.user')
            ->where('user_id', $user->id)
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->paginate(3, ['*'], 'page', $page);

        $sachDaMua = DonHang::with('sach.user', 'user')
            ->where('user_id', $user->id)
            ->where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->paginate(3, ['*'], 'page', $page);

        $lichSuGiaoDich = DonHang::where('user_id', $user->id)
            ->with('sach', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->get();


        // Kiểm tra nếu là yêu cầu AJAX
        if ($request->ajax()) {
            if ($request->input('section') == 'purchased') {
                return view('client.pages.sach-da-mua', compact('sachDaMua'))->render();
            } else {
                return view('client.pages.sach-yeu-thich', compact('danhSachYeuThich'))->render();
            }
        }

        return view('client.pages.trang-ca-nhan', compact('user', 'danhSachYeuThich', 'sachDaMua', 'lichSuGiaoDich'));
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:15',
            'dia_chi' => 'nullable|string|max:255',
            'sinh_nhat' => 'nullable|string|max:255',
            'hinh_anh' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'gioi_tinh' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('hinh_anh')) {
            if ($user->hinh_anh && Storage::disk('public')->exists($user->hinh_anh)) {
                Storage::disk('public')->delete($user->hinh_anh);
            }
            $filePath = $request->file('hinh_anh')->store('uploads/avatar-user', 'public');
        } else {
            $filePath = $user->hinh_anh;
        }

        $data['hinh_anh'] = $filePath;

        try {
            $user->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $yeuThich = YeuThich::findOrFail($id);

        $yeuThich->delete();

        return response()->json(['success' => true, 'message' => 'Xóa thành công!']);
    }

    public function doiMatKhau(Request $request, $id)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Mật khẩu hiện tại không chính xác.');
                    }
                },
            ],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'different:old_password',
                'confirmed'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }


        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Mật khẩu đã được cập nhật thành công'
        ]);
    }

    public function lichSuGiaoDich($id)
    {
        // Tìm đơn hàng theo ID và kèm theo các quan hệ cần thiết
        $giaoDich = DonHang::where('id', $id)
            ->with('sach', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->first();

        // Kiểm tra nếu không tìm thấy giao dịch
        if (!$giaoDich) {
            return response()->json(['error' => 'Giao dịch không tồn tại'], 404);
        }

        // Chuẩn bị dữ liệu để trả về JSON
        return response()->json([
            'user_name' => $giaoDich->user->ten_doc_gia,
            'date' => $giaoDich->created_at->format('d-m-Y'),
            'amount' => number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.'),
            'payment_method' => $giaoDich->phuongThucThanhToan->ten_phuong_thuc,
            'status' => $giaoDich->trang_thai == 'thanh_cong' ? 'Thành công' : ($giaoDich->trang_thai == 'dang_xu_ly' ? 'Đang xử lý' : 'Thất bại'),
            'details' => $giaoDich->chi_tiet ?? 'Không có chi tiết', // Giả sử có cột 'chi_tiet'
        ]);
    }


}
