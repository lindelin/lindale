<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class ProjectSettings extends Model
{
    protected $fillable = ['id', 'config_name', 'config_value', 'project_id'];
}
