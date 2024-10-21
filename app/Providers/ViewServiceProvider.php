<?php

namespace App\Providers;

use App\Models\ThongBao;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $thongBaos = ThongBao::where('trang_thai', 'chua_xem')
                    ->where('user_id', '=', $user->id)
                    ->get()
                    ->sortByDesc('created_at');
                $view->with('notifications', $thongBaos);
            }
        });

    }

    public function register()
    {
        //
    }
}
