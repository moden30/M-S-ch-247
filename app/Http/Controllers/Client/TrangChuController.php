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
                'books' => Sach::all(),
            ],

            [
                'heading' => 'Sách Bán Chạy',
                'books' => DB::table('don_hangs')
                    ->select('saches.id', 'saches.ten_sach', 'saches.user_id','saches.anh_bia_sach','saches.gia_goc','saches.gia_khuyen_mai', DB::raw('COUNT(don_hangs.sach_id) as total_sold'))
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('saches.id', 'saches.ten_sach', 'saches.user_id','saches.anh_bia_sach','saches.gia_goc','saches.gia_khuyen_mai')
                    ->orderBy('total_sold', 'desc')
                    ->limit(10)
                    ->get(),
            ],
            [
                'heading' => 'Sách Miễn Phí',
                'books' => Sach::all(),
            ],
            [
                'heading' => 'Sách Mới Cập Nhật',
                'books' => Sach::all(),
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
        return view('client.home', [
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
            'slider' => $slider,
            'sliderFooter' => $sliderFooter,
            'sections' => $sections,
        ]);
    }
}
