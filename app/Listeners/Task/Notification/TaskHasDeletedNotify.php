<?php

namespace App\Listeners\Task\Notification;

use App\Exceptions\Notification\ProjectNotificationException;
use App\ProjectConfig;
use App\Events\Task\TaskDeleted;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Task\TaskHasDeleted;
use GuzzleHttp\Exception\ClientException;

class TaskHasDeletedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TaskDeleted $event
     * @return void
     * @throws ProjectNotificationException
     */
    public function handle(TaskDeleted $event)
    {
        //项目消息
        if ($this->canNotifyTaskSlackToProject($event->task->Project)) {
            try {
                $event->task->Project->notify(new TaskHasDeleted(
                    $event->user,
                    project_config($event->task->Project, config('config.project.lang')),
                    $event->task->title,
                    $event->task->User,
                    (string) $event->task->created_at
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->task->Project, $exception->getMessage());
            }
        }
    }
}
