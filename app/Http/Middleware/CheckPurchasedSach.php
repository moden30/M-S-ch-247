<?php

namespace App\Http\Middleware;

use App\Models\DonHang;
use App\Models\Sach;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPurchasedSach
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $sachId = $request->route('sachId');
        $sach = Sach::find($sachId);
        // Nếu là admin hoặc kiểm duyệt viên, cho phép đọc tất cả sách mà không cần thanh toán, là ctv đọc đọc sách của họ
        $checkVaiTro = $user->hasRole(1) || $user->hasRole(3) || ($user->hasRole(4) && $sach->user_id == $user->id);

        $checkDonHang = $checkVaiTro || DonHang::where('user_id', $user->id)->where('sach_id', $sachId)->where('trang_thai', 'thanh_cong')->exists();

        if (!$checkDonHang) {
            return redirect()->back()->with('alert', 'Bạn cần mua cuốn sách này để đọc các chương.');
        }

        return $next($request);
    }
}
