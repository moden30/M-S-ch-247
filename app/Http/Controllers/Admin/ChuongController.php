<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chuong\SuaChuongRequest;
use App\Http\Requests\Chuong\ThemChuongRequest;
use App\Models\Chuong;
use App\Models\Sach;
use App\Models\ThongBao;
use App\Models\User;
use App\Notifications\ChuongNotification;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        //
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

        $chuong = $sach->chuongs()->create([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'ngay_len_song' => now(),
            'trang_thai' => $request->input('trang_thai_chuong'),
            'kiem_duyet' => 'cho_xac_nhan',
        ]);

        if ($chuong->kiem_duyet === 'cho_xac_nhan') {
            if ($chuong->trang_thai !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();

                $userIds = $adminUsers->pluck('id')->toArray();
                ThongBao::create([
                    'user_id' => Auth::user()->id,
                    'tieu_de' => 'Có một chương mới cần kiểm duyệt',
                    'noi_dung' => 'Chương "' . $chuong->tieu_de . '" của cuốn sách "' . $sach->ten_sach . '" đã được thêm với trạng thái "chờ xác nhận".',
                    'trang_thai' => 'chua_xem',
                    'user_ids' => json_encode($userIds),
                ]);
            }
        }

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được thêm thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function showChuong(string $sachId,string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.detail', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editChuong(string $sachId,string $chuongId)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.edit', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateChuong(SuaChuongRequest $request,string $sachId, string $chuongId)
    {
        $sach = Sach::findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);

        $chuong->update([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'trang_thai' => $request->input('trang_thai_chuong'),
            'kiem_duyet' => $request->input('kiem_duyet_chuong'),
        ]);

        if ($chuong->kiem_duyet === 'cho_xac_nhan') {
            if ($chuong->trang_thai !== 'an') {
                $adminUsers = User::whereHas('vai_tros', function($query) {
                    $query->whereIn('ten_vai_tro', ['admin', 'Kiểm duyệt viên']);
                })->get();
                $userIds = $adminUsers->pluck('id')->toArray();
                    ThongBao::create([
                        'user_id' => Auth::user()->id,
                        'tieu_de' => 'Có một chương đã được cập nhật',
                        'noi_dung' => 'Cộng tác viên vừa sửa chương: ' . $chuong->tieu_de . ' trong cuốn sách: ' . $sach->ten_sach,
                        'trang_thai' => 'chua_xem',
                        'user_ids' => json_encode($userIds),
                    ]);

            }
        }
        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyChuong(string $sachId, string $chuongId)
    {
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);
        $noidung = $chuong->noi_dung;
        $this->xoaNoiDung($noidung);
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

}
