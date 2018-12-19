<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskHasDeletedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TaskDeleted  $event
     * @return void
     */
    public function handle(TaskDeleted $event)
    {
        push_task_event_notification($event, 'task.deleted-task');
    }
}
