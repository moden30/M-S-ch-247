<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $userId = Auth::id(); // Lấy ID người dùng đã đăng nhập

            // Kiểm tra xem user này có vai trò admin (vai_tro_id = 1)
            $isAdmin = DB::table('vai_tros_users')
                ->where('user_id', $userId)
                ->where('vai_tro_id', 1) // Admin role ID = 1
                ->exists();

            if ($isAdmin) {
                return $next($request); // Nếu là admin, tiếp tục xử lý request
            }
        }

        // Nếu không phải admin, chuyển hướng hoặc trả về lỗi
        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
