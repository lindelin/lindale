<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotificationError extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var
     */
    public $locale;

    /**
     * userNotificationError constructor.
     * @param User $user
     * @param $locale
     */
    public function __construct(User $user, $locale)
    {
        //
        $this->user = $user;
        $this->locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \App::setLocale($this->locale);

        return $this->subject(trans('errors.send-slack-failed-mail'))
            ->cc(config('admin.system-notification.mail'))
            ->markdown('emails.notification.user-notification-error')
            ->with(['user' => $this->user]);
    }
}
