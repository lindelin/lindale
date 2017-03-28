<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\TaskActivity.
 *
 * @property int $task_id
 * @property int $id
 * @property string $content
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereTaskId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\TaskActivity whereUserId($value)
 * @mixin \Eloquent
 */
class TaskActivity extends Model
{
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
