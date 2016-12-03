<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    /**
     * 一个任务组有多个任务
     * 一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'group_id', 'id');
    }
}
