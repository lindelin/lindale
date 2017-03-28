<?php

namespace App\Project;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project\ProjectStatus.
 *
 * @property int $id
 * @property string $name
 * @property int $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectStatus whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectStatus whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectStatus whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project\ProjectStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectStatus extends Model
{
    //
}
