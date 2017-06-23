<?php

namespace App\Listeners\Todo\Notification;

use App\Exceptions\Notification\ProjectNotificationException;
use App\Exceptions\Notification\UserNotificationException;
use App\Tools\Checker\ConfigChecker;
use GuzzleHttp\Exception\ClientException;
use UserConfig;
use App\ProjectConfig;
use App\Events\Todo\TodoCreated;
use App\Notifications\Project\Todo\TodoHasCreated;

class TodoHasCreatedNotify
{
    use ConfigChecker;

    /**
     * @param TodoCreated $event
     * @throws ProjectNotificationException
     * @throws UserNotificationException
     */
    public function handle(TodoCreated $event)
    {
        //项目消息
        if ($this->canNotifyTodoSlackToProject($event->todo->Project, $event->todo->type_id)) {
            try {
                $event->todo->Project->notify(new TodoHasCreated(
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
                $event->todo->User->notify(new TodoHasCreated(
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
