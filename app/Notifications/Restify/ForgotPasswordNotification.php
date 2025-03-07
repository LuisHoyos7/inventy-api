<?php

namespace App\Notifications\Restify;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $url,
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('In order to reset your password, please click the button below.')
            ->action('Reset password', $this->url)
            ->line('If you did not request a password reset, please ignore this email.');
    }
}
