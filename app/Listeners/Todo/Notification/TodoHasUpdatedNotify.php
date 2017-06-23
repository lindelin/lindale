<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoUpdated;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use App\Notifications\Project\Todo\TodoHasUpdated;
use App\Exceptions\Notification\UserNotificationException;
use App\Exceptions\Notification\ProjectNotificationException;

class TodoHasUpdatedNotify
{
    use ConfigChecker;

    /**
     * @param TodoUpdated $event
     * @throws ProjectNotificationException
     * @throws UserNotificationException
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
            try {
                $event->todo->User->notify(new TodoHasUpdated(
                    $event->todo,
                    $event->user,
                    user_config($event->todo->User, config('config.user.lang'))
                ));
            } catch (ClientException $exception) {
                throw new UserNotificationException($event->todo->User, $exception->getMessage());
            }
        }
    }
}
