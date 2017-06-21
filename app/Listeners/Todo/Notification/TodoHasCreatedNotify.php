<?php

namespace App\Listeners\Todo\Notification;

use App\ProjectConfig;
use App\Events\Todo\TodoCreated;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Todo\TodoHasCreated;

class TodoHasCreatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TodoCreated  $event
     * @return void
     */
    public function handle(TodoCreated $event)
    {
        //项目消息
        if (
            (int) $event->todo->type_id === config('todo.public')
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->todo->Project->notify(new TodoHasCreated($event->todo, $event->user, ProjectConfig::get($event->todo->Project, ProjectConfig::LANG)));
        }

        //个人消息
        if ($this->userSlackNotify($event->todo->User, $event->todo->type_id)) {
            $event->todo->User->notify(new TodoHasCreated($event->todo, $event->user, user_config($event->todo->User, config('config.user.lang'))));
        }
    }
}
