<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasDeletedPushNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TodoDeleted  $event
     * @return void
     */
    public function handle(TodoDeleted $event)
    {
        //
    }
}
