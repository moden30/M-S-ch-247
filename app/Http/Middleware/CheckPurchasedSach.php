<?php

namespace App\Http\Middleware;

use App\Models\Chuong;
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
        $chuongId = $request->route( 'chuongId');
        $sach = Sach::find($sachId);
        if (!$sach) {
            abort(404, 'Sách không tồn tại.');
        }
        if (!$chuongId || !Chuong::where('id', $chuongId)->where('sach_id', $sachId)->exists()) {
            abort(404, 'Chương không tồn tại hoặc không thuộc sách này.');
        }
        if (!$user) {
            abort(401, 'Bạn cần đăng nhập để truy cập nội dung này.');
        }
        // Nếu là admin (1) hoặc kiểm duyệt viên (3), cho phép đọc tất cả sách mà không cần thanh toán, là ctv(4) đọc đọc sách của họ
        $checkVaiTro = $user->hasRole(1) || $user->hasRole(3) || ($user->hasRole(4) && $sach->user_id == $user->id);
        // Khách hàng đã mua sách
        $checkDonHang = $checkVaiTro || DonHang::where('user_id', $user->id)->where('sach_id', $sachId)->where('trang_thai', 'thanh_cong')->exists();

        if (!$checkDonHang) {
            abort(403, 'Bạn cần mua cuốn sách này để đọc các chương.');        }
        return $next($request);
    }
}
