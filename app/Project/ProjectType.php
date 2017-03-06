<?php

namespace App\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project\ProjectType
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectType extends Model
{
    //
}
