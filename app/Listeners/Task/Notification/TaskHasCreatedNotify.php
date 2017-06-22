<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskCreated;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Task\TaskHasCreated;

class TaskHasCreatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        //项目消息
        if ($this->projectSlackNotify($event->task->Project)) {
            $event->task->Project->notify(new TaskHasCreated($event->task, $event->user, project_config($event->task->Project, config('config.project.lang'))));
        }
    }
}
