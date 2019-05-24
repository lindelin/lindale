<?php


namespace App\Models\Relations\HasOne;


use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasOneLeader
{
    /**
     * 一个项目只有一个项目总监
     * 一对一
     *
     * @return HasOne
     */
    public function pl()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一个项目只有一个项目副总监
     * 一对一
     *
     * @return HasOne
     */
    public function sl()
    {
        return $this->hasOne('App\User', 'id', 'sl_id');
    }
}