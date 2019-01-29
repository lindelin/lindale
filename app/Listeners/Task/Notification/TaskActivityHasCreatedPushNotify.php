<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskActivity\TaskActivityCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskActivityHasCreatedPushNotify
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
     * @param  TaskActivityCreated  $event
     * @return void
     */
    public function handle(TaskActivityCreated $event)
    {
        //
    }
}
