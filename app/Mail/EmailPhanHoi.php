<?php

namespace App\Mail;

use App\Models\LienHe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailPhanHoi extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('admin.email.emailphanhoi')
        ->with([
            'ten_khach_hang' => $this->data['ten_khach_hang'],
            'created_at' => $this->data['created_at'],
            'tieu_de' => $this->data['tieu_de'],
            'noi_dung' => $this->data['noi_dung'],
        ]);

        if (!empty($this->data['anh'])) {
            foreach ($this->data['anh'] as $filePath) {
                $email->attach($filePath);
            }
        }
        return $email;
    }
}
