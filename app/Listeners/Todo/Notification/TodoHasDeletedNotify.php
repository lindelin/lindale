<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoDeleted;
use App\Notifications\Project\Todo\TodoHasDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        if((int)$event->todo->type_id === Definer::PUBLIC_TODO){
            $event->todo->Project->notify(new TodoHasDeleted(
                $event->user,
                session('lang'),
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
