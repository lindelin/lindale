<?php

namespace App\Listeners\Task;

use App\Events\Task\TaskUpdated;
use App\Project\Evaluation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinishedTaskListener
{
    /**
     * Handle the event.
     *
     * @param  TaskUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        if ((int)$event->task->user_id !== 0 and (int)$event->task->is_finish === config('task.finished')) {
            Evaluation::updateOrCreate([
                'task_id' => $event->task->id
            ], [
                'project_id' => $event->task->project_id,
                'user_id' => $event->task->user_id,
                'is_closed' => config('task.unfinished'),
            ]);
        }
    }
}
