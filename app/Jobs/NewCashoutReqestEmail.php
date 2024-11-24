<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewCashoutReqestEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $adminUser;
    protected $userName;
    protected $soTien;
    protected $url;

    /**
     * Create a new job instance.
     */
    public function __construct($adminUser, $userName, $soTien, $url)
    {
        $this->adminUser = $adminUser;
        $this->userName = $userName;
        $this->soTien = $soTien;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::raw(
            'Có yêu cầu rút tiền mới từ tài khoản "' . $this->userName .
            '" với số tiền ' . number_format($this->soTien, 0, ',', '.') .
            ' VNĐ. Bạn có thể xem yêu cầu tại đây: ' . $this->url,
            function ($message) {
                $message->to($this->adminUser->email)
                    ->subject('Thông báo yêu cầu rút tiền mới');
            }
        );
    }
}
