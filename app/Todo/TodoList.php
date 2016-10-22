<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    /**
     * 一个To-do列表有多个To-do
     * 一对多.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Todos()
    {
        return $this->hasMany('App\Todo\Todo', 'list_id', 'id');
    }
}
