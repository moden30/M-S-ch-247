<?php

namespace App\Http\Controllers\Admin;

use App\Events\NotificationSent;
use App\Http\Controllers\Controller;
use App\Jobs\NewCashoutReqestEmail;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\DonHang;
use App\Models\LuuThongTinTaiKhoan;
use App\Models\RutTien;
use App\Models\Sach;
use App\Models\ThongBao;
use App\Models\User;
use App\Models\YeuThich;

//use App\Notifications\RutTienCTVNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpParser\Builder;

// Import Str từ Laravel


class CongTacVienController extends Controller
{
    public function  __construct()
    {
        $this->middleware('permission:thong-ke-chung-cong-tac-vien')->only('thongKeChungCTV');
        $this->middleware('permission:rut-tien')->only('rutTien');
    }

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
        } elseif ($tongDonDaBanTruoc == 0) {
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
        } elseif ($tongYeuThichTruoc == 0) {
            $phanTramYeuThich = $tongYeuThich > 0 ? 100 : 0;
        }
        // Top 5 sách bán chạy của ctv đó
        $topSach = Sach::where('user_id', Auth::id())
            ->withCount(['dh' => function ($query) {
                $query->where('trang_thai', 'thanh_cong');
            }])
            ->addSelect(['total_loinhuan' => function ($query) {
                $query->from('don_hangs')
                    ->whereColumn('don_hangs.sach_id', 'saches.id')
                    ->where('don_hangs.trang_thai', 'thanh_cong')
                    ->selectRaw('sum(so_tien_thanh_toan * 0.6)');
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
            ->selectRaw('MONTH(created_at) as thang, sach_id, SUM(so_tien_thanh_toan * 0.6) as hoa_hong')
            ->groupBy('thang', 'sach_id')
            ->orderBy('thang')
            ->get();
        $bd = array_fill(0, 12, 0);
        foreach ($bieuDo as $item) {
            $thang = $item->thang;
            $hoaHong = $item->hoa_hong;
            $bd[$thang - 1] += $hoaHong;
        }
        $bieuDo = [
            [
                'name' => 'Tổng Hoa Hồng',
                'data' => $bd
            ]
        ];
        
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
            'bieuDo'
        ));
    }

    public function rutTien()
    {
        $accountInfo = LuuThongTinTaiKhoan::where('user_id', auth()->id())->first() ?? null;
        $user = auth()->user();
        $listRutTien = RutTien::with('user')
            ->where('cong_tac_vien_id', $user->id)
            ->orderByDesc('id')
            ->get();

        $dataForGridJs = $listRutTien->map(function ($item) {
            return [
                'created_at' => $item->created_at ? $item->created_at->format('Y-m-d H:i:s') : 'N/A', // Sử dụng created_at thay vì ngay_yeu_cau
                'so_tien' => number_format($item->so_tien, 0) . ' VNĐ',
                'trang_thai' => $item->trang_thai,
            ];
        });
        $soDu = $user->so_du;
        return view('admin.cong-tac-vien.rut-tien', compact('dataForGridJs', 'soDu','accountInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank-name-input' => 'required',
            'account-number-input' => 'required',
            'recipient-name-input' => 'required',
            'amount-input' => 'required|numeric|min:100000',
            'g-recaptcha-response' => 'required',
        ]);

        $soDu = auth()->user()->so_du;
        $soTien = $request->input('amount-input');

        if ($soTien < 100000) {
            return redirect()->back()->with('moden', 'Số tiền tối thiểu để rút là 100,000 VNĐ.');
        }
        if ($soDu < $soTien) {
            return redirect()->back()->with('error', 'Số dư của bạn không đủ để rút ' . number_format($soTien, 0, ',', '.') . ' VNĐ.');
        }

        $taiKhoan = auth()->user()->taiKhoan;

        if ($request->hasFile('qr-code-input')) {
            $qrCodePath = $request->file('qr-code-input')->store('storage/anh_qr', 'public');
            $taiKhoan->anh_qr = $qrCodePath;
        } else {
            $qrCodePath = $taiKhoan->anh_qr;
        }

        $taiKhoan->ten_chu_tai_khoan = $request->input('recipient-name-input');
        $taiKhoan->ten_ngan_hang = $request->input('bank-name-input');
        $taiKhoan->so_tai_khoan = $request->input('account-number-input');
        $taiKhoan->anh_qr = $qrCodePath;
        $taiKhoan->save();

        $withdrawal = new RutTien();
        $withdrawal->cong_tac_vien_id = auth()->user()->id;
        $withdrawal->ten_chu_tai_khoan = $request->input('recipient-name-input');
        $withdrawal->ten_ngan_hang = $request->input('bank-name-input');
        $withdrawal->so_tai_khoan = $request->input('account-number-input');
        $withdrawal->so_tien = $soTien;
        $withdrawal->trang_thai = 'dang_xu_ly';
        $withdrawal->ghi_chu = $request->input('ghi_chu', '');

        do {
            $maYeuCau = Str::random(10);
        } while (RutTien::where('ma_yeu_cau', $maYeuCau)->exists());

        $withdrawal->ma_yeu_cau = $maYeuCau;

        $withdrawal->save();

        $adminUsers = User::whereHas('vai_tros', function ($query) {
            $query->whereIn('ten_vai_tro', ['admin']);
        })->get();

        foreach ($adminUsers as $adminUser) {
            $notification = ThongBao::create([
                'user_id' => $adminUser->id,
                'tieu_de' => 'Yêu cầu rút tiền mới',
                'noi_dung' => 'Yêu cầu rút tiền từ tài khoản "' . auth()->user()->ten_doc_gia . '" với số tiền ' . number_format($soTien, 0, ',', '.') . ' VNĐ đang chờ xử lý.',
                'url' => route('notificationRutTien', ['id' => $withdrawal->id]),
                'trang_thai' => 'chua_xem',
                'type' => 'tien',
            ]);

            broadcast(new NotificationSent($notification));

            $url = route('notificationRutTien', ['id' => $withdrawal->id]);
            NewCashoutReqestEmail::dispatch($adminUser, auth()->user()->ten_doc_gia, $withdrawal->so_tien, $url);
        }

        return redirect()->back()->with('success', 'Yêu cầu rút tiền đã được gửi thành công.');
    }

    public function checkSD()
    {
        $user = auth()->user();
        $soDu = $user->so_du;
        $requestInProgress = RutTien::where('cong_tac_vien_id', $user->id)
            ->where('trang_thai', 'dang_xu_ly')
            ->exists();
        if ($soDu < 100000) {
            return response()->json(['sufficient' => false, 'requestInProgress' => false]);
        } elseif ($requestInProgress) {
            return response()->json(['sufficient' => true, 'requestInProgress' => true]);
        }
        return response()->json(['sufficient' => true, 'requestInProgress' => false]);
    }

    public function notificationRutTien(Request $request, $id = null)
    {
        $danhSachYeuCauQuery = RutTien::with('user');
        if (isset($id)) {
            $danhSachYeuCau = $danhSachYeuCauQuery->where('id', $id)->get();

            $thongBao = ThongBao::where('url', route('notificationRutTien', ['id' => $id]))
                ->where('user_id', auth()->id())
                ->first();
            if ($thongBao) {
                $thongBao->trang_thai = 'da_xem';
                $thongBao->save();
            }
        } else {
            $danhSachYeuCau = $danhSachYeuCauQuery->get();
        }
        return view('admin.cong-tac-vien.yeu-cau-rut-tien', compact('danhSachYeuCau'));
    }

    public function capNhatYeuCau(Request $request)
    {
        $validated = $request->validate([
            'ten_ngan_hang' => 'required|string|max:255',
            'so_tai_khoan' => 'required|string|max:255',
            'ten_chu_tai_khoan' => 'required|string|max:255',
            'anh_qr' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $accountInfo = LuuThongTinTaiKhoan::where('user_id', auth()->id())->first() ?? null;
        if (!$accountInfo) {
            $accountInfo = new LuuThongTinTaiKhoan();
            $accountInfo->user_id = auth()->user()->id;
        }

        $accountInfo->ten_ngan_hang = $validated['ten_ngan_hang'];
        $accountInfo->so_tai_khoan = $validated['so_tai_khoan'];
        $accountInfo->ten_chu_tai_khoan = $validated['ten_chu_tai_khoan'];

        if ($request->hasFile('anh_qr')) {
            $path = $request->file('anh_qr')->store('anh_qr', 'public');
            $accountInfo->anh_qr = $path;
        }

        $accountInfo->save();
        return redirect()->back()->with('success', 'Thông tin tài khoản rút tiền đã được cập nhật!');
    }

}
