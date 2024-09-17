<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sach\SuaSachRequest;
use App\Http\Requests\Sach\ThemSachRequest;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saches = Sach::with('theLoai', 'tacGia')->get();
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
        $theLoais  = TheLoai::query()->get();
        return view('admin.sach.add', compact('theLoais','trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
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
            Sach::query()->create($param);
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
        $theLoais  = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        return view('admin.sach.detail', compact('sach','theLoais','trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));

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
        $theLoais  = TheLoai::query()->get();
        $sach = Sach::query()->findOrFail($id);
        return view('admin.sach.edit', compact('sach','theLoais','trang_thai', 'mau_trang_thai', 'kiem_duyet', 'tinh_trang_cap_nhat'));
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
        return redirect()->route('sach.index')->with('success','Xóa thành công');
    }
}
