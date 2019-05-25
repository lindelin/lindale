<?php


namespace App\Models\Relations\BelongsToMany;


use App\Models\Project;

trait BelongsToProjects
{
    /**
     * 多个用户拥有多个项目
     * 多对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)->withPivot('is_admin')->withTimestamps();
    }
}