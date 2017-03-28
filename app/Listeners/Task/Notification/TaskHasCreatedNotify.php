<?php

namespace App\Listeners\Task\Notification;

use App\ProjectConfig;
use App\Events\Task\TaskCreated;
use App\Notifications\Project\Task\TaskHasCreated;

class TaskHasCreatedNotify
{
    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        //项目消息
        if (
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != '' and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->task->Project->notify(new TaskHasCreated($event->task, $event->user, ProjectConfig::get($event->task->Project, ProjectConfig::LANG)));
        }
    }
}
