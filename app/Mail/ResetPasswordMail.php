<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetLink;

    public function __construct($resetLink)
    {
        $this->resetLink = $resetLink;

    }

    public function build()

    {
        $smtpSettings = Config::get('mail.mailers.smtp');
        unset($smtpSettings['password']); // Avoid logging sensitive data
        dump('SMTP settings: ', $smtpSettings);
        Log::info('SMTP settings: ', $smtpSettings);
        return $this->from('support@wyjazdowo.eu')
            ->subject('Resetowanie Hasła')
            ->markdown('emails.ResetPassword', ['resetLink' => $this->resetLink]);
    }
}
