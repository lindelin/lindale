<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings\ProjectSettings
 *
 * @property int $id
 * @property string $config_name
 * @property string $config_value
 * @property int $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereConfigName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereConfigValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\ProjectSettings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectSettings extends Model
{
    protected $fillable = ['id', 'config_name', 'config_value', 'project_id'];
}
