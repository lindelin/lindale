<?php

namespace App\Listeners\Task\Notification;

use App\Exceptions\Notification\ProjectNotificationException;
use App\ProjectConfig;
use App\Events\Task\TaskCreated;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Task\TaskHasCreated;
use GuzzleHttp\Exception\ClientException;

class TaskHasCreatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskCreated $event
     * @return void
     * @throws ProjectNotificationException
     */
    public function handle(TaskCreated $event)
    {
        //项目消息
        if ($this->canNotifyTaskSlackToProject($event->task->Project)) {
            try {
                $event->task->Project->notify(new TaskHasCreated(
                    $event->task,
                    $event->user,
                    project_config($event->task->Project, config('config.project.lang'))
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->task->Project, $exception->getMessage());
            }
        }
    }
}
