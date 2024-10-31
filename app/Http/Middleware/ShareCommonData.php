<?php

namespace App\Http\Middleware;

use App\Models\BaiViet;
use App\Models\Banner;
use App\Models\ChuyenMuc;
use App\Models\TheLoai;
use App\Models\ThongBao;
use App\Models\YeuThich;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareCommonData
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $countThongBaos = 0;
        $countYeuThichs = 0;

        if (Auth::check()) {
            $userId = auth()->id();  // Lấy id của user đăng nhập một lần để sử dụng nhiều lần
            $countThongBaos = ThongBao::where('trang_thai', 'chua_xem')
                ->where('user_id', $userId)
                ->count();
            $countYeuThichs = YeuThich::where('user_id', $userId)
                ->count();
        }

        $commonData = [
            'theLoais' => TheLoai::where('trang_thai', 'hien')->get(),
            'baiviet' => BaiViet::where('trang_thai', 'hien')->get(),
            'chuyenMucs' => ChuyenMuc::with(['chuyenMucCons' => function ($query) {
                $query->where('trang_thai', 'hien')
                    ->with(['chuyenMucCons' => function ($query) {
                        $query->where('trang_thai', 'hien');
                    }]);
            }])
                ->whereNull('chuyen_muc_cha_id')
                ->where('trang_thai', 'hien')
                ->get(),
            'countThongBaos' => $countThongBaos,
            'countYeuThichs' => $countYeuThichs,
            // 'slideImg' => Banner::with('hinhAnhBanner '),
        ];

        // Chia sẻ dữ liệu với tất cả view
        View::share($commonData);

        return $next($request);
    }
}
