<?php

namespace App\Listeners\Todo\Notification;

use App\ProjectConfig;
use App\Events\Todo\TodoDeleted;
use App\Tools\Checker\ConfigChecker;
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
        if (
            (int) $event->todo->type_id === config('todo.public')
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->todo->Project->notify(new TodoHasDeleted(
                $event->user,
                ProjectConfig::get($event->todo->Project, ProjectConfig::LANG),
                $event->todo->content,
                (string) $event->todo->created_at
            ));
        }

        //个人消息
        if ($this->userSlackNotify($event->todo->User, $event->todo->type_id)) {
            $event->todo->User->notify(new TodoHasDeleted(
                $event->user,
                user_config($event->todo->User, config('config.user.lang')),
                $event->todo->content,
                (string) $event->todo->created_at
            ));
        }
    }
}
