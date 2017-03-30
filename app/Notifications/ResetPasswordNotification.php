<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * 语言信息.
     *
     * @var
     */
    public $locale;

    /**
     * Create a notification instance.
     *
     * ResetPasswordNotification constructor.
     * @param $token
     * @param $locale
     */
    public function __construct($token, $locale)
    {
        $this->token = $token;
        $this->locale = $locale;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        \App::setLocale($this->locale);

        return (new MailMessage)
            ->subject(trans('email.re-pass-title'))
            ->line(trans('email.re-password-info'))
            ->action(trans('email.reset-password'), url('password/reset', $this->token))
            ->line(trans('email.error-reset-password'));
    }
}
