<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use App\Models\YeuThich;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongTacVienController extends Controller
{
    public function show($id)
    {
        $user = User::with('sach')->findOrFail($id);
        $sach = Sach::where('user_id', $user->id)
            ->with('tai_khoan')
            ->get();
        $user->sinh_nhat = \Carbon\Carbon::parse($user->sinh_nhat)->format('d-m-Y');
        return view('admin.cong-tac-vien.detail', compact('user', 'sach'));
    }

    public function thongKeChungCTV()
    {
        $ten = Auth::user()->ten_doc_gia;
        // Tổng doanh số của tài khoản ctv theo thang
        $tongDoanhSo = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('so_tien_thanh_toan');
        $tongDoanhSoTruoc =  DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('so_tien_thanh_toan');
        $phanTramDS = 0;
        if ($tongDoanhSoTruoc > 0) {
            $phanTramDS = (($tongDoanhSo - $tongDoanhSoTruoc) / $tongDoanhSoTruoc) * 100;
        } elseif ($tongDoanhSoTruoc == 0) {
            $phanTramDS = $tongDoanhSo > 0 ? 100 : 0;
        }
        // Tổng hoa hồng theo thag
        // tính tổng hoa hồng như sau: 1 đơn hàng tương ứng 1 cuốn sách
        // mà mỗi cuốn sách lại có giá bán khác nhau hơn nữa đang tính hh của sách mà ctv đang đăng nhập
        // => dùng Auth để lây ra tk ctv đang đăng nhập sau đó dùng sum (tính tổng) hh cho từng đơn hàng
        // so_tien_thanh_toan từ bảng đơn hàng nhân 0.6 tức 60%
        $tongHoaHong = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->with('sach')
            ->get()
            ->sum(function ($donHang) {
                return $donHang->so_tien_thanh_toan * 0.6;
            });
        $tongHoaHongTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->with('sach')
            ->get()
            ->sum(function ($donHang) {
                return $donHang->so_tien_thanh_toan * 0.6;
            });
        $phanTramHH = 0;
        if ($tongHoaHongTruoc > 0) {
            $phanTramHH = (($tongHoaHong - $tongHoaHongTruoc) / $tongHoaHongTruoc) * 100;
        } elseif ($tongHoaHongTruoc == 0) {
            $phanTramHH = $tongHoaHong > 0 ? 100 : 0;
        }
        // Đánh giá
        $tongSoDanhGia = DanhGia::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereHas('sach.dh', function ($query) {
                $query->where('trang_thai', 'thanh_cong')
                ->whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year);
            })
            ->count();
        $tongSoDanhGiaTruoc = DanhGia::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereHas('sach.dh', function ($query) {
                $query->where('trang_thai', 'thanh_cong')
                    ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year);
            })
            ->count();
        $phanTramDG = 0;
        if ($tongSoDanhGiaTruoc > 0) {
            $phanTramDG = (($tongSoDanhGia - $tongSoDanhGiaTruoc) / $tongSoDanhGiaTruoc) * 100;
        } elseif ($tongSoDanhGiaTruoc == 0) {
            $phanTramDG = $tongSoDanhGia > 0 ? 100 : 0;
        }
        // Đơn hàng
        $tongDonDaBan = DonHang::where('trang_thai', 'thanh_cong')
        ->whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $tongDonDaBanTruoc = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
        $phanTramDDB = 0;
        if ($tongDonDaBanTruoc > 0) {
            $phanTramDDB = (($tongDonDaBan - $tongDonDaBanTruoc) / $tongDonDaBanTruoc) * 100;
        }elseif ($tongDonDaBanTruoc == 0) {
            $phanTramDDB = $tongDonDaBan > 0 ? 100 : 0;
        }
        // Yêu thích
        $tongYeuThich = YeuThich::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $tongYeuThichTruoc = YeuThich::whereHas('sach', function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
        $phanTramYeuThich = 0;
        if ($tongYeuThichTruoc > 0) {
            $phanTramYeuThich = (($tongYeuThich - $tongYeuThichTruoc) / $tongYeuThichTruoc) * 100;
        }elseif ($tongYeuThichTruoc == 0) {
            $phanTramYeuThich = $tongYeuThich > 0 ? 100 : 0;
        }
        // Top 5 sách bán chạy của ctv đó
        $topSach = Sach::where('user_id', Auth::id())
            ->withCount(['dh' => function ($query) {
                $query->where('trang_thai', 'thanh_cong');
            }])
            ->orderBy('dh_count', 'desc')
            ->take(5)
            ->get();
        // Biểu đồ
        $nam = Carbon::now()->year;
        $bieuDo = DonHang::where('trang_thai', 'thanh_cong')
            ->whereHas('sach', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereYear('created_at', $nam)
            ->selectRaw('MONTH(created_at) as thang, sach_id, COUNT(*) as tong')
            ->groupBy('thang', 'sach_id')
            ->orderBy('thang')
            ->get();

        $bd = [];
        $mang = range(1, 12);
        foreach ($bieuDo as $item) {
            $thang = $item->thang;
            $sach = $item->sach_id;
            $tong = $item->tong;
            if (!isset($bd[$sach])) {
                $bd[$sach] = [
                    'name' => Sach::find($sach)->ten_sach,
                    'data' => array_fill(0, 12, 0)
                ];
            }
            $bd[$sach]['data'][$thang - 1] = $tong;
        }
        $bieuDo = array_values($bd);

        return view('admin.thong-ke.thong-ke-chung-ctv', compact(
            'ten',
            'tongDoanhSo',
            'phanTramDS',
            'tongHoaHong',
            'phanTramHH',
            'tongSoDanhGia',
            'phanTramDG',
            'tongDonDaBan',
            'phanTramDDB',
            'tongYeuThich',
            'phanTramYeuThich',
            'topSach',
            'bieuDo',
            'bieuDo'
        ));
    }

}
