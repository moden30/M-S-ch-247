<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CashoutReqestStatusEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $soTien;
    protected $trangThai;
    protected $url;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $soTien, $trangThai, $url)
    {
        $this->user = $user;
        $this->soTien = $soTien;
        $this->trangThai = $trangThai;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::raw(
            'Yêu cầu rút tiền của bạn với số tiền ' . number_format($this->soTien, 0, ',', '.') .
            ' VNĐ đã được cập nhật trạng thái: ' . $this->trangThai .
            '. Bạn có thể xem yêu cầu tại đây: ' . $this->url,
            function ($message) {
                $message->to($this->user->email)
                    ->subject('Thông báo cập nhật yêu cầu rút tiền');
            }
        );
    }
}
