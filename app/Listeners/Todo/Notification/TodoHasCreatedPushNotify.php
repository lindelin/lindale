<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasCreatedPushNotify
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
     * @param  TodoCreated  $event
     * @return void
     */
    public function handle(TodoCreated $event)
    {
        //
    }
}
