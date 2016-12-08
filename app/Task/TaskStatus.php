<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $fillable = ['id', 'project_id', 'name', 'color_id', 'action_id'];
}
