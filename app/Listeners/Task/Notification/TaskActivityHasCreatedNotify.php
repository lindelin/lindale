<?php

namespace App\Listeners\Task\Notification;

use ProjectConfig;
use App\Tools\Checker\ConfigChecker;
use App\Events\Task\TaskActivity\TaskActivityCreated;
use App\Notifications\Project\Task\TaskActivityHasCreated;

class TaskActivityHasCreatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskActivityCreated  $event
     * @return void
     */
    public function handle(TaskActivityCreated $event)
    {
        //项目消息
        if ($this->projectSlackNotify($event->taskActivity->Task->Project)) {
            $event->taskActivity->Task->Project->notify(new TaskActivityHasCreated($event->taskActivity, project_config($event->taskActivity->Task->Project, config('config.project.lang'))));
        }
    }
}
