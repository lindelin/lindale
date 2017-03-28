<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Todo\TodoList.
 *
 * @property int $id
 * @property string $title
 * @property int $project_id
 * @property int $user_id
 * @property int $type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Todo\Todo[] $Todos
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoList whereUserId($value)
 * @mixin \Eloquent
 */
class TodoList extends Model
{
    /**
     * 一个To-do列表有多个To-do
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Todos()
    {
        return $this->hasMany('App\Todo\Todo', 'list_id', 'id');
    }
}
