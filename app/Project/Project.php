<?php

namespace App\Project;

use App\ProjectConfig;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Config;

class Project extends Model
{
    use Notifiable;

    /*
    |--------------------------------------------------------------------------
    | 多对多关联
    |--------------------------------------------------------------------------
    */

    /**
     * 多个项目属于过个用户
     * 多对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_admin')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | 一对一关联
    |--------------------------------------------------------------------------
    */

    /**
     * 一个项目只有一个项目总监
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ProjectLeader()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一个项目只有一个项目副总监
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function SubLeader()
    {
        return $this->hasOne('App\User', 'id', 'sl_id');
    }

    /**
     * 一个项目只有一个状态
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Status()
    {
        return $this->hasOne('App\Project\ProjectStatus', 'id', 'status_id');
    }

    /**
     * 一个项目只有一个类型
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Project\ProjectType', 'id', 'type_id');
    }

    /*
    |--------------------------------------------------------------------------
    | 一对多关联
    |--------------------------------------------------------------------------
    */

    /**
     * 一个项目有多个WIKI
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Wikis()
    {
        return $this->hasMany('App\Wiki\Wiki', 'project_id', 'id');
    }

    /**
     * 一个项目有多个WIKI索引
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function WikiTypes()
    {
        return $this->hasMany('App\Wiki\WikiType', 'project_id', 'id');
    }

    /**
     * 一个项目有多个To-do
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Todos()
    {
        return $this->hasMany('App\Todo\Todo', 'project_id', 'id');
    }

    /**
     * 一个项目有多个To-do列表
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TodoLists()
    {
        return $this->hasMany('App\Todo\TodoList', 'project_id', 'id');
    }

    /**
     * 一个项目有多个设定值
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Config()
    {
        return $this->hasMany('App\Settings\ProjectSettings', 'project_id', 'id');
    }

    /**
     * Slack 频道的通知路由
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return ProjectConfig::get(self::find($this->id), ProjectConfig::SLACK_API_KEY);
    }

    /**
     * 一个项目有多个任务
     * 一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'project_id', 'id');
    }

    /**
     * 一个项目有多个任务组
     * 一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TaskGroups()
    {
        return $this->hasMany('App\Task\TaskGroup', 'project_id', 'id');
    }
}
