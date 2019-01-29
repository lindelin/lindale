<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasDeletedPushNotify
{
    /**
     * Handle the event.
     *
     * @param  TodoDeleted  $event
     * @return void
     */
    public function handle(TodoDeleted $event)
    {
        push_todo_event_notification($event, 'todo.deleted-todo');
    }
}
