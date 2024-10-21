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
    public $action;

    public function __construct($book, $action)
    {
        $this->book = $book;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        if ($this->action === 'add') {
            return [
                'tieu_de' => 'Có một cuốn sách mới cần kiểm duyệt',
                'noi_dung' => 'Cộng tác viên vừa thêm sách: ' . $this->book->ten_sach . ' với trạng thái: ' . $this->book->trang_thai,
                'url' => route('notificationSach', ['id' => $this->book->id])
            ];
        } elseif ($this->action === 'update') {
            return [
                'tieu_de' => 'Cuốn sách đã được cập nhật',
                'noi_dung' => 'Cộng tác viên vừa sửa sách: ' . $this->book->ten_sach . ' với trạng thái: ' . $this->book->trang_thai,
                'url' => route('notificationSach', ['id' => $this->book->id])
            ];
        }

        return [];
    }
}
