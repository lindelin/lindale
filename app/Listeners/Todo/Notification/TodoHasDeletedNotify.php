<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoDeleted;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use App\Notifications\Project\Todo\TodoHasDeleted;
use App\Exceptions\Notification\UserNotificationException;
use App\Exceptions\Notification\ProjectNotificationException;

class TodoHasDeletedNotify
{
    use ConfigChecker;

    /**
     * @param TodoDeleted $event
     * @throws ProjectNotificationException
     * @throws UserNotificationException
     */
    public function handle(TodoDeleted $event)
    {
        //项目消息
        if ($this->canNotifyTodoSlackToProject($event->todo->Project, $event->todo->type_id)) {
            try {
                $event->todo->Project->notify(new TodoHasDeleted(
                    $event->user,
                    project_config($event->todo->Project, config('config.project.lang')),
                    $event->todo->content,
                    (string) $event->todo->created_at
                ));
            } catch (ClientException $exception) {
                throw new ProjectNotificationException($event->todo->Project, $exception->getMessage());
            }
        }

        //个人消息
        if ($this->canNotifyTodoSlackToUser($event->todo->User, $event->todo->type_id)) {
            try {
                $event->todo->User->notify(new TodoHasDeleted(
                    $event->user,
                    user_config($event->todo->User, config('config.user.lang')),
                    $event->todo->content,
                    (string) $event->todo->created_at
                ));
            } catch (ClientException $exception) {
                throw new UserNotificationException($event->todo->User, $exception->getMessage());
            }
        }
    }
}
