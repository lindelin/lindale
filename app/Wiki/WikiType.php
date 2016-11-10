<?php

namespace App\Wiki;

use Illuminate\Database\Eloquent\Model;

class WikiType extends Model
{
    /**
     * 一个索引有多篇WIKI.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Wikis()
    {
        return $this->hasMany('App\Wiki\Wiki', 'type_id', 'id');
    }
}
