<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskType
 *
 * @property int $project_id
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskType extends Model
{
    protected $fillable = ['id', 'project_id', 'name', 'color_id'];
}
