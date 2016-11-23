<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoCreated;
use App\Notifications\Project\Todo\TodoHasCreated;
use App\ProjectConfig;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasCreatedNotify
{
    /**
     * Handle the event.
     *
     * @param  TodoCreated  $event
     * @return void
     */
    public function handle(TodoCreated $event)
    {
        if((int)$event->todo->type_id === Definer::PUBLIC_TODO
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->todo->Project->notify(new TodoHasCreated($event->todo, $event->user, ProjectConfig::get($event->todo->Project, ProjectConfig::LANG)));
        }
    }
}
