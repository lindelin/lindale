<?php

namespace App\Task;
use App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task\Task
 *
 * @property integer $id
 * @property integer $task_type_id
 * @property integer $user_id
 * @property integer $task_status_id
 * @property string $name
 * @property string $content
 * @property integer $progress
 * @property string $deadline
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Task\TaskType $Type
 * @property-read \App\Task\TaskStatus $Status
 * @property-read \App\User $User
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task\TaskComment[] $Comments
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereTaskTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereTaskStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereProgress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereDeadline($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    public function Type()
    {
        return $this->hasOne('App\Task\TaskType', 'id', 'task_type_id');
    }
    public function Status()
    {
        return $this->hasOne('App\Task\TaskStatus', 'id', 'task_status_id');
    }
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function Comments()
    {
        return $this->hasMany('App\Task\TaskComment', 'task_id', 'id');
    }

}
