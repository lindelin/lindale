<?php

namespace App\Wiki;

use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function Type()
    {
        return $this->hasOne('App\Wiki\WikiType', 'id', 'type_id');
    }
}
