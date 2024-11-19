<?php

namespace App\Http\Middleware;

use App\Models\VaiTro;
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
            $redirectRoute = $user->hasRole(VaiTro::CUSTOMER_ROLE_ID)
                ? redirect()->route('cli.auth.login')->with('blocked', 'Tài khoản của bạn đã bị khoá, liên hệ với quản trị viên để mở khoá tài khoản')
                : redirect()->route('login')->withErrors([
                    'Tài khoản của bạn đã bị khoá, liên hệ với quản trị viên để mở khoá tài khoản'
                ]);

            Auth::logout();
            return $redirectRoute;
        }

        return $next($request);
    }

}
