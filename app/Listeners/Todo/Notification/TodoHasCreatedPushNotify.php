<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasCreatedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TodoCreated  $event
     * @return void
     */
    public function handle(TodoCreated $event)
    {
        push_todo_event_notification($event, 'todo.created-todo');
    }
}
