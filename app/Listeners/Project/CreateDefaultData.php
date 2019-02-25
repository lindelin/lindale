<?php

namespace App\Listeners\Project;

use App\Events\Project\ProjectCreated;
use App\Task\TaskStatus;
use App\Task\TaskType;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDefaultData
{
    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        TaskType::firstOrCreate(
            [
                'project_id' => $event->project->id,
            ],
            [
                'name' => 'task.default',
                'color_id' => config('color.default'),
            ]
        );

        TaskStatus::firstOrCreate(
            [
                'project_id' => $event->project->id,
            ],
            [
                'name' => 'task.underway',
                'color_id' => config('color.primary'),
                'action_id' => config('todo.status.underway'),
            ]
        );
    }
}
