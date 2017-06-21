<?php

namespace App\Listeners\Todo\Notification;

use App\ProjectConfig;
use App\Events\Todo\TodoUpdated;
use App\Tools\Checker\ConfigChecker;
use App\Notifications\Project\Todo\TodoHasUpdated;

class TodoHasUpdatedNotify
{
    use ConfigChecker;

    /**
     * Handle the event.
     *
     * @param  TodoUpdated  $event
     * @return void
     */
    public function handle(TodoUpdated $event)
    {
        //项目消息
        if (
            (int) $event->todo->type_id === config('todo.public')
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ) {
            $event->todo->Project->notify(new TodoHasUpdated($event->todo, $event->user, ProjectConfig::get($event->todo->Project, ProjectConfig::LANG)));
        }

        //个人消息
        if ($this->userSlackNotify($event->todo->User, $event->todo->type_id)) {
            $event->todo->User->notify(new TodoHasUpdated($event->todo, $event->user, user_config($event->todo->User, config('config.user.lang'))));
        }
    }
}
