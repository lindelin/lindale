<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Todo\Todo.
 *
 * @property int $id
 * @property string $content
 * @property int $type_id
 * @property int $status_id
 * @property int $color_id
 * @property int $list_id
 * @property int $user_id
 * @property int $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Project\Project $Project
 * @property-read \App\Todo\TodoStatus $Status
 * @property-read \App\Todo\TodoList $TodoList
 * @property-read \App\Todo\TodoType $Type
 * @property-read \App\User $User
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereListId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereStatusId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\Todo whereUserId($value)
 * @mixin \Eloquent
 */
class Todo extends Model
{
    /**
     * 一个To-do有一个负责人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一个To-do有一个开票人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Initiator()
    {
        return $this->hasOne('App\User', 'id', 'initiator_id');
    }

    /**
     * 一个To-do属于一个类型
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Todo\TodoType', 'id', 'type_id');
    }

    /**
     * 一个To-do属于一个列表
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function TodoList()
    {
        return $this->hasOne('App\Todo\TodoList', 'id', 'list_id');
    }

    /**
     * 一个To-do有一个状态
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Status()
    {
        return $this->hasOne('App\Todo\TodoStatus', 'id', 'status_id');
    }

    /**
     * 一个To-do属于一个项目
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Project()
    {
        return $this->hasOne('App\Project\Project', 'id', 'project_id');
    }
}
