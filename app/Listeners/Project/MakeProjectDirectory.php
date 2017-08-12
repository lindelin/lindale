<?php

namespace App\Listeners\Project;

use App\Events\Project\ProjectCreated;
use Illuminate\Support\Facades\Storage;

class MakeProjectDirectory
{
    /**
     * 项目创建事件的监听�
     * .
     *
     * MakeProjectDirectory constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        Storage::makeDirectory('public/projects/'.$event->project->id);
        if ($event->project->image != '') {
            $extension = pathinfo($event->project->image, PATHINFO_EXTENSION);
            $result = Storage::move('public/'.$event->project->image, 'public/projects/'.$event->project->id.'/'.'icon'.'.'.$extension);
            if ($result) {
                $newPath = 'projects/'.$event->project->id.'/'.'icon'.'.'.$extension;
                $event->project->image = $newPath;
                $event->project->update();
            }
        }
    }
}
