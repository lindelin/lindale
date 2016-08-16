<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskType.
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskType extends Model
{
    public function Tasks()
    {
        return $this->hasMany(Task::class);
    }
}
