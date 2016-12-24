<?php

namespace App\Policies;

use App\Project\Project;
use App\Task\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * 删除任务的授权策略
     *
     * @param Project $project
     * @param Task $task
     * @return bool
     */
    public function delete(Project $project, Task $task)
    {
        if((int)$project->id === (int)$task->project_id){
            return true;
        }else{
            return false;
        }
    }
}
