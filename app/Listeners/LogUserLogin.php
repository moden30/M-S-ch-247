<?php

namespace App\Listeners;

use App\Models\LichSuDangNhap;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class LogUserLogin
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
    public function handle(Login $event): void
    {
        $user = $event->user;
        $agent = new Agent();

        //lấy thông tin ra
        $ip = Request::ip();
        $device = $agent->device();
        $browser = $agent->browser();
        $os = $agent->platform();
        $loginTime = Carbon::now();

        $deviceType = null;
        if ($agent->isDesktop()) {
            $deviceType = 'desktop';
        }
        elseif ($agent->isMobile()) {
            $deviceType = 'mobile';
        }
        elseif ($agent->isPhone()) {
            $deviceType = 'phone';
        }
        elseif ($agent->isTablet()) {
            $deviceType = 'tablet';
        }
        elseif ($agent->isRobot()) {
            $deviceType = 'robot';
        }
        elseif ($agent->isBot()) {
            $deviceType = 'bot';
        }


        $location = null;
        try {
            $response = file_get_contents("http://ipinfo.io/{$ip}/json");
            $details = json_decode($response);
            $location = $details->city . ', ' . $details->region . ', ' . $details->country;
        } catch (\Exception $e) {
            $location = null;
        }


        //lưu thông tin đăng nhập vào db
        LichSuDangNhap::create([
            'tai_khoan_id' => $user->id,
            'ten_thiet_bi' => $device,
            'dia_chi_ip' => $ip,
            'trinh_duyet' => $browser,
            'he_dieu_hanh' => $os,
            'login_time' => $loginTime,
            'is_active' => true,
            'dia_diem' => $location,
            'loai_thiet_bi' => $deviceType,
        ]);
    }

}
