<?php

namespace App\Providers;

use App\Models\ThongBao;
use App\Models\YeuThich;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $countThongBaos = 0;
            $countYeuThichs = 0;
            $thongBaos = [];
            if (Auth::check()) {
                $userId = Auth::id();
                $countThongBaos = ThongBao::where('trang_thai', 'chua_xem')
                    ->where('user_id', $userId)
                    ->count();
                $countYeuThichs = YeuThich::where('user_id', $userId)
                    ->count();
                $thongBaos = ThongBao::query()
                    ->where('user_id', '=', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

            }
            $view->with([
                'countThongBaos' => $countThongBaos,
                'countYeuThichs' => $countYeuThichs,
                'thongBaos' => $thongBaos
            ]);
        });
    }
}
