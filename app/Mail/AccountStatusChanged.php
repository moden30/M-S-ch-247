<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public  $user;
    public  $status;
    public function __construct($user, $status)
    {
        $this->user = $user;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo trạng thái tài khoản',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.account_status_changed',
            with: ['user' => $this->user, 'status' => $this->status]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}


//namespace App\Mail;
//
//use App\Models\LienHe;
//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Mail\Mailable;
//use Illuminate\Mail\Mailables\Content;
//use Illuminate\Mail\Mailables\Envelope;
//use Illuminate\Queue\SerializesModels;
//
//class AccountStatusChanged extends Mailable
//{
//    use Queueable, SerializesModels;
//
//    public $user;
//    public $status;
//
//    /**
//     * Create a new message instance.
//     *
//     * @return void
//     */
//    public function __construct($user, $status)
//    {
//        $this->user = $user;
//        $this->status = $status;
//    }
//
//    /**
//     * Build the message.
//     *
//     * @return $this
//     */
//    public function build()
//    {
//        $email = $this->view('emails.account_status_changed')
//            ->with([
//                'user' => $this->user,
//                'status' => $this->status
//
//            ]);
//
//
//        return $email;
//    }
//}
