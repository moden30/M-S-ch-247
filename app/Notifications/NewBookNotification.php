<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookNotification extends Notification
{
    use Queueable;

    public $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'tieu_de' => 'Có một cuốn sách mới cần kiểm duyệt',
            'noi_dung' => 'Cộng tác viên vừa thêm sách: ' . $this->book->ten_sach . ' với trạng thái: ' . $this->book->trang_thai,
            'book_url' => isset($this->book->id) ? route('sach.show', ['sach' => $this->book->id]) : null
        ];
    }
}
