<?php

namespace App\Task;

use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    /**
     * 一个附属任务属于一个任务
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Task()
    {
        return $this->hasOne('App\Task\Task', 'id', 'task_id');
    }
}
