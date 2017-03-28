<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskUpdated;
use App\Notifications\Project\Task\TaskHasUpdated;

class TaskHasUpdatedNotify
{
    /**
     * Handle the event.
     *
     * @param  TaskUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        //项目消息
        if (
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != '' and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->task->Project->notify(new TaskHasUpdated($event->task, $event->user, ProjectConfig::get($event->task->Project, ProjectConfig::LANG)));
        }
    }
}
