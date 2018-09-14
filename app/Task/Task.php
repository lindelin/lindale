<?php

namespace App\Task;

use App\Events\Task\TaskCreated;
use App\Events\Task\TaskDeleted;
use App\Events\Task\TaskUpdated;
use App\Events\Task\TaskUpdating;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\Task.
 *
 * @property int $project_id
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $start_at
 * @property string $end_at
 * @property int $cost
 * @property int $progress
 * @property int $user_id
 * @property int $color_id
 * @property int $type_id
 * @property int $status_id
 * @property int $group_id
 * @property int $priority_id
 * @property int $task_id
 * @property bool $is_finish
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\TaskActivity[] $Activities
 * @property-read \App\Task\TaskGroup $Group
 * @property-read \App\Task\TaskPriority $Priority
 * @property-read \App\Project\Project $Project
 * @property-read \App\Task\TaskStatus $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\SubTask[] $SubTasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @property-read \App\Task\TaskType $Type
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereCost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereEndAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereIsFinish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task wherePriorityId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereProgress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereStartAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $initiator_id
 * @property int|null $spend
 * @property-read \App\User $Initiator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task\Task whereInitiatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task\Task whereSpend($value)
 */
class Task extends Model
{
    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * タイミングイベント定義。
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
        'updated' => TaskUpdated::class,
        'deleted' => TaskDeleted::class,
    ];

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
     * 一个任务有一个开票人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Initiator()
    {
        return $this->hasOne('App\User', 'id', 'initiator_id');
    }

    /**
     * 一个任务对应一个类型
     * 一对一
     *
     * @return mixed
     */
    public function Type()
    {
        return $this->hasOne('App\Task\TaskType', 'id', 'type_id');
    }

    /**
     * 一个任务对应一个状态
     * 一对一
     *
     * @return mixed
     */
    public function Status()
    {
        return $this->hasOne('App\Task\TaskStatus', 'id', 'status_id');
    }

    /**
     * 一个任务属于一个组
     * 一对一
     *
     * @return mixed
     */
    public function Group()
    {
        return $this->hasOne('App\Task\TaskGroup', 'id', 'group_id');
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
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SubTasks()
    {
        return $this->hasMany('App\Task\SubTask', 'task_id', 'id');
    }

    /**
     * 一个任务有多个动态
     * 一对多.
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
