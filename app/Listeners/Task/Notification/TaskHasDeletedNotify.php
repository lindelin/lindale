<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskDeleted;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Task\TaskHasDeleted;

class TaskHasDeletedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskDeleted  $event
     * @return void
     */
    public function handle(TaskDeleted $event)
    {
        //项目消息
        if ($this->projectSlackNotify($event->task->Project)) {
            $event->task->Project->notify(new TaskHasDeleted(
                $event->user,
                ProjectConfig::get($event->task->Project, ProjectConfig::LANG),
                $event->task->title,
                $event->task->User,
                (string) $event->task->created_at
            ));
        }
    }
}
