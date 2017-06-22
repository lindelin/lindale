<?php

namespace App\Listeners\Todo\Notification;

use App\Exceptions\Notification\ProjectNotificationException;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use UserConfig;
use App\ProjectConfig;
use App\Events\Todo\TodoUpdated;
use App\Notifications\Project\Todo\TodoHasUpdated;

class TodoHasUpdatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TodoUpdated $event
     * @return void
     * @throws ProjectNotificationException
     */
    public function handle(TodoUpdated $event)
    {
        //项目消息
        if ($this->canNotifyTodoSlackToProject($event->todo->Project, $event->todo->type_id)) {
            try {
                $event->todo->Project->notify(new TodoHasUpdated(
                    $event->todo,
                    $event->user,
                    project_config($event->todo->Project, config('config.project.lang'))
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->todo->Project, $exception->getMessage());
            }
        }

        //个人消息
        if ($this->canNotifyTodoSlackToUser($event->todo->User, $event->todo->type_id)) {
            $event->todo->User->notify(new TodoHasUpdated(
                $event->todo,
                $event->user,
                user_config($event->todo->User, config('config.user.lang'))
            ));
        }
    }
}
