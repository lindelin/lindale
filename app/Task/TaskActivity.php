<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class TaskActivity extends Model
{
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
