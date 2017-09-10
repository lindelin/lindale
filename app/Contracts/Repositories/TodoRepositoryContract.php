<?php

namespace App\Contracts\Repositories;


use App\Project\Project;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use App\User;

interface TodoRepositoryContract
{
    /**
     * 获取项目To-do资源.
     * @param Project|null $project
     * @param TodoType|null $type
     * @param TodoList|null $list
     * @param null $status
     * @param null $size
     * @param User|null $user
     * @return mixed
     */
    public function todoResources(Project $project = null, TodoType $type = null, TodoList $list = null, $status = null, $size = null, User $user = null);

    /**
     * 创建To-do方法.
     * @param $request
     * @param Project|null $project
     * @return mixed
     */
    public function createTodo($request, Project $project = null);

    /**
     * 更新To-do方法.
     * @param $request
     * @param To-do $todo
     * @return mixed
     */
    public function updateTodo($request, Todo $todo);

    /**
     * 创建To-do列表方法.
     * @param $request
     * @param Project|null $project
     * @param User|null $user
     * @return mixed
     */
    public function createTodoList($request, Project $project = null, User $user = null);
}