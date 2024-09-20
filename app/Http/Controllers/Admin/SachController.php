<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sach\SuaSachRequest;
use App\Http\Requests\Sach\ThemSachRequest;
use App\Models\Chuong;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Support\Facades\Storage;


class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saches = Sach::with('theLoai')->get();
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        return view('admin.sach.index', compact('saches', 'trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'mau_trang_thai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $noi_dung_nguoi_lon = Chuong::NOI_DUNG_NGUOI_LON;
        $theLoais = TheLoai::query()->get();
        return view('admin.sach.add', compact('theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'noi_dung_nguoi_lon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThemSachRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->all();
            $param['user_id'] = "1";
            // Thêm ảnh bìa
            if ($request->hasFile('anh_bia_sach')) {
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = null;
            }
            $param['anh_bia_sach'] = $filePath;

            // khuyến mãi < giá gốc
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');

            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            $sach = Sach::query()->create($param);
            // Thêm chương đầu tiên

            //lấy id

            $sachID = $sach->id;

            $sach->chuongs()->create([
                'so_chuong' => $request->input('so_chuong'),
                'tieu_de' => $request->input('tieu_de'),
                'noi_dung' => $request->input('noi_dung'),
                'ngay_len_song' => $request->input('ngay_len_song'),
                'noi_dung_nguoi_lon' => $request->input('noi_dung_nguoi_lon'),
                'kiem_duyet' => $request->input('kiem_duyet_chuong'),
                'trang_thai' => $request->input('trang_thai_chuong'),
                'sach_id' => $sachID,
            ]);
            return redirect()->route('sach.index')->with('success', 'Thêm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        $chuongs = Chuong::with('sach')
            ->where('sach_id', $id)
            ->get();
        return view('admin.sach.detail', compact('sach', 'theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat', 'chuongs'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trang_thai = Sach::TRANG_THAI;
        $mau_trang_thai = Sach::MAU_TRANG_THAI;
        $kiem_duyet = Sach::KIEM_DUYET;
        $tinh_trang_cap_nhat = Sach::TINH_TRANG_CAP_NHAT;
        $theLoais = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        return view('admin.sach.edit', compact('sach', 'theLoais', 'trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuaSachRequest $request, string $id)
    {
        if ($request->isMethod('put')) {
            $param = $request->except('_token', '_method');
            $sach = Sach::query()->findOrFail($id);
            if ($request->hasFile('anh_bia_sach')) {
                if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
                    Storage::disk('public')->delete($sach->anh_bia_sach);
                }
                $filePath = $request->file('anh_bia_sach')->store('uploads/sach', 'public');
            } else {
                $filePath = $sach->anh_bia_sach;
            }
            $param['anh_bia_sach'] = $filePath;
            // khuyến mãi < giá gốc
            $giaGoc = $request->input('gia_goc');
            $giaKhuyenMai = $request->input('gia_khuyen_mai');
            if ($giaKhuyenMai >= $giaGoc) {
                return back()->withErrors(['gia_khuyen_mai' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.'])->withInput();
            }
            $sach->update($param);
            return redirect()->route('sach.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sach = Sach::query()->findOrFail($id);
        if ($sach->anh_bia_sach && Storage::disk('public')->exists($sach->anh_bia_sach)) {
            Storage::disk('public')->delete($sach->anh_bia_sach);
        }
        $sach->delete();
        $sach->chuongs()->delete();

        return redirect()->route('sach.index')->with('success', 'Xóa thành công');
    }


}
