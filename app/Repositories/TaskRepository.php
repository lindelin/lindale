<?php

namespace App\Repositories;

use App\User;
use App\Task\Task;

class TaskRepository
{
    /**
     * 获取指定用户的所有任务。
     * ユーザのタスクを取り出すロジック
     *
     * @param  User  $user
     * @return Collection
     */
    public function UserTasks(User $user)
    {
        return Task::where('user_id', $user->id)->latest()->paginate(10);
    }

}