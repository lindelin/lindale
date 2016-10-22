<?php

namespace App\Policies;

use App\Todo\TodoList;
use App\User;
use App\Project\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoListPolicy
{
    use HandlesAuthorization;

    /**
     * 删除To-do列表的授权策略
     *
     * @param User $user
     * @param TodoList $list
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, TodoList $list, Project $project)
    {
        if((int)$user->id === (int)$list->user_id){
            return true;
        }else if((int)$project->id === (int)$list->project_id){
            return true;
        }else{
            return false;
        }
    }
}
