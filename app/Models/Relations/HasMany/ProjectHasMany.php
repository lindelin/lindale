<?php


namespace App\Models\Relations\HasMany;


use App\Project\Evaluation;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ProjectHasMany
{
    /**
     * 一个项目有多个WIKI
     * 一对多.
     *
     * @return HasMany
     */
    public function wikis()
    {
        return $this->hasMany('App\Wiki\Wiki', 'project_id', 'id');
    }

    /**
     * 一个项目有多个WIKI索引
     * 一对多.
     *
     * @return HasMany
     */
    public function wikiTypes()
    {
        return $this->hasMany('App\Wiki\WikiType', 'project_id', 'id');
    }

    /**
     * 一个项目有多个To-do
     * 一对多.
     *
     * @return HasMany
     */
    public function todos()
    {
        return $this->hasMany('App\Todo\Todo', 'project_id', 'id');
    }

    /**
     * 一个项目有多个To-do列表
     * 一对多.
     *
     * @return HasMany
     */
    public function todoLists()
    {
        return $this->hasMany('App\Todo\TodoList', 'project_id', 'id');
    }

    /**
     * 一个项目有多个设定值
     * 一对多.
     *
     * @return HasMany
     */
    public function configs()
    {
        return $this->hasMany('App\Settings\ProjectSettings', 'project_id', 'id');
    }

    /**
     * 一个项目有多个通知
     * 一对多.
     *
     * @return HasMany
     */
    public function notices()
    {
        return $this->hasMany('App\Notice\Notice', 'project_id', 'id');
    }

    /**
     * 一个项目有多个任务
     * 一对多.
     *
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Task\Task', 'project_id', 'id');
    }

    /**
     * 一个项目有多个任务组
     * 一对多.
     *
     * @return HasMany
     */
    public function taskGroups()
    {
        return $this->hasMany('App\Task\TaskGroup', 'project_id', 'id');
    }

    /**
     * 一个项目可以定义多个任务类型
     * 一对多.
     *
     * @return HasMany
     */
    public function taskTypes()
    {
        return $this->hasMany('App\Task\TaskType', 'project_id', 'id');
    }

    /**
     * 一个项目可以定义多个任务状态
     * 一对多.
     *
     * @return HasMany
     */
    public function taskStatuses()
    {
        return $this->hasMany('App\Task\TaskStatus', 'project_id', 'id');
    }

    /**
     * 一个项目有多个评价表
     * 一对多.
     *
     * @return HasMany
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'project_id', 'id');
    }
}