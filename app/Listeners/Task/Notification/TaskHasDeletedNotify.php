<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskDeleted;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use App\Notifications\Project\Task\TaskHasDeleted;
use App\Exceptions\Notification\ProjectNotificationException;

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
                    (string) $event->task->created_at->format('Y/m/d h:m:s')
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->task->Project, $exception->getMessage());
            }
        }
    }
}
