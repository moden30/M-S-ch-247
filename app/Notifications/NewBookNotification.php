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
        switch ($this->action) {
            case 'add':
                return [
                    'tieu_de' => 'Có một cuốn sách mới cần kiểm duyệt',
                    'noi_dung' => 'Cộng tác viên vừa thêm sách: ' . $this->book->ten_sach . ' với trạng thái: ' . $this->book->kiem_duyet,
                    'url' => route('notificationSach', ['id' => $this->book->id]),
                    'trang_thai' => 'chua_xem',
                ];

            case 'update':
                return [
                    'tieu_de' => 'Cuốn sách đã được cập nhật',
                    'noi_dung' => 'Cộng tác viên vừa sửa sách: ' . $this->book->ten_sach . ' với trạng thái: ' . $this->book->kiem_duyet,
                    'url' => route('notificationSach', ['id' => $this->book->id]),
                    'trang_thai' => 'chua_xem',
                ];

            case 'status_changed':
                $trangThaiHienTai = $this->book->kiem_duyet == 'duyet' ? 'được duyệt' : 'bị từ chối';
                return [
                    'tieu_de' => 'Trạng thái sách đã được cập nhật',
                    'noi_dung' => 'Cuốn sách "' . $this->book->ten_sach . '" của bạn đã ' . $trangThaiHienTai . '.',
                    'url' => route('notificationSach', ['id' => $this->book->id]),
                    'trang_thai' => 'chua_xem',
                ];

            default:
                return [];
        }
    }
}
