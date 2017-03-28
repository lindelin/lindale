<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings\UserSettings.
 *
 * @property int $id
 * @property string $config_name
 * @property string $config_value
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereConfigName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereConfigValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Settings\UserSettings whereUserId($value)
 * @mixin \Eloquent
 */
class UserSettings extends Model
{
    protected $fillable = ['id', 'config_name', 'config_value', 'user_id'];
}
