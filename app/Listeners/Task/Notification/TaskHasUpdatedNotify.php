<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskUpdated;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use App\Notifications\Project\Task\TaskHasUpdated;
use App\Exceptions\Notification\ProjectNotificationException;

class TaskHasUpdatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskUpdated $event
     * @return void
     * @throws ProjectNotificationException
     */
    public function handle(TaskUpdated $event)
    {
        //项目消息
        if ($this->canNotifyTaskSlackToProject($event->task->Project)) {
            try {
                $event->task->Project->notify(new TaskHasUpdated(
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
