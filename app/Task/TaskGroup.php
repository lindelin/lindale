<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

/**
 * App\Task\TaskGroup.
 *
 * @property int $project_id
 * @property int $id
 * @property string $title
 * @property string $information
 * @property int $type_id
 * @property int $status_id
 * @property string $start_at
 * @property string $end_at
 * @property int $color_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Task\TaskStatus $Status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @property-read \App\Task\TaskType $Type
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereEndAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereInformation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereStartAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskGroup extends Model
{
    const OPEN  = 1;
    const CLOSE = 999;

    /**
     * 一个任务组有多个任务
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany('App\Task\Task', 'group_id', 'id');
    }

    /**
     * 一个任务组有一个类型.
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
     *
     */
    public function Status()
    {
        if ($this->status_id === self::CLOSE) {
            return new HtmlString('<span class="label label-danger"><span class="glyphicon glyphicon-folder-close"></span> CLOSE</span>');
        } else{
            return new HtmlString('<span class="label label-success"><span class="glyphicon glyphicon-folder-open"></span> OPEN</span>');
        }
    }
}
