<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskCreated;
use App\Tools\Facades\FCM;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskHasCreatedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        push_task_event_notification($event, 'task.created-task');
    }
}
