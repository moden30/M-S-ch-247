<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permissionName
     * @return mixed
     */
    public function handle($request, Closure $next, $permissionName)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $userId = Auth::id(); // Lấy ID người dùng đang đăng nhập

            // Truy vấn để kiểm tra quyền
            $hasPermission = DB::table('vai_tro_tai_khoans')
                ->join('vai_tros', 'vai_tro_tai_khoans.vai_tro_id', '=', 'vai_tros.id')
                ->join('quyen_vai_tros', 'vai_tros.id', '=', 'quyen_vai_tros.vai_tro_id')
                ->join('quyens', 'quyen_vai_tros.quyen_id', '=', 'quyens.id')
                ->where('vai_tro_tai_khoans.user_id', $userId)
                ->where('quyens.ten_quyen', $permissionName) // Giả sử trường lưu tên quyền là 'ten_quyen'
                ->exists();

            if ($hasPermission) {
                return $next($request); // Cho phép tiếp tục
            }
        }


        // Nếu không có quyền hoặc chưa đăng nhập, redirect hoặc trả về lỗi
        return response()->json(['message' => 'Không có quyền truy cập.'], 403);
    }
}
