<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoDeleted;
use App\Notifications\Project\Todo\TodoHasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ProjectConfig;

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
        if((int)$event->todo->type_id === Definer::PUBLIC_TODO
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != ''
            and ProjectConfig::get($event->todo->Project, ProjectConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->todo->Project->notify(new TodoHasDeleted(
                $event->user,
                ProjectConfig::get($event->todo->Project, ProjectConfig::LANG),
                $event->todo->content,
                $event->todo->User ? $this->todo->User->name : trans('project.none'),
                $event->todo->Status->name,
                (string)$event->todo->created_at,
                $event->todo->project_id,
                $event->todo->TodoList ? $event->todo->TodoList->title : trans('project.none')
            ));
        }
    }
}
