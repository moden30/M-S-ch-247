<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class XepHangController extends Controller
{
    public function sachBanChay()
    {
        $thangHTBD = Carbon::now()->startOfMonth();
        $thangHTKT = Carbon::now()->endOfMonth();
        // Sách bán chạy
        $top5 = Sach::select(
            'saches.id',
            'saches.ten_sach',
            'saches.anh_bia_sach',
            'saches.gia_goc',
            'saches.gia_khuyen_mai',
            DB::raw('COUNT(don_hangs.id) as so_luong_ban')
        )
        ->join('don_hangs', 'saches.id', '=', 'don_hangs.sach_id') // Join books with orders
        ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id') // Join books directly with categories using the_loai_id
        ->join('users', 'saches.user_id', '=', 'users.id')  // Liên kết với bảng users để lấy thông tin tác giả
        ->where('users.trang_thai', '=', 'hoat_dong')
        ->where('don_hangs.trang_thai', 'thanh_cong')
        ->whereBetween('don_hangs.created_at', [$thangHTBD, $thangHTKT])
        ->where('saches.kiem_duyet', 'duyet')
        ->where('saches.trang_thai', 'hien')
        ->where('the_loais.trang_thai', 'hien') // Only include categories that are visible
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
            ->where('users.trang_thai', '=', 'hoat_dong')
            ->where('don_hangs.trang_thai', 'thanh_cong')
            ->whereBetween('don_hangs.created_at',  [$thangHTBD, $thangHTKT])
            ->whereNotIn('saches.id', $top5id)
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->where('the_loais.trang_thai', 'hien')
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
            ->limit(10)
            ->get()
            ->map(function ($book) {
                // Kiểm tra sách đã được mua chưa
                $book->isPurchased = DB::table('don_hangs')
                    ->where('sach_id', $book->id)
                    ->where('trang_thai', 'thanh_cong')
                    ->where('user_id', Auth::id())
                    ->exists();
                // Kiểm tra vai trò người dùng
                $book->checkVaiTro = DB::table('vai_tro_tai_khoans')
                    ->where('user_id', Auth::id())
                    ->where(function ($query) use ($book) {
                        $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                        ->orWhere(function ($query) use ($book) {
                            $query->where('vai_tro_id', 4)  // Vai trò 4
                            ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                        });
                    })
                    ->exists();
                return $book;
            });

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
            ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
            ->join('users', 'saches.user_id', '=', 'users.id')
            ->where('users.trang_thai', '=', 'hoat_dong')
            ->where('danh_gias.trang_thai', 'hien')
            ->whereBetween('danh_gias.created_at',  [$thangHTBD, $thangHTKT])
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->where('the_loais.trang_thai', 'hien')
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
            ->where('users.trang_thai', '=', 'hoat_dong')
            ->where('danh_gias.trang_thai', 'hien')
            ->where('the_loais.trang_thai', 'hien')
            ->whereBetween('danh_gias.created_at',  [$thangHTBD, $thangHTKT])
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
            ->limit(10)
            ->get()
            ->map(function ($book) {
                // Kiểm tra sách đã được mua chưa
                $book->isPurchased = DB::table('don_hangs')
                    ->where('sach_id', $book->id)
                    ->where('trang_thai', 'thanh_cong')
                    ->where('user_id', Auth::id())
                    ->exists();
                // Kiểm tra vai trò người dùng
                $book->checkVaiTro = DB::table('vai_tro_tai_khoans')
                    ->where('user_id', Auth::id())
                    ->where(function ($query) use ($book) {
                        $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                        ->orWhere(function ($query) use ($book) {
                            $query->where('vai_tro_id', 4)  // Vai trò 4
                            ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                        });
                    })
                    ->exists();
                return $book;
            });

        // Lấy top 5 tác giả
        $top5TacGia = Sach::select(
            'users.id as user_id',
            'users.ten_doc_gia',
            DB::raw('COUNT(saches.id) as tong_sach'), // Tổng số sách của tác giả
            DB::raw('SUM(CASE WHEN don_hangs.trang_thai = "thanh_cong" THEN 1 ELSE 0 END) as tong_sach_da_ban'), // Tổng sách đã bán với trạng thái "thanh_cong"
            DB::raw('SUM(CASE WHEN yeu_thiches.id IS NOT NULL THEN 1 ELSE 0 END) as tong_sach_duoc_yeu_thich') // Tổng sách được yêu thích
        )
            ->join('users', 'saches.user_id', '=', 'users.id')
            ->where('users.trang_thai', '=', 'hoat_dong')
            ->leftJoin('don_hangs', function ($join) use ($thangHTBD, $thangHTKT) {
                $join->on('saches.id', '=', 'don_hangs.sach_id')
                    ->whereBetween('don_hangs.created_at', [$thangHTBD, $thangHTKT]);
            })
            ->leftJoin('yeu_thiches', function ($join) {
                $join->on('saches.id', '=', 'yeu_thiches.sach_id');
            })
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->where('users.trang_thai', 'hoat_dong')
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->orderByDesc('tong_sach_da_ban')
            ->limit(5)
            ->get();


        // Lấy danh sách user_id của các tác giả trong top 5
        $top5UserIds = $top5TacGia->pluck('user_id')->toArray();

        // Lấy các tác giả không nằm trong top 5
        $khongThuocTop5TacGia = Sach::select(
            'users.id as user_id',
            'users.ten_doc_gia',
            DB::raw('COUNT(saches.id) as tong_sach'),
            DB::raw('SUM(CASE WHEN don_hangs.trang_thai = "thanh_cong" THEN 1 ELSE 0 END) as tong_sach_da_ban'),
            DB::raw('SUM(CASE WHEN yeu_thiches.id IS NOT NULL THEN 1 ELSE 0 END) as tong_sach_duoc_yeu_thich')
        )
            ->join('users', 'saches.user_id', '=', 'users.id')
            ->where('users.trang_thai', '=', 'hoat_dong')
            ->leftJoin('don_hangs', function ($join) use ($thangHTBD, $thangHTKT) {
                $join->on('saches.id', '=', 'don_hangs.sach_id')
                    ->whereBetween('don_hangs.created_at', [$thangHTBD, $thangHTKT]);
            })
            ->leftJoin('yeu_thiches', function ($join) {
                $join->on('saches.id', '=', 'yeu_thiches.sach_id');
            })
            ->where('saches.kiem_duyet', 'duyet')
            ->where('saches.trang_thai', 'hien')
            ->where('users.trang_thai', 'hoat_dong')
            ->whereNotIn('users.id', $top5UserIds)
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->orderByDesc('tong_sach_da_ban')
            ->limit(6)
            ->get();




        return view('client.pages.xep-hang-tac-gia', compact(
            'sachKhongThuocTop5',
            'top5',
            'top5DG',
            'sachKhongThuocTop5DG',
            'mucDoHaiLongOrder',
            'top5TacGia',
            'khongThuocTop5TacGia',
        ));
    }
}
