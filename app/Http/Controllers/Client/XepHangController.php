<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class XepHangController extends Controller
{
    public function sachBanChay()
    {
        // Sách bán chạy
        $top5 = Sach::select(
            'saches.id',
            'saches.ten_sach',
            'saches.anh_bia_sach',
            'saches.gia_goc',
            'saches.gia_khuyen_mai',
            DB::raw('COUNT(don_hangs.id) as so_luong_ban')
        )
            ->join('don_hangs', 'saches.id', '=', 'don_hangs.sach_id')
            ->where('don_hangs.trang_thai', 'thanh_cong')
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->groupBy('saches.id', 'saches.ten_sach', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai')
            ->orderByDesc('so_luong_ban')
            ->limit(5)
            ->get();

        $top5id = $top5->pluck('id')->toArray();

        $sachKhongThuocTop5 = Sach::select(
            'saches.id',
            'saches.ten_sach',
            'saches.anh_bia_sach',
            'saches.gia_goc',
            'saches.gia_khuyen_mai',
            'the_loais.ten_the_loai as ten_the_loai',
            'users.ten_doc_gia as ten_doc_gia',
            'saches.tom_tat',
            'saches.created_at',
            DB::raw('COUNT(don_hangs.id) as so_luong_ban')
        )
            ->join('don_hangs', 'saches.id', '=', 'don_hangs.sach_id')
            ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
            ->join('users', 'saches.user_id', '=', 'users.id')
            ->where('don_hangs.trang_thai', 'thanh_cong')
            ->whereNotIn('saches.id', $top5id)
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->groupBy(
                'saches.id',
                'saches.ten_sach',
                'saches.anh_bia_sach',
                'saches.gia_goc',
                'saches.gia_khuyen_mai',
                'the_loais.ten_the_loai',
                'users.ten_doc_gia',
                'saches.tom_tat',
                'saches.created_at'
            )
            ->orderByDesc('so_luong_ban')
            ->get();

        // Đánh giá
        $mucDoHaiLongOrder = [
            'rat_hay' => 1,
            'hay' => 2,
            'trung_binh' => 3,
            'te' => 4,
            'rat_te' => 5,
        ];

        $top5DG = DanhGia::select(
            'danh_gias.sach_id',
            DB::raw('COUNT(danh_gias.id) as so_luong_danh_gia'),
            DB::raw('AVG(CASE
            WHEN danh_gias.muc_do_hai_long = "rat_hay" THEN 1
            WHEN danh_gias.muc_do_hai_long = "hay" THEN 2
            WHEN danh_gias.muc_do_hai_long = "trung_binh" THEN 3
            WHEN danh_gias.muc_do_hai_long = "te" THEN 4
            WHEN danh_gias.muc_do_hai_long = "rat_te" THEN 5
        END) as trung_binh_muc_do_hai_long'),
            'saches.ten_sach',
            'saches.anh_bia_sach',
            'saches.gia_goc',
            'saches.gia_khuyen_mai'
        )
            ->join('saches', 'danh_gias.sach_id', '=', 'saches.id')
            ->where('danh_gias.trang_thai', 'hien')
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->groupBy('danh_gias.sach_id', 'saches.ten_sach', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai')
            ->orderByDesc('trung_binh_muc_do_hai_long')
            ->orderByDesc('so_luong_danh_gia')
            ->limit(5)
            ->get();

        $top5idDG = $top5DG->pluck('sach_id')->toArray();

        $sachKhongThuocTop5DG = Sach::select(
            'saches.id',
            'saches.ten_sach',
            'saches.anh_bia_sach',
            'saches.gia_goc',
            'saches.gia_khuyen_mai',
            'the_loais.ten_the_loai as ten_the_loai',
            'users.ten_doc_gia as ten_doc_gia',
            'saches.tom_tat',
            'saches.created_at',
            DB::raw('COUNT(danh_gias.id) as so_luong_danh_gia')
        )
            ->join('danh_gias', 'saches.id', '=', 'danh_gias.sach_id')
            ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
            ->join('users', 'saches.user_id', '=', 'users.id')
            ->where('danh_gias.trang_thai', 'hien')
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->whereNotIn('saches.id', $top5idDG)
            ->groupBy(
                'saches.id',
                'saches.ten_sach',
                'saches.anh_bia_sach',
                'saches.gia_goc',
                'saches.gia_khuyen_mai',
                'the_loais.ten_the_loai',
                'users.ten_doc_gia',
                'saches.tom_tat',
                'saches.created_at'
            )
            ->orderByDesc('so_luong_danh_gia')
            ->get();

        return view('client.pages.xep-hang-tac-gia', compact(
            'sachKhongThuocTop5',
            'top5',
            'top5DG',
            'sachKhongThuocTop5DG',
            'mucDoHaiLongOrder'
        ));
    }




}
