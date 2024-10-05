<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use App\Models\Sach;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    // Số lượng sách được đăng bởi mỗi cộng tác viên: Thống kê sách đăng bởi từng cộng tác viên.

    // Doanh thu từ sách của cộng tác viên: Thống kê doanh thu mà mỗi cộng tác viên mang lại từ sách của họ.

    // Lượt đọc và đánh giá sách của cộng tác viên: Thống kê số lần sách của cộng tác viên được đọc và được đánh giá.

    public function index()
    {
        $sachXuatBan = Sach::where('kiem_duyet', 'duyet')->count();

        $tongDoanhThu = DonHang::where('trang_thai', 'thanh_cong')->sum('so_tien_thanh_toan');

        // $topBanChay = DonHang::with('sach')->where('trang_thai','thanh_cong')->get();

        $topBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong')->get();

        return view('admin.dashboard', compact('sachXuatBan', 'tongDoanhThu'));
    }

    public function soLuongSachDaBan(request $request)
    {

        $sachBanChay = DonHang::with('sach')->where('trang_thai', 'thanh_cong');

        //        if ($request->has('created_at')) {
        //            $sachBanChay->whereBetween('created_at', [$request->start, $request->end]);
        //        }
        $totalSoLuongDaBan = $sachBanChay->sum('so_luong_da_ban');

        $hienThiBanChay = $sachBanChay->get();

        return view('admin.thong-ke.thong-ke-so-luong-sach-da-ban', compact('hienThiBanChay'));
    }
    public function congTacVien(Request $request)
    {
        $chiTietCtv = Sach::with('tai_khoan')->select('user_id', DB::raw('count(*) as tong_sach'))
            ->where('kiem_duyet', 'duyet')
            ->groupBy('user_id')->paginate(5);

        $topDangSach = Sach::with('tai_khoan')
            ->select('user_id', DB::raw('count(*) as tong_sach'))
            ->where('kiem_duyet', 'duyet')
            ->groupBy('user_id')
            ->orderBy('tong_sach')
            ->limit(10)
            ->get();

        $sachData = [];
        $ctvName = [];

        foreach ($topDangSach as $ctv) {
            $sachData[] = $ctv->tong_sach;
            $ctvNames[] = $ctv->tai_khoan->ten_doc_gia;
        }

        $tongQuan = User::leftJoin('saches', function ($join) {
            $join->on('saches.user_id', '=', 'users.id')
                ->where('saches.kiem_duyet', '=', 'duyet');
        })
            ->leftJoin('don_hangs', function ($join) {
                $join->on('don_hangs.sach_id', '=', 'saches.id')
                    ->where('don_hangs.trang_thai', '=', 'thanh_cong');
            })
            ->select(
                'users.id AS user_id',
                'users.ten_doc_gia as ten',
                DB::raw('COUNT(DISTINCT saches.id) AS tong_so_sach_da_dang'),
                DB::raw('COUNT(don_hangs.id) AS tong_so_luot_dat'),
                DB::raw('COALESCE(SUM(don_hangs.so_tien_thanh_toan), 0) AS tong_doanh_thu')
            )
            ->groupBy('users.id', 'users.ten_doc_gia')
            ->latest('tong_so_sach_da_dang')
            ->get();

            // dd($tongQuan->toArray());


        return view('admin.thong-ke.cong-tac-vien', compact('chiTietCtv', 'sachData', 'ctvNames','tongQuan'));
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
