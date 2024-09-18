<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chuong\SuaChuongRequest;
use App\Http\Requests\Chuong\ThemChuongRequest;
use App\Models\Chuong;
use App\Models\Sach;
use Illuminate\Http\Request;

class ChuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        $sach->chuongs()->create([
            'so_chuong' => $request->input('so_chuong'),
            'tieu_de' => $request->input('tieu_de'),
            'noi_dung' => $request->input('noi_dung'),
            'ngay_len_song' => $request->input('ngay_len_song'),
            'noi_dung_nguoi_lon' => $request->input('noi_dung_nguoi_lon'),
            'trang_thai' => $request->input('trang_thai_chuong'),
            'kiem_duyet' => $request->input('kiem_duyet_chuong'),
        ]);

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
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.detail', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));

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
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = Chuong::query()->findOrFail($chuongId);
        return view('admin.chuong.edit', compact('chuong', 'sach', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));
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
            'ngay_len_song' => $request->input('ngay_len_song'),
            'noi_dung_nguoi_lon' => $request->input('noi_dung_nguoi_lon'),
            'trang_thai' => $request->input('trang_thai_chuong'),
            'kiem_duyet' => $request->input('kiem_duyet_chuong'),
        ]);

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyChuong(string $sachId,string $chuongId)
    {
        $sach = Sach::query()->findOrFail($sachId);
        $chuong = $sach->chuongs()->findOrFail($chuongId);
        $chuong->delete();

        return redirect()->route('sach.show', $sachId)->with('success', 'Chương đã được xóa thành công!');

    }
}
