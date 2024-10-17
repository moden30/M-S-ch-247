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

                $thongBaos = ThongBao::get()->filter(function($thongBao) use ($user) {
                    if (is_string($thongBao->user_ids)) {
                        $userIds = json_decode($thongBao->user_ids, true);
                    } else {
                        $userIds = $thongBao->user_ids;
                    }
                    return in_array($user->id, $userIds);
                });
                $view->with('notifications', $thongBaos);
            }
        });

    }

    public function register()
    {
        //
    }
}
