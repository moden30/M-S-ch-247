<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function show(DanhGia $danhGia)
    {
        $listDanhGia = DanhGia::with(['user', 'sach'])
        ->where('sach_id', $danhGia->sach_id)
        ->orderByDesc('ngay_danh_gia')
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
            'ratTe'
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
