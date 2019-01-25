<?php

namespace App\Project;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectDeleted;
use App\Events\Project\ProjectUpdated;
use App\Task\TaskGroup;
use App\Tools\Analytics\Achievable;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Project\Project.
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $start_at
 * @property string $end_at
 * @property string $password
 * @property string $image
 * @property int $user_id
 * @property int $sl_id
 * @property int $type_id
 * @property int $status_id
 * @property int $progress
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Settings\ProjectSettings[] $Config
 * @property-read \App\User $ProjectLeader
 * @property-read \App\User $SubLeader
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\TaskGroup[] $TaskGroups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\TaskStatus[] $TaskStatuses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\TaskType[] $TaskTypes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Todo\TodoList[] $TodoLists
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Todo\Todo[] $Todos
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $Users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Wiki\WikiType[] $WikiTypes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Wiki\Wiki[] $Wikis
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereEndAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereProgress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereSlId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereStartAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\Project whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Notice\Notice[] $Notices
 */
class Project extends Model
{
    use Notifiable, Achievable;

    /**
     * タイミングイベント定義。
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ProjectCreated::class,
        'updated' => ProjectUpdated::class,
        'deleted' => ProjectDeleted::class,
    ];

    protected $dates = [
        'start_at',
        'end_at',
    ];

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
     * 一个项目有多个通知
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Notices()
    {
        return $this->hasMany('App\Notice\Notice', 'project_id', 'id');
    }

    /**
     * Slack 频道的通知路由.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return project_config(self::find($this->id), config('config.project.key.slack'));
    }

    /**
     * 一个项目有多个任务
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'project_id', 'id');
    }

    /**
     * 一个项目有多个任务组
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TaskGroups()
    {
        return $this->hasMany('App\Task\TaskGroup', 'project_id', 'id');
    }

    /**
     * 一个项目可以定义多个任务类型
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TaskTypes()
    {
        return $this->hasMany('App\Task\TaskType', 'project_id', 'id');
    }

    /**
     * 一个项目可以定义多个任务类型
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function openTaskTypes()
    {
        return $this->hasMany('App\Task\TaskType', 'project_id', 'id')
            ->where('status_id', '<>', TaskGroup::CLOSE)
            ->latest();
    }

    /**
     * 一个项目可以定义多个任务状态
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TaskStatuses()
    {
        return $this->hasMany('App\Task\TaskStatus', 'project_id', 'id');
    }

    /**
     * 一个项目有多个评价表
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'project_id', 'id');
    }

    /**
     * 评价表数
     * @return int
     */
    public function openEvaluationCount()
    {
        return $this->evaluations()->where('is_closed', config('task.unfinished'))->count();
    }

    /**
     * 完成评价表数
     * @return int
     */
    public function closedEvaluationCount()
    {
        return $this->evaluations()->where('is_closed', config('task.finished'))->count();
    }

    /**
     * 获取最新任务
     * @param $count
     * @return \Illuminate\Support\Collection
     */
    public function latestTask($count)
    {
        return $this->Tasks()
            ->where('is_finish', config('task.unfinished'))
            ->latest()
            ->take($count)
            ->get();
    }

    /**
     * 获取最新To-do
     * @param $count
     * @return \Illuminate\Support\Collection
     */
    public function latestTodo($count)
    {
        return $this->Todos()->latest()->take($count)->get();
    }
}
