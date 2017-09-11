<?php

namespace App\Listeners\User;

use App\Events\User\UserCreated;
use App\Tools\Authenticates\InviteAble;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInviteMail
{
    use InviteAble;

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $this->invite($event->user);
    }
}
