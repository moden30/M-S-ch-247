<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChuongNotification extends Notification
{
    use Queueable;

    public $chuong;
    public $chuoongs;

    public function __construct($chuong, $chuoongs)
    {
        $this->chuong = $chuong;
        $this->chuoongs = $chuoongs;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        $sach = $this->chuong->sach;
        $chuong = $this->chuong;

        if ($this->chuoongs === 'storeChuong') {
            return [
                'tieu_de' => 'Chương mới được thêm vào cuốn sách',
                'noi_dung' => 'Cộng tác viên vừa thêm chương: ' . $chuong->tieu_de . ' trong cuốn sách: ' . $sach->ten_sach,
                'url' => route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]),
            ];
        } elseif ($this->chuoongs === 'updateChuong') {
            return [
                'tieu_de' => 'Chương đã được cập nhật',
                'noi_dung' => 'Cộng tác viên vừa sửa chương: ' . $chuong->tieu_de . ' trong cuốn sách: ' . $sach->ten_sach,
                'url' => route('sach.show', ['sach' => $sach->id, 'chuong_id' => $chuong->id]),
            ];
        }

        return [];
    }
}
