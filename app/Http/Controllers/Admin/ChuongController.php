<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chuong\SuaChuongRequest;
use App\Http\Requests\Chuong\ThemChuongRequest;
use App\Models\BanSaoChuong;
use App\Models\Chuong;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\ThongBao;
use App\Models\User;
use App\Notifications\ChuongNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ChuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        // Quyền truy cập view (index, show)
        $this->middleware('permission:chuong-show')->only(['index', 'showChuong']);

        // Quyền tạo (create, store)
        $this->middleware('permission:chuong-create')->only(['createChuong', 'storeChuong']);

        // Quyền chỉnh sửa (edit, update)
        $this->middleware('permission:chuong-update')->only(['editChuong', 'updateChuong']);

        // Quyền xóa (destroy)
        $this->middleware('permission:chuong-destroy')->only('destroyChuong');
    }

    public function index(Request $request)
    {
        $query = Chuong::with('sach')->where('kiem_duyet', '!=', 'ban_nhap');
        // Lọc theo tình trạng kiểm duyệt
        if ($request->filled('kiem_duyet') && $request->input('kiem_duyet') != 'all') {
            $query->where('kiem_duyet', $request->input('kiem_duyet'));
        }
        // Lọc theo tình trạng ẩn hiện
        if ($request->filled('trang_thai') && $request->input('trang_thai') != 'all') {
            $query->where('trang_thai', $request->input('trang_thai'));
        }
        $chuongs = $query->get();
        return view('admin.chuong.index', compact('chuongs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createChuong(string $sachId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $sach = Sach::query()->findOrFail($sachId);
        return view('admin.chuong.add', compact('trang_thai', 'kiem_duyet', 'noi_dung_nguoi_lon', 'mau_trang_thai', 'sach'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeChuong(ThemChuongRequest $request, string $sachId)
    {
        $sach = Sach::findOrFail($sachId);
        // Thêm với 2 trạng thái cho_xac_nhan và ban_nhap
        $statusBtn = $request->input('action') === 'ban_nhap' ? 'ban_nhap' : 'cho_xac_nhan';
        $chuong = $sach->chuongs()->create([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'ngay_len_song' => now(),
            'trang_thai' => 'hien',
            'kiem_duyet' => $statusBtn,
        ]);

        if ($chuong->kiem_duyet === 'cho_xac_nhan') {
            if ($chuong->trang_thai !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function ($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();
                $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);
                foreach ($adminUsers as $adminUser) {
                    $notification = ThongBao::create([
                        'user_id' => $adminUser->id,
                        'tieu_de' => 'Có một chương mới cần kiểm duyệt',
                        'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" đã được thêm với trạng thái "chờ xác nhận".',
                        'url' => $url,
                        'trang_thai' => 'chua_xem',
                        'type' => 'sach',
                    ]);
                    broadcast(new ThongBao($notification));
                    Mail::raw('Cuốn sách "' . $sach->ten_sach . '" đã được cộng tác viên thêm chương mới "' . $chuong->tieu_de . '" với trạng thái: ' . $chuong->kiem_duyet . '. Bạn có thể xem chương sách tại đây: ' . $url, function ($message) use ($adminUser) {
                        $message->to($adminUser->email)
                            ->subject('Thông báo thêm chương sách mới');
                    });
                }
            }
        }
        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được thêm thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function showChuong(string $sachId, string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);

        $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);

        $thongBao = ThongBao::where('url', $url)
            ->where('user_id', auth()->id())
            ->where('trang_thai', 'chua_xem')
            ->first();

        if ($thongBao) {
            $thongBao->trang_thai = 'da_xem';
            $thongBao->save();
        }
        return view('admin.chuong.detail', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editChuong(string $sachId, string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        $banSaoChuong = BanSaoChuong::query()->where('sach_id', $sachId)->where('chuong_id', $chuongId)->get();

        return view('admin.chuong.edit', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'banSaoChuong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateChuong(SuaChuongRequest $request, string $sachId, string $chuongId)
    {
        $sach = Sach::findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);

        if ($chuong->kiem_duyet == 'duyet') {
            $banSaoChuong = BanSaoChuong::where('sach_id', $sachId)
                ->where('chuong_id', $chuongId)
                ->orderBy('so_phien_ban', 'desc')
                ->first();
            $soBanSaoChuong = $banSaoChuong ? $banSaoChuong->so_phien_ban + 1 : 1;
            BanSaoChuong::create([
                'sach_id' => $sachId,
                'chuong_id' => $chuongId,
                'so_phien_ban' => $soBanSaoChuong,
                'tieu_de' => $chuong->tieu_de,
                'noi_dung' => $chuong->noi_dung,
                'so_chuong' => $chuong->so_chuong,
                'ngay_len_song' => $chuong->ngay_len_song,
                'trang_thai' => $chuong->trang_thai,
                'kiem_duyet' => 'ban_nhap',
            ]);
            $banSaos = BanSaoChuong::where('sach_id', $sachId)
                ->where('chuong_id', $chuongId)
                ->orderBy('so_phien_ban', 'desc')
                ->skip(2)
                ->take(PHP_INT_MAX)
                ->get();
            foreach ($banSaos as $oldBanSao) {
                $oldBanSao->delete();
            }
        }

        $action = $request->input('action');

        if ($action === 'ban_nhap') {
            $statusBtn = 'ban_nhap';
        } else {
            $statusBtn = 'cho_xac_nhan';
        }

        $chuong->update([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'kiem_duyet' => $statusBtn,
        ]);

        $loaiSuaHienThi = $request->input('loai_sua');
        if (empty($loaiSuaHienThi)) {
            return back()->withErrors(['loai_sua' => 'Bạn phải chọn một loại sửa.'])->withInput();
        }

        if (is_array($loaiSuaHienThi)) {
            $loaiSuaHienThi = implode(', ', $loaiSuaHienThi);
        }

        $loaiSuaMappings = [
            'sua_trang_thai' => 'Sửa số chương',
            'sua_ten_sach' => 'Sửa tiêu đề chương',
            'sua_noi_dung' => 'Sửa nội dung',
        ];

        $loaiSuaHienThiViet = [];
        foreach (explode(', ', $loaiSuaHienThi) as $loai) {
            if (isset($loaiSuaMappings[$loai])) {
                $loaiSuaHienThiViet[] = $loaiSuaMappings[$loai];
            } else {
                $loaiSuaHienThiViet[] = $loai;
            }
        }
        $loaiSuaHienThiVietString = implode(', ', $loaiSuaHienThiViet);

        if ($statusBtn === 'ban_nhap') {
            return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được lưu thành bản nháp!');
        }

        if ($chuong->kiem_duyet === 'cho_xac_nhan' && $chuong->trang_thai !== 'an') {
            $adminUsers = User::whereHas('vai_tros', function($query) {
                $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
            })->get();

            $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);

            foreach ($adminUsers as $adminUser) {
               $notification =  ThongBao::create([
                    'user_id' => $adminUser->id,
                    'tieu_de' => 'Có một chương mới cần kiểm duyệt',
                    'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" đã được sửa với trạng thái "chờ xác nhận". Loại sửa: ' . $loaiSuaHienThiVietString,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'sach',
                ]);

                broadcast(new NotificationSent($notification));

                Mail::raw('Cuốn sách "' . $sach->ten_sach . '" đã được cộng tác viên sửa chương "' . $chuong->tieu_de . '" với trạng thái: ' . $chuong->kiem_duyet . '. Loại sửa: ' . $loaiSuaHienThiVietString . '. Bạn có thể xem chương sách tại đây: ' . $url, function ($message) use ($adminUser) {
                    $message->to($adminUser->email)
                        ->subject('Thông báo cộng tác viên vừa sửa chương sách');
                });
            }

            if ($statusBtn === 'duyet') {
                $khachHangIds = DonHang::where('sach_id', $sach->id)->pluck('user_id');
                foreach ($khachHangIds as $khachHangId) {
                    $khachHang = User::find($khachHangId);
                    if ($khachHang) {
                       $notification = ThongBao::create([
                            'user_id' => $khachHang->id,
                            'tieu_de' => 'Thông báo chương sách được cập nhật',
                            'noi_dung' => 'Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được cập nhật chương "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                            'url' => $url,
                            'trang_thai' => 'chua_xem',
                            'type' => 'sach',
                        ]);

                        broadcast(new ThongBao($notification));

                        Mail::raw('Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được cập nhật chương "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.', function ($message) use ($khachHang) {
                            $message->to($khachHang->email)
                                ->subject('Thông báo chương sách được cập nhật');
                        });
                    }
                }
            }

            $contributor = User::find($sach->user_id);
            if ($contributor) {
                Mail::raw('Chương "' . $chuong->tieu_de . '" của sách "' . $sach->ten_sach . '" đã được kiểm duyệt với trạng thái: ' . $chuong->kiem_duyet . '.', function ($message) use ($contributor) {
                    $message->to($contributor->email)
                        ->subject('Thông báo trạng thái kiểm duyệt chương sách');
                });
            }
        }

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được sửa thành công!');
    }

    public function banSaoChuong(string $sachId, string $chuongId, string $number)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
//        $chuong = Chuong::query()->findOrFail($chuongId);
        $chuong = BanSaoChuong::query()
            ->where('sach_id', $sachId)
            ->where('chuong_id', $chuongId)
            ->where('so_phien_ban', $number)
            ->firstOrFail();

        return view('admin.chuong.edit-chuong-copy', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    public function khoiPhucBanSaoChuong(string $sachId, string $chuongId, string $number)
    {
        // Tìm bản sao của sách dựa trên `sach_id` và `so_phien_ban`
        $banSaoChuong = BanSaoChuong::query()
            ->where('sach_id', $sachId)
            ->where('chuong_id', $chuongId)
            ->where('so_phien_ban', $number)
            ->firstOrFail();

        // Tìm chương gốc
        $chuong = Chuong::query()->findOrFail($chuongId);

        // Tạo một bản sao lưu của chương gốc trước khi khôi phục
        BanSaoChuong::create([
            'sach_id' => $chuong->sach_id,
            'chuong_id' => $chuong->id,
            'so_phien_ban' => BanSaoChuong::where('sach_id', $sachId)->max('so_phien_ban') + 1,
            'tieu_de' => $chuong->tieu_de,
            'noi_dung' => $chuong->noi_dung,
            'so_chuong' => $chuong->so_chuong,
            'ngay_len_song' => $chuong->ngay_len_song,
            'trang_thai' => $chuong->trang_thai,
            'kiem_duyet' => 'ban_nhap',
        ]);


        // Cập nhật thông tin từ bản sao sang chương gốc
        $chuong->sach_id = $banSaoChuong->sach_id;
        $chuong->tieu_de = $banSaoChuong->tieu_de;
        $chuong->noi_dung = $banSaoChuong->noi_dung;
        $chuong->so_chuong = $banSaoChuong->so_chuong;
        $chuong->ngay_len_song = $banSaoChuong->ngay_len_song;
        $chuong->trang_thai = $banSaoChuong->trang_thai;
        $chuong->kiem_duyet = $banSaoChuong->kiem_duyet;


        $banSaos = BanSaoChuong::where('sach_id', $sachId)
            ->where('chuong_id', $chuongId)
            ->orderBy('so_phien_ban', 'desc')
            ->skip(2)
            ->take(PHP_INT_MAX)
            ->get();
        foreach ($banSaos as $oldBanSao) {
            $oldBanSao->delete();
        }

        // Lưu cập nhật vào sách gốc
        $chuong->save();

        return redirect()->route('chuong.edit', ['sach' => $chuong->sach_id, 'chuong' => $chuong->id])->with('success', 'Khôi phục bản sao thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyChuong(string $sachId, string $chuongId)
    {
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);
        $noidung = $chuong->noi_dung;
        if ($chuong->kiem_duyet === 'ban_nhap') {
            $this->xoaNoiDung($noidung);
            $chuong->forceDelete();
        }
        $chuong->delete();

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được xóa thành công!');
    }

    private function xoaNoiDung($noidung)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $noidung, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $imgUrl) {
                $path = str_replace(asset(''), '', $imgUrl);
                if (file_exists(public_path($path))) {
                    unlink(public_path($path));
                }
            }
        }
    }

    public function anHien(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $validStatuses = ['an', 'hien'];
        if (!in_array($newStatus, $validStatuses)) {
            return response()->json([
                'success' => false,
                'message' => 'Trạng thái không hợp lệ'
            ], 400);
        }
        $contact = Chuong::find($id);

        if ($contact) {
            $contact->trang_thai = $newStatus;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy chương'
        ], 404);
    }

    // Tình tran kiểm duyệt
    public function kiemDuyet(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $lyDoTuChoi = $request->input('ly_do_tu_choi');
        $chuong = Chuong::find($id);
        if ($chuong) {
            $sach = $chuong->sach;
            $currentStatus = $chuong->kiem_duyet;
            if (
                ($currentStatus == 'tu_choi' && in_array($newStatus, ['cho_xac_nhan', 'duyet'])) ||
                ($currentStatus == 'duyet' && in_array($newStatus, ['tu_choi', 'cho_xac_nhan']))
            ) {
                return response()->json(['success' => false, 'message' => 'Không thể chuyển trạng thái này.'], 403);
            }
            $chuong->kiem_duyet = $newStatus;
            $chuong->save();

            $congTacVien = $sach->user;
            if ($congTacVien) {
                $url = route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]);
                $noiDung = 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" của bạn đã được ' . ($newStatus == 'duyet' ? 'duyệt' : 'từ chối') . '.';
                if ($newStatus == 'tu_choi' && $lyDoTuChoi) {
                    $noiDung .= ' Lý do từ chối: ' . $lyDoTuChoi;
                }

                $notification = ThongBao::create([
                    'user_id' => $congTacVien->id,
                    'tieu_de' => 'Trạng thái chương sách đã được cập nhật',
                    'noi_dung' => $noiDung,
                    'url' => $url,
                    'trang_thai' => 'chua_xem',
                    'type' => 'sach',
                ]);

                broadcast(new NotificationSent($notification));

                Mail::raw($noiDung . ' Bạn có thể xem chi tiết chương tại đây: ' . $url, function ($message) use ($congTacVien) {
                    $message->to($congTacVien->email)
                        ->subject('Thông báo trạng thái kiểm duyệt chương sách');
                });
            }

            if ($newStatus === 'duyet') {
                $khachHangIds = DonHang::where('sach_id', $sach->id)->pluck('user_id');
                foreach ($khachHangIds as $khachHangId) {
                    $khachHang = User::find($khachHangId);
                    if ($khachHang) {
                       $notification = ThongBao::create([
                            'user_id' => $khachHang->id,
                            'tieu_de' => 'Thông báo chương sách mới',
                            'noi_dung' => 'Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được thêm chương mới "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                            'url' => $url,
                            'trang_thai' => 'chua_xem',
                            'type' => 'sach',
                        ]);
                        broadcast(new NotificationSent($notification));
                        Mail::raw('Cuốn sách bạn đã mua "' . $sach->ten_sach . '" đã được thêm chương mới "' . $chuong->tieu_de . '". Bạn có thể đọc ngay bây giờ.',
                            function ($message) use ($khachHang) {
                                $message->to($khachHang->email)
                                    ->subject('Thông báo chương sách mới');
                            });
                    }
                }
            }

            $thongBao = ThongBao::where('url', $url)
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            } else {
                Log::info('Không tìm thấy thông báo để đánh dấu đã xem', [
                    'url' => $url,
                    'user_id' => auth()->id()
                ]);
            }

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Chương không tồn tại.'], 404);
    }


}
