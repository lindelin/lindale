<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskUpdated;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Task\TaskHasUpdated;

class TaskHasUpdatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        //项目消息
        if ($this->canNotifyTaskSlackToProject($event->task->Project)) {
            $event->task->Project->notify(new TaskHasUpdated(
                $event->task,
                $event->user,
                project_config($event->task->Project, config('config.project.lang'))
            ));
        }
    }
}
