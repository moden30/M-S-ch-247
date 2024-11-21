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
                // Thông báo sách
                $thongBaosSach = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'sach')
                    ->orderBy('created_at', 'desc')
                    ->get();
                // Thông báo tiền
                $thongBaosTien = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'tien')
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Thông báo CHUNG
                $thongBaoCTV = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'chung')
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Chưa xem
                $thongBaosSachCX = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'sach')
                    ->where('trang_thai', 'chua_xem')
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Thông báo tiền chưa xem
                $thongBaosTienCX = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'tien')
                    ->where('trang_thai', 'chua_xem')
                    ->orderBy('created_at', 'desc')
                    ->get();

                // Thông báo chung chưa xem
                $thongBaoCTVCX = ThongBao::where('user_id', '=', $user->id)
                    ->where('type', 'chung')
                    ->where('trang_thai', 'chua_xem')
                    ->orderBy('created_at', 'desc')
                    ->get();

                $tong = $thongBaosSachCX->count() + $thongBaosTienCX->count() + $thongBaoCTVCX->count();
                $tongTBS = $thongBaosSachCX->count();
                $tongTBT = $thongBaosTienCX->count();

                $view->with([
                    'notifications' => ThongBao::query()
                        ->where('user_id', '=', $user->id)
                        ->orderByRaw("CASE WHEN trang_thai = 'chua_xem' THEN 1 ELSE 2 END")
                        ->orderBy('created_at', 'desc')
                        ->get(),
                    'notificationsSach' => $thongBaosSach,
                    'notificationsTien' => $thongBaosTien,
                    'notificationCTV' => $thongBaoCTV,
                    'tong' => ThongBao::query()
                        ->where('user_id', '=', $user->id)
                        ->where('trang_thai', 'chua_xem')
                        ->count(),
                    'tongTBS' => $tongTBS,
                    'tongTBT' => $tongTBT,
                ]);
            }
        });
    }

    public function register()
    {
        //
    }
}
