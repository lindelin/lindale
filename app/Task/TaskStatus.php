<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskStatus.
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\Task[] $Tasks
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskStatus extends Model
{
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Tasks()
    {
        return $this->hasMany(Task::class);
    }
}
