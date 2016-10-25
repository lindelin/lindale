<?php

namespace App\Todo;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * 一个To-do有一个负责人
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    /**
     * 一个To-do属于一个类型
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Type()
    {
        return $this->hasOne('App\Todo\TodoType', 'id', 'type_id');
    }

    /**
     * 一个To-do属于一个列表
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function TodoList()
    {
        return $this->hasOne('App\Todo\TodoList', 'id', 'list_id');
    }

    /**
     * 一个To-do有一个状态
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Status()
    {
        return $this->hasOne('App\Todo\TodoStatus', 'id', 'status_id');
    }

    /**
     * 一个To-do属于一个项目
     * 一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Project()
    {
        return $this->hasOne('App\Project\Project', 'id', 'project_id');
    }
}
