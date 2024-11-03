<?php

namespace App\Http\Middleware;

use App\Models\VaiTro;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->hasRole(VaiTro::CUSTOMER_ROLE_ID)) {
            return redirect()->route('home')->with(['error' => 'Bạn không có đủ quyền hạn cần thiết.']);
        }

        return $next($request);
    }
}
