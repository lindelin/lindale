<?php

namespace App\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_admin')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ProjectLeader()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function SubLeader()
    {
        return $this->hasOne('App\User', 'id', 'sl_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Status()
    {
        return $this->hasOne('App\Project\ProjectStatus', 'id', 'status_id');
    }

    public function Type()
    {
        return $this->hasOne('App\Project\ProjectType', 'id', 'type_id');
    }
}
