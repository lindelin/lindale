<?php

namespace App\Project;

use App\Task\Task;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'user_id', 'task_id', 'reviewer_id', 'evaluation', 'is_closed'
    ];

    /**
     * 一个评价表只有一个项目
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * 一个评价表只有一个负责人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * 一个评价表对应一个任务
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function task()
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    /**
     * 一个评价表对应一个评价人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reviewer()
    {
        return $this->hasOne(User::class, 'id', 'reviewer_id');
    }
}
