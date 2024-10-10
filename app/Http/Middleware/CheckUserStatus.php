<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->trang_thai === 'khoa') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Tài khoản của bạn đã bị khoá, liên hệ người quản trị để mở khoá tài khoản']);
            # code...
        }
        return $next($request);
    }
}
