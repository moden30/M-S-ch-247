<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\RutTien;
use App\Models\Sach;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str; // Import Str từ Laravel


class CongTacVienController extends Controller
{
    public function show($id)
    {
        $user = User::with('sach')->findOrFail($id);
        $sach = Sach::where('user_id', $user->id)
            ->with('tai_khoan')
            ->get();
        $user->sinh_nhat = \Carbon\Carbon::parse($user->sinh_nhat)->format('d-m-Y');
        return view('admin.cong-tac-vien.detail', compact('user', 'sach'));
    }

    public function rutTien()
    {
        $user = auth()->user();
        $listRutTien = RutTien::with('user')
            ->where('cong_tac_vien_id', $user->id)
            ->orderByDesc('id')
            ->get();
            // dd($listRutTien);

        $dataForGridJs = $listRutTien->map(function ($item) {
            return [
                'created_at' => $item->created_at ? $item->created_at->format('Y-m-d H:i:s') : 'N/A', // Sử dụng created_at thay vì ngay_yeu_cau
                'so_tien' => number_format($item->so_tien, 0) . ' VNĐ',
                'trang_thai' => $item->trang_thai,
            ];
        });

        return view('admin.cong-tac-vien.rut-tien', compact('dataForGridJs'));
    }



    public function store(Request $request)
    {
     // Validate các trường dữ liệu
     $request->validate([
        'bank-name-input' => 'required',
        'account-number-input' => 'required',
        'recipient-name-input' => 'required',
        'amount-input' => 'required|numeric'
    ]);

    // Tạo mới yêu cầu rút tiền với mã yêu cầu ngẫu nhiên
    $withdrawal = new RutTien();
    $withdrawal->cong_tac_vien_id = auth()->user()->id; // Giả sử người dùng đã đăng nhập
    $withdrawal->ten_chu_tai_khoan = $request->input('recipient-name-input');
    $withdrawal->ten_ngan_hang = $request->input('bank-name-input');
    $withdrawal->so_tai_khoan = $request->input('account-number-input');
    $withdrawal->so_tien = $request->input('amount-input');
    $withdrawal->trang_thai = 'dang_xu_ly'; // Trạng thái mặc định là đang xử lý
    $withdrawal->ghi_chu = 'ghi_chu';
    // Sinh mã yêu cầu ngẫu nhiên và đảm bảo nó là duy nhất
    do {
        $maYeuCau = Str::random(10);
    } while (RutTien::where('ma_yeu_cau', $maYeuCau)->exists());
    if ($request->hasFile('qr-code-input')) {
        // Lưu file vào thư mục 'public/uploads/anh-qr'
        $qrCodePath = $request->file('qr-code-input')->store('uploads/anh-qr', 'public');
    } else {
        $qrCodePath = null;
    }

    // Lưu đường dẫn file hoặc null vào trường 'anh_qr' trong cơ sở dữ liệu
    $withdrawal->anh_qr = $qrCodePath;

    $withdrawal->ma_yeu_cau = $maYeuCau;

    $withdrawal->save();

    // Trả về thông báo thành công
    return redirect()->back()->with('success', 'Yêu cầu rút tiền đã được gửi thành công.');
    }


}
