<?php

namespace App\Listeners;

use App\Events\ProjectDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteProjectInfo
{
    /**
     * 项目创建事件的监听者.
     *
     * DeleteProjectInfo constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * 删除项目相关内容.
     *
     * @param  ProjectDeleted  $event
     * @return void
     */
    public function handle(ProjectDeleted $event)
    {
        $event->project->TodoLists()->delete();
        $event->project->Todos()->delete();
        $event->project->Wikis()->delete();
        $event->project->WikiTypes()->delete();
    }
}
