<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRawEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $subject;
    public $content;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $subject, $content)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Mail::raw($this->content, function ($message) {
            $message->to($this->email)
                ->subject($this->subject);
        });
    }
}
