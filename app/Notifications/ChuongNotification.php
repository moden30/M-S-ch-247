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
        if ($this->chuoongs === 'add') {
            return [
                'tieu_de' => 'Chương mới được thêm vào cuốn sách',
                'noi_dung' => 'Cộng tác viên vừa thêm chương: ' . $this->chuong->tieu_de . ' trong cuốn sách: ' . $this->chuong->sach->ten_sach,
//                'chuong_url' => isset($this->chuong->id) ? route('chuong.show', ['chuong' => $this->chuong->id]) : null
            ];
        } elseif ($this->chuoongs === 'update') {
            return [
                'tieu_de' => 'Chương đã được cập nhật',
                'noi_dung' => 'Cộng tác viên vừa sửa chương: ' . $this->chuong->tieu_de . ' trong cuốn sách: ' . $this->chuong->sach->ten_sach,
//                'chuong_url' => isset($this->chuong->id) ? route('chuong.show', ['chuong' => $this->chuong->id]) : null
            ];
        }

        return [];
    }
}
