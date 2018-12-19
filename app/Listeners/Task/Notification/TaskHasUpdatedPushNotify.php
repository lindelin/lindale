<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskHasUpdatedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TaskUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        push_task_event_notification($event, 'task.updated-task');
    }
}
