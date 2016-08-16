<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskComment.
 *
 * @property int $id
 * @property string $content
 * @property int $task_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskComment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskComment extends Model
{
    protected $fillable = ['content', 'task_id', 'user_id'];

    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
