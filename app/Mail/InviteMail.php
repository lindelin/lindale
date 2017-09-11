<?php

namespace App\Mail;

use App\Tools\Authenticates\AuthToken;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var AuthToken
     */
    public $token;

    /**
     * @var User
     */
    public $user;

    /**
     * 言語
     * @var
     */
    public $locale;

    /**
     * Create a new message instance.
     *
     * @param AuthToken $token
     * @param User $user
     * @param $locale
     */
    public function __construct(AuthToken $token, User $user, $locale)
    {
        $this->token = $token;
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
        return $this->subject('【'.config('app.name').'】'.trans('email.invite-user-subject',
                ['user' => $this->user->name, 'app' => config('app.name')]))
            ->markdown('emails.invite')
            ->with(['token' => $this->token, 'user' => $this->user]);
    }
}
