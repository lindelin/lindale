<?php

namespace App\Policies;

use App\Project\Project;
use App\Todo\Todo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * 删除To-do的授权策略
     *
     * @param User $user
     * @param Todo $todo
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, Todo $todo, Project $project)
    {
        if((int)$user->id === (int)$todo->user_id){
            return true;
        }else if((int)$project->id === (int)$todo->project_id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 更新To-do的授权策略
     *
     * @param User $user
     * @param Todo $todo
     * @param Project $project
     * @return bool
     */
    public function update(User $user, Todo $todo, Project $project)
    {
        return $this->delete($user, $todo, $project);
    }
}
