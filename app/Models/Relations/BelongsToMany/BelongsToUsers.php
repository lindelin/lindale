<?php


namespace App\Models\Relations\BelongsToMany;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToUsers
{
    /**
     * 多个项目属于过个用户
     * 多对多.
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_admin')->withTimestamps();
    }
}