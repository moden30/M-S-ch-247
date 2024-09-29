<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $quyenName)
    {
        // Kiểm tra người dùng có đăng nhập và có quyền cần thiết
        if (Auth::check() && Auth::user()->coQuyen($quyenName)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have the required permission.');
    }
}
