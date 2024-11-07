<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\RutTien;
use App\Models\ThongBao;
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

        // Lấy tất cả thông báo của người dùng
        $thongBaos = ThongBao::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);


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
            ->paginate(5);

        if ($request->ajax()) {
            $section = $request->input('section');
            if ($section == 'purchased') {

                return view('client.pages.sach-da-mua', compact('sachDaMua'))->render();
            } elseif ($section == 'lich-su-giao-dich') {

                return view('client.pages.lich-su-giao-dich', compact('lichSuGiaoDich'))->render();
            } else {
                return view('client.pages.sach-yeu-thich', compact('danhSachYeuThich'))->render();
            }
        }

        return view('client.pages.trang-ca-nhan', compact('user', 'danhSachYeuThich', 'sachDaMua', 'lichSuGiaoDich', 'thongBaos'));
    }


    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $data = $request->validate([
            'ten_doc_gia' => 'required|string|max:255',
            'but_danh' => 'nullable|string|max:255',
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
        \Log::info($request->all());

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
                'bail',
                'required',
                'string',
                'min:8',
                'different:old_password',
                'confirmed'
            ],
            'new_password_confirmation' => 'required|same:new_password',
        ], [
            'new_password.min' => 'Mật khẩu mới tối thiểu 8 kí tự',
            'new_password.different' => 'Mật khẩu mới bắt buộc khác mật khẩu cũ',
            'old_password.required' => 'Mật khẩu hiện tại là bắt buộc',
            'new_password.required' => 'Mật khẩu mới là bắt buộc',
            'new_password_confirmation.required' => 'Mật khẩu xác nhận là bắt buộc',
            'new_password_confirmation.same' => 'Mật khẩu xác nhận và mật khẩu mới phải giống nhau.',
            'new_password.confirmed' => 'Xác nhận trường mật khẩu mới không khớp.',
        ]);

        if ($validator->fails()) {
            // \Log::error('Validation errors:', $validator->errors()->toArray());
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
            'message' => 'Mật khẩu đã được cập nhật thành công.'
        ]);
    }


    public function lichSuGiaoDich($id)
    {
        $giaoDich = DonHang::where('id', $id)
            ->with('sach.user', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->first();

        if (!$giaoDich) {
            return response()->json(['error' => 'Giao dịch không tồn tại'], 404);
        }

        return response()->json([
            'ten_doc_gia' => $giaoDich->user->ten_doc_gia,
            'ngay_thanh_toan' => $giaoDich->created_at->format('d-m-Y'),
            'tong_tien' => number_format($giaoDich->so_tien_thanh_toan, 0, ',', '.'),
            'phuong_thuc' => $giaoDich->phuongThucThanhToan->ten_phuong_thuc,
            'trang_thai' => $giaoDich->trang_thai,
            'hinh_anh' => Storage::url($giaoDich->sach->anh_bia_sach),
            'email' => $giaoDich->user->email,
            'so_dien_thoai' => $giaoDich->user->so_dien_thoai,
            'ten_sach' => $giaoDich->sach->ten_sach,
            'tac_gia' => $giaoDich->sach->user->ten_doc_gia,
        ]);
    }

    public function lichSuGiaoDichAjax($id)
    {
        $lichSuGiaoDich = DonHang::where('id', $id)->with('sach.user', 'user', 'phuongThucThanhToan')
            ->whereHas('sach', function ($query) {
                $query->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', 'hien');
            })
            ->paginate(5);

        return response()->json($lichSuGiaoDich);
    }
}
