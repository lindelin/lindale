<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskActivity\TaskActivityCreated;
use App\Notifications\Project\Task\TaskActivityHasCreated;
use App\Tools\Checker\ConfigChecker;
use ProjectConfig;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
            $event->taskActivity->Task->Project->notify(new TaskActivityHasCreated($event->taskActivity, ProjectConfig::get($event->taskActivity->Task->Project, ProjectConfig::LANG)));
        }
    }
}
