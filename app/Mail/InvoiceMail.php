<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
//        $imagePath = Storage::disk('public')->path($this->order->sach->anh_bia_sach);
//        $base64Image = null;
//        // Kiểm tra nếu file tồn tại
//        if (Storage::disk('public')->exists($this->order->sach->anh_bia_sach)) {
//            $imageData = base64_encode(file_get_contents($imagePath));
//            $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
//            $base64Image = "data:image/{$imageType};base64,{$imageData}";
//        }

        return new Content(
            html: 'emails.invoice',
            with: [
                'order' => $this->order,
//                'base64Image' => $base64Image,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
