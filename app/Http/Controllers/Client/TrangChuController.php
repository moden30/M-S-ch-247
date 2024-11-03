<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ThongBao;
use Carbon\Carbon;
use App\Models\Sach;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TrangChuController extends Controller
{
    public function index(): View
    {
        $sections = [
            [
                'heading' => 'Mới Nhất',
                'books' => Sach::query()->orderBy('ngay_dang', 'desc')
                    ->where('kiem_duyet', 'duyet')
                    ->where('trang_thai', '=', 'hien')
                    ->whereBetween('ngay_dang', [Carbon::now()->subWeek(), Carbon::now()])
                    ->get(),
            ],
            [
                'heading' => 'Sách Hot',
                'books' => DB::table('don_hangs')
                    ->select('saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', DB::raw('COUNT(don_hangs.sach_id) as total_sold'))
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai')
                    ->orderBy('total_sold', 'desc')
                    ->orderBy('saches.luot_xem', 'desc')
                    ->get()
            ],

            [
                'heading' => 'Sách Bán Chạy',
                'books' => DB::table('don_hangs')
                    ->select('saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', DB::raw('COUNT(don_hangs.sach_id) as total_sold'))
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai')
                    ->orderBy('total_sold', 'desc')
                    ->limit(10)
                    ->get(),
            ],
            [
                'heading' => 'Sách Miễn Phí',
                'books' => Sach::query()
                    ->orderBy('ngay_dang', 'desc')
                    ->where('kiem_duyet', '=', 'duyet')
                    ->where('trang_thai', '=', 'hien')
                    ->where('gia_goc', '=', 0)
                    ->get(),
            ],
            [
                'heading' => 'Sách Mới Cập Nhật',
                'books' => Sach::query()
                    ->orderBy('updated_at', 'desc')
                    ->where('kiem_duyet', '=', 'duyet')
                    ->where('trang_thai', '=', 'hien')
                    ->limit(15)
                    ->get()
            ],
            [
                'heading' => 'Sách Đã Full',
                'books' => Sach::query()->orderBy('ngay_dang', 'desc')
                    ->where('trang_thai', '=', 'hien')
                    ->where('kiem_duyet', '=', 'duyet')
                    ->where('tinh_trang_cap_nhat', '=', 'da_full')
                    ->get(),
            ],
            [
                'heading' => 'Sách Đọc Nhiều',
                'books' => Sach::query()->orderBy('luot_xem', 'desc')
                    ->where('trang_thai', '=', 'hien')
                    ->where('kiem_duyet', '=', 'duyet')
                    ->limit(20)
                    ->get(),
            ],
            [
                'heading' => 'Dành Cho Bạn',
                'books' => Sach::all(),
            ],
        ];
        $sections = array_filter($sections, function ($section) {
            return $section['books']->isNotEmpty();
        });

        $thong_baos = ThongBao::query()->where('user_id', auth()->id())->orderBy('created_at', 'desc')->limit(4)->get();
        $tong_thong_baos = ThongBao::query()->where('user_id', auth()->id())->count();
        $slider = Banner::with('hinhAnhBanner')
            ->where('loai_banner', '=', 'slider')
            ->where('trang_thai', '=', 'hien')
            ->first();
        $sliderFooter = Banner::with('hinhAnhBanner')
            ->where('loai_banner', '=', 'footer')
            ->where('trang_thai', '=', 'hien')
            ->first();
        $topTacGias = DB::table('saches')
            ->select(
                'users.id',
                'users.ten_doc_gia',
                'users.email',
                'users.hinh_anh',
                DB::raw('COUNT(saches.id) as total_books'),
                DB::raw('COUNT(don_hangs.id) as total_sold')
            )
            ->leftJoin('don_hangs', 'saches.id', '=', 'don_hangs.sach_id')
            ->join('users', 'saches.user_id', '=', 'users.id')  // Liên kết với bảng users để lấy thông tin tác giả
            ->groupBy('users.id', 'users.ten_doc_gia', 'users.email', 'users.hinh_anh')
            ->orderBy('total_books', 'desc')   // Sắp xếp theo số lượng sách
            ->orderBy('total_sold', 'desc')    // Sau đó sắp xếp theo số lượng sách bán
            ->get();


        return view('client.home', [
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
            'slider' => $slider,
            'sliderFooter' => $sliderFooter,
            'sections' => $sections,
            'topTacGias' => $topTacGias,
        ]);
    }
}
