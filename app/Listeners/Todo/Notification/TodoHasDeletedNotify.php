<?php

namespace App\Listeners\Todo\Notification;

use App\UserConfig;
use App\ProjectConfig;
use App\Events\Todo\TodoDeleted;
use App\Notifications\Project\Todo\TodoHasDeleted;

class TodoHasDeletedNotify
{
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
        if (
            (int) $event->todo->type_id === config('todo.public')
            and $event->todo->User != null
            and UserConfig::get($event->todo->User, UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::ON
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != ''
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->todo->User->notify(new TodoHasDeleted(
                $event->user,
                UserConfig::get($event->todo->User, UserConfig::LANG),
                $event->todo->content,
                (string) $event->todo->created_at
            ));
        }
    }
}
