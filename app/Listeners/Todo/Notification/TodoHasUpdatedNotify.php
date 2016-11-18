<?php

namespace App\Listeners\Todo\Notification;

use App\Definer;
use App\Events\Todo\TodoUpdated;
use App\Notifications\Project\Todo\TodoHasUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        if((int)$event->todo->type_id === Definer::PUBLIC_TODO){
            $event->todo->Project->notify(new TodoHasUpdated($event->todo, $event->user, session('lang')));
        }
    }
}
