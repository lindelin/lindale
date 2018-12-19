<?php

namespace App\Listeners\Todo\Notification;

use App\Events\Todo\TodoUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodoHasUpdatedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TodoUpdated  $event
     * @return void
     */
    public function handle(TodoUpdated $event)
    {
        push_todo_event_notification($event, 'todo.updated-todo');
    }
}
