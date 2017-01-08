<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskDeleted;
use App\Notifications\Project\Task\TaskHasDeleted;
use App\ProjectConfig;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskHasDeletedNotify
{
    /**
     * Handle the event.
     *
     * @param  TaskDeleted  $event
     * @return void
     */
    public function handle(TaskDeleted $event)
    {
        //项目消息
        if(
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != '' and
            ProjectConfig::get($event->task->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->task->Project->notify(new TaskHasDeleted(
                $event->user,
                ProjectConfig::get($event->task->Project, ProjectConfig::LANG),
                $event->task->title,
                $event->task->User,
                (string)$event->task->created_at
            ));
        }
    }
}
