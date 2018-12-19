<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasUpdatedPushNotify
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
     * @param  TodoUpdated  $event
     * @return void
     */
    public function handle(TodoUpdated $event)
    {
        //
    }
}
