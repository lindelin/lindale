<?php

namespace App\Listeners\Todo\Notification;

use App\Tools\Checker\ConfigChecker;
use UserConfig;
use App\ProjectConfig;
use App\Events\Todo\TodoDeleted;
use App\Notifications\Project\Todo\TodoHasDeleted;

class TodoHasDeletedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TodoDeleted  $event
     * @return void
     */
    public function handle(TodoDeleted $event)
    {
        //项目消息
        if ($this->canNotifyTodoSlackToProject($event->todo->Project, $event->todo->type_id)) {
            $event->todo->Project->notify(new TodoHasDeleted(
                $event->user,
                project_config($event->todo->Project, config('config.project.lang')),
                $event->todo->content,
                (string) $event->todo->created_at
            ));
        }

        //个人消息
        if ($this->canNotifyTodoSlackToUser($event->todo->User, $event->todo->type_id)) {
            $event->todo->User->notify(new TodoHasDeleted(
                $event->user,
                user_config($event->todo->User, config('config.user.lang')),
                $event->todo->content,
                (string) $event->todo->created_at
            ));
        }
    }
}
