<?php

namespace App\Exceptions\Notification;

use App\User;

class UserNotificationException extends \Exception
{
    /**
     * ユーザ.
     *
     * @var string
     */
    protected $user;

    /**
     * UserNotificationException constructor.
     * @param User $user
     * @param string $message
     */
    public function __construct(User $user, $message = 'User notification error')
    {
        $this->user = $user;
        parent::__construct($message);
    }

    /**
     * ユーザ取得.
     * @return string
     */
    final public function getUser()
    {
        return $this->user;
    }
}
