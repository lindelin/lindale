<?php

namespace App\Listeners\Task\Notification;

use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use App\Events\Task\TaskActivity\TaskActivityCreated;
use App\Notifications\Project\Task\TaskActivityHasCreated;
use App\Exceptions\Notification\ProjectNotificationException;

class TaskActivityHasCreatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskActivityCreated $event
     * @return void
     * @throws ProjectNotificationException
     */
    public function handle(TaskActivityCreated $event)
    {
        //项目消息
        if ($this->canNotifyTaskSlackToProject($event->taskActivity->Task->Project)) {
            try {
                $event->taskActivity->Task->Project->notify(new TaskActivityHasCreated(
                    $event->taskActivity,
                    project_config($event->taskActivity->Task->Project, config('config.project.lang'))
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->taskActivity->Task->Project, $exception->getMessage());
            }
        }
    }
}
