<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskCreated;
use App\Notifications\Project\Task\TaskHasCreated;
use App\Tools\Checker\ConfigChecker;

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
            $event->task->Project->notify(new TaskHasCreated($event->task, $event->user, ProjectConfig::get($event->task->Project, ProjectConfig::LANG)));
        }
    }
}
