<?php

namespace App\Listeners;

use App\Models\LichSuDangNhap;
use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {
        $user = $event->user;

        // Tìm bản ghi đăng nhập cuối cùng của người dùng
        $lastLogin = LichSuDangNhap::where('tai_khoan_id', $user->id)
            ->where('is_active', true)
            ->latest('login_time')
            ->first();

        if ($lastLogin) {
            // Cập nhật thời gian đăng xuất và trạng thái
            $lastLogin->update([
                'logout_time' => Carbon::now(),
                'is_active' => false,
            ]);
        }
    }
}
