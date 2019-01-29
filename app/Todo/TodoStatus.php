<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Todo\TodoStatus.
 *
 * @property int $id
 * @property string $name
 * @property int $project_id
 * @property int $user_id
 * @property int $color_id
 * @property int $action_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereActionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoStatus whereUserId($value)
 * @mixin \Eloquent
 */
class TodoStatus extends Model
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
