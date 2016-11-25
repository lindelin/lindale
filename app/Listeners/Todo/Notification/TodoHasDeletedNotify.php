<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoDeleted;
use App\Notifications\Project\Todo\TodoHasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ProjectConfig;
use App\UserConfig;

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
        if(
            (int)$event->todo->type_id === Definer::PUBLIC_TODO
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

        //个人消息
        if(
            (int)$event->todo->type_id === Definer::PUBLIC_TODO
            and $event->todo->User != null
            and UserConfig::get($event->todo->User, UserConfig::SLACK_NOTIFICATION_NO) == UserConfig::ON
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != ''
            and UserConfig::get($event->todo->User, UserConfig::SLACK_API_KEY) != 'Null'
        ){
            $event->todo->User->notify(new TodoHasDeleted(
                $event->user,
                UserConfig::get($event->todo->User, UserConfig::LANG),
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
