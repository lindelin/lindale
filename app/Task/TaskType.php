<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    protected $fillable = ['id', 'project_id', 'name', 'color_id'];
}
