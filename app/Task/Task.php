<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    |--------------------------------------------------------------------------
    | HasOne 一对一
    |--------------------------------------------------------------------------
    */

    /**
     * 一个任务有一个负责人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一个任务对应一个类型
     * 一对一
     *
     * @return mixed
     */
    public function Type()
    {
        return $this->hasOne('App\Task\TaskType', 'id', 'type_id')->where('project_id',$this->project_id);
    }

    /**
     * 一个任务对应一个状态
     * 一对一
     *
     * @return mixed
     */
    public function Status()
    {
        return $this->hasOne('App\Task\TaskStatus', 'id', 'status_id')->where('project_id',$this->project_id);
    }

    /**
     * 一个任务属于一个组
     * 一对一
     *
     * @return mixed
     */
    public function Group()
    {
        return $this->hasOne('App\Task\TaskGroup', 'id', 'group_id')->where('project_id',$this->project_id);
    }

    /**
     * 一个任务有一个优先度
     * 一对一
     *
     * @return mixed
     */
    public function Priority()
    {
        return $this->hasOne('App\Task\TaskPriority', 'id', 'priority_id');
    }

    /**
     * 一个任务属于一个任务.
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Project()
    {
        return $this->hasOne('App\Project\Project', 'id', 'project_id');
    }

    /*
    |--------------------------------------------------------------------------
    | HasMany 一对多
    |--------------------------------------------------------------------------
    */

    /**
     * 一个任务有多个附属任务
     * 一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SubTasks()
    {
        return $this->hasMany('App\Task\SubTask', 'task_id', 'id');
    }

    /**
     * 一个任务有多个动态
     * 一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Activities()
    {
        return $this->hasMany('App\Task\TaskActivity', 'task_id', 'id');
    }

    /**
     * 一个任务有多个关联任务
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'task_id', 'id');
    }


}

