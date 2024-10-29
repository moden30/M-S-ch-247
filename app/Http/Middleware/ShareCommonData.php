<?php

namespace App\Http\Middleware;

use App\Models\BaiViet;
use App\Models\Banner;
use App\Models\ChuyenMuc;
use App\Models\TheLoai;
use Closure;
use Illuminate\Support\Facades\View;

class ShareCommonData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
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

            // 'slideImg' => Banner::with('hinhAnhBanner '),
        ];

        // Chia sẻ dữ liệu với tất cả view
        View::share($commonData);

        return $next($request);
    }
}
