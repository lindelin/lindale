<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Todo\TodoType
 *
 * @property int $id
 * @property string $name
 * @property int $color_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoType whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo\TodoType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TodoType extends Model
{
    //
}
