<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RutTienCTVNotification extends Notification
{
    use Queueable;

    protected $soTien;
    protected $maYeuCau;
    protected $withdrawalId;

    /**
     * Create a new notification instance.
     */
    public function __construct($withdrawalId, $soTien, $maYeuCau)
    {
        $this->withdrawalId = $withdrawalId;
        $this->soTien = $soTien;
        $this->maYeuCau = $maYeuCau;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Yêu cầu rút tiền mới từ CTV')
            ->greeting('Xin chào ' . $notifiable->name . ',')
            ->line('Bạn vừa gửi yêu cầu rút tiền với số tiền ' . number_format($this->soTien, 0, ',', '.') . ' VNĐ.')
            ->line('Mã yêu cầu của bạn là: ' . $this->maYeuCau)
            ->line('Yêu cầu của bạn đang được xử lý. Chúng tôi sẽ thông báo ngay khi có kết quả.')
            ->action('Xem chi tiết yêu cầu', url('/rut-tien/' . $this->withdrawalId))
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'tieu_de' => 'Yêu cầu rút tiền mới',
            'noi_dung' => 'Bạn vừa gửi yêu cầu rút tiền với số tiền ' . number_format($this->soTien, 0, ',', '.') . ' VNĐ. Mã yêu cầu: ' . $this->maYeuCau,
            'url' => route('notificationRutTien', ['id' => $this->withdrawalId]),
            'trang_thai' => 'chua_xem',
        ];
    }
}
