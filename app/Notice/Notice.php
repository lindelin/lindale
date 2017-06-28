<?php

namespace App\Notice;

use App\Project\Project;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $dates = [
        'start_at',
        'end_at'
    ];

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne(NoticeType::class, 'id', 'type_id');
    }

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
