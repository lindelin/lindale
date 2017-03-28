<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings\AdminSettings.
 *
 * @property int $id
 * @property string $config_name
 * @property string $config_value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\AdminSettings whereConfigName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\AdminSettings whereConfigValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\AdminSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\AdminSettings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\AdminSettings whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminSettings extends Model
{
    //
}
