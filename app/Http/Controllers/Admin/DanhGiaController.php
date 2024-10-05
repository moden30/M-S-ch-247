<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Quyền truy cập view index
        $this->middleware('permission:danh-gia-index')->only('index');

        // Quyền truy cập view detail
        $this->middleware('permission:danh-gia-detail')->only('show');
    }
    public function index()
    {
        $listDanhGia = DanhGia::with(['user', 'sach'])->orderByDesc('id')->get();

        return view('admin.danh-gia.index', compact('listDanhGia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $danhGia = DanhGia::findOrFail($id);

        $listDanhGia = DanhGia::with(['user', 'sach'])
            ->where('sach_id', $danhGia->sach_id)
            ->orderByDesc('ngay_danh_gia')
            ->get();

        $danhGiaKhac = DanhGia::where('user_id', $danhGia->user_id)
            ->where('id', '!=', $id)
            ->with('user')
            ->get();

        $ratHay = DanhGia::where('sach_id', $danhGia->sach_id)->where('muc_do_hai_long', 'rat_hay')->count();
        $hay = DanhGia::where('sach_id', $danhGia->sach_id)->where('muc_do_hai_long', 'hay')->count();
        $trungBinh = DanhGia::where('sach_id', $danhGia->sach_id)->where('muc_do_hai_long', 'trung_binh')->count();
        $te = DanhGia::where('sach_id', $danhGia->sach_id)->where('muc_do_hai_long', 'te')->count();
        $ratTe = DanhGia::where('sach_id', $danhGia->sach_id)->where('muc_do_hai_long', 'rat_te')->count();

        return view('admin.danh-gia.detail', compact(
            'listDanhGia',
            'danhGia',
            'ratHay',
            'hay',
            'trungBinh',
            'te',
            'ratTe',
            'danhGiaKhac'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhGia $danhGia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhGia $danhGia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhGia $danhGia)
    {
        //
    }
}
