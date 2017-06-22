<?php

namespace App\Listeners\Todo\Notification;

use App\Tools\Checker\ConfigChecker;
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
     * @param  TodoUpdated  $event
     * @return void
     */
    public function handle(TodoUpdated $event)
    {
        //项目消息
        if ($this->canNotifyTodoSlackToProject($event->todo->Project, $event->todo->type_id)) {
            $event->todo->Project->notify(new TodoHasUpdated(
                $event->todo,
                $event->user,
                project_config($event->todo->Project, config('config.project.lang'))
            ));
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
