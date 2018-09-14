<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskStatus.
 *
 * @property int $project_id
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property int $action_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereActionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskStatus extends Model
{
    protected $fillable = ['id', 'project_id', 'name', 'color_id', 'action_id'];

    /**
     * 表示名
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public function name()
    {
        return trans($this->name);
    }
}
