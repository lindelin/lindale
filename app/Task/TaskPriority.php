<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskPriority.
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskPriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskPriority whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskPriority whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskPriority whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskPriority extends Model
{
    /**
     * 表示名
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public function name()
    {
        return trans($this->name);
    }
}
