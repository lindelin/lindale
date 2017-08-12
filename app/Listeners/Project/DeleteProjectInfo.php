<?php

namespace App\Listeners\Project;

use App\Events\Project\ProjectDeleted;

class DeleteProjectInfo
{
    /**
     * 项目创建事件的监听�
     * .
     *
     * DeleteProjectInfo constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * 删除项目相�
     * ��
     * 容.
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
        $event->project->TaskGroups()->delete();
        $event->project->Tasks()->delete();
        $event->project->TaskStatuses()->delete();
        $event->project->TaskTypes()->delete();
    }
}
