<?php

namespace App\Http\Controllers\Client;

use App\Events\TestPS;
use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\Banner;
use App\Models\ThongBao;
use Carbon\Carbon;
use App\Models\Sach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TrangChuController extends Controller
{
    public function index(): View
    {
        broadcast(new TestPS('ok'));
        $sections = [
            [
                'heading' => 'Mới Nhất',
                'books' => DB::table('saches')
                ->select('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                ->where('saches.trang_thai', '=', 'hien')
                ->where('saches.kiem_duyet', '=', 'duyet')
                //                    ->whereBetween('ngay_dang', [Carbon::now()->subWeek(), Carbon::now()])
                ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                ->orderBy('saches.ngay_dang', 'desc')
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Hot',
                'books' => DB::table('don_hangs')
                    ->select('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat' , DB::raw('COUNT(don_hangs.sach_id) as total_sold'), 'the_loais.ten_the_loai', DB::raw('(SELECT COUNT(*) FROM chuongs WHERE chuongs.sach_id = saches.id) as tong_chuong'))
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai',)
                    ->orderBy('total_sold', 'desc')
                    ->orderBy('saches.luot_xem', 'desc')
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Bán Chạy',
                'books' => DB::table('don_hangs')
                    ->select('users.ten_doc_gia', 'users.but_danh', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', DB::raw('COUNT(don_hangs.sach_id) as total_sold'), 'the_loais.ten_the_loai', DB::raw('(SELECT COUNT(*) FROM chuongs WHERE chuongs.sach_id = saches.id) as tong_chuong'))
                    ->join('saches', 'don_hangs.sach_id', '=', 'saches.id')
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                    ->orderBy('total_sold', 'desc')
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Miễn Phí',
                'books' => DB::table('saches')
                    ->select( 'users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    //                    ->whereBetween('ngay_dang', [Carbon::now()->subWeek(), Carbon::now()])
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                    ->orderBy('saches.ngay_dang', 'desc')
                    ->where('saches.gia_goc', '=', 0)
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Mới Cập Nhật',
                'books' => DB::table('saches')
                    ->select('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                    ->orderBy('saches.updated_at', 'desc')
                    ->limit(15)
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Đã Full',
                'books' => DB::table('saches')
                    ->select( 'users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->where('saches.tinh_trang_cap_nhat', '=', 'da_full')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Sách Đọc Nhiều',
                'books' => DB::table('saches')
                    ->select('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                    ->orderBy('saches.luot_xem', 'desc')
                    ->limit(20)
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
            ],
            [
                'heading' => 'Dành Cho Bạn',
                'books' => DB::table('saches')
                    ->select('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai', 'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai', DB::raw('COUNT(chuongs.sach_id) as tong_chuong'))
                    ->join('users', 'saches.user_id', '=', 'users.id')
                    ->join('chuongs', 'saches.id', '=', 'chuongs.sach_id')
                    ->join('the_loais', 'saches.the_loai_id', '=', 'the_loais.id')
                    ->where('saches.trang_thai', '=', 'hien')
                    ->where('saches.kiem_duyet', '=', 'duyet')
                    ->groupBy('users.ten_doc_gia', 'users.but_danh', 'saches.id', 'saches.ten_sach', 'saches.user_id', 'saches.anh_bia_sach', 'saches.gia_goc', 'saches.gia_khuyen_mai',  'saches.tinh_trang_cap_nhat', 'the_loais.ten_the_loai')
                    ->orderBy('saches.ngay_dang', 'desc')
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
                            ->where(function($query) use ($book) {
                                $query->whereIn('vai_tro_id', [1, 3])  // Vai trò 1 và 3
                                ->orWhere(function($query) use ($book) {
                                    $query->where('vai_tro_id', 4)  // Vai trò 4
                                    ->where('user_id', $book->user_id); // Kiểm tra user_id của sách
                                });
                            })
                            ->exists();
                        return $book;
                    }),
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
        $bai_viets = BaiViet::query()
            ->orderBy('ngay_dang', 'desc')
            ->where('trang_thai', '=', 'hien')
            ->get();


        return view('client.home', [
            'thong_baos' => $thong_baos,
            'tong_thong_baos' => $tong_thong_baos,
            'slider' => $slider,
            'sliderFooter' => $sliderFooter,
            'sections' => $sections,
            'topTacGias' => $topTacGias,
            'bai_viets' => $bai_viets,
        ]);
    }
}
