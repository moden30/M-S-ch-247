<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function index()
    {
        $sachXuatBan = Sach::where('kiem_duyet', 'duyet')->count();

        $tongDoanhThu = DonHang::where('trang_thai', 'thanh_cong')->sum('so_tien_thanh_toan');

        $topBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong')->get();

        return view('admin.dashboard', compact('sachXuatBan', 'tongDoanhThu'));
    }

    public function soLuongSachDaBan(request $request)
    {

        $sachBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong');

        //        if ($request->has('created_at')) {
        //            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
        //        }
        // $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');
        //        if ($request->has('created_at')) {
        //            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
        //        }
        //        $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');

        $hienThiBanChay = $sachBanChay->get();

        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact('hienThiBanChay'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
