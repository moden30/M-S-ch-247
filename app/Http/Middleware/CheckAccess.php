<?php

namespace App\Http\Middleware;

use App\Models\Sach;
use App\Models\VaiTro;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $sachId = $request->route('sach');
        $sach = Sach::find($sachId);
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tiếp tục');
        }
        if ($user->hasRole(VaiTro::ADMIN_ROLE_ID) || $user->hasRole(VaiTro::CENSOR_ROLE_ID) || ($sach->user_id == $user->id)) {
            return $next($request);
        }
        abort(403, 'Bạn không có quyền hạn.');
    }
}
