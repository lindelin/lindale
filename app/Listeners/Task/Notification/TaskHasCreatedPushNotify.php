<?php

namespace App\Listeners\Task\Notification;

use App\Events\Task\TaskCreated;
use App\Tools\Facades\FCM;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskHasCreatedPushNotify implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        $users = User::where('id', $event->user->id)
            ->orWhere('id', $event->task->User->id)
            ->orWhere('id', $event->task->Project->ProjectLeader->id)
            ->get();

        FCM::to($users)
            ->title(trans('task.created-task', ['name' => $event->user->name]))
            ->messages(trans($event->task->Type->name).'：'.$event->task->title)
            ->send();
    }
}
