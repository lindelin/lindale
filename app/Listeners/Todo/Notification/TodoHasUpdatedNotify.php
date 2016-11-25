<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoUpdated;
use App\Notifications\Project\Todo\TodoHasUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ProjectConfig;
use App\UserConfig;


class TodoHasUpdatedNotify
{
    /**
     * Handle the event.
     *
     * @param  TodoUpdated  $event
     * @return void
     */
    public function handle(TodoUpdated $event)
    {
        //项目消息
        if(
            (int)$event->todo->type_id === Definer::PUBLIC_TODO
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->todo->Project->notify(new TodoHasUpdated($event->todo, $event->user, ProjectConfig::get($event->todo->Project, ProjectConfig::LANG)));
        }

        //个人消息
        if(
            (int)$event->todo->type_id === Definer::PUBLIC_TODO
            and $event->todo->User != null
            and UserConfig::get($event->todo->User, UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::ON
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != ''
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->todo->User->notify(new TodoHasUpdated($event->todo, $event->user, UserConfig::get($event->todo->User, UserConfig::LANG)));
        }
    }
}
