<?php

namespace App\Http\Middleware;

use App\Models\DonHang;
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

        $checkDonHang = DonHang::where('user_id', $user->id)->where('sach_id', $sachId)->exists();

        if (!$checkDonHang) {
            return redirect()->back()->with('alert', 'Bạn cần mua cuốn sách này để đọc các chương.');
        }

        return $next($request);
    }
}
