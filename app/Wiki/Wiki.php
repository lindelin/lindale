<?php

namespace App\Wiki;

use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    /**
     * 一篇WIKI只有一个作者
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一篇WIKI只有一个索引
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Wiki\WikiType', 'id', 'type_id');
    }
}
