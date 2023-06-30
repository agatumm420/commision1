<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function __construct()
    {


    }
    public function build()
    {
        $smtpSettings = Config::get('mail.mailers.smtp');
        unset($smtpSettings['password']);
        Log::info('SMTP settings: ', $smtpSettings);
        return $this->view('emails.test')
            ->subject('Testing Mailer Connection')
            ->to('agnieszkatumm@gmail.com');
    }
}
