<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $fillable = ['id', 'config_name', 'config_value', 'user_id'];
}
