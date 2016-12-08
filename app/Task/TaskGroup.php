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

    /**
     * 一个任务组有一个类型
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Task\TaskType', 'id', 'type_id');
    }

    /**
     * 一个任务组有一个状态
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Status()
    {
        return $this->hasOne('App\Task\TaskStatus', 'id', 'status_id');
    }
}
