<?php

namespace App\Repositories;

use App\Definer;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\TypeRequest;
use App\Project\Project;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoStatus;
use App\User;

class TodoRepository
{
    /**
     * 获取项目To-do资源.
     *
     * @param Project|null $project
     * @param $type
     * @param TodoList|null $list
     * @param null $status
     * @param int $size
     * @param User|null $user
     * @return array
     */
    public function TodoResources(Project $project = null, $type = null, TodoList $list = null, $status = null, $size = Definer::TODO_PAGE_SIZE, User $user = null)
    {
        $todos = null;

        if($project == null and $user == null){
            abort(404);
        }

        if($project != null){
            $todos = $project->Todos();
        }

        if($user != null){
            $todos = $user->Todos();
        }

        if ((int)$type === Definer::PUBLIC_TODO) {
            $todos = $todos->where('type_id', $type);
        }

        if ((int)$type === Definer::PRIVATE_TODO) {
            $todos = $todos->where('type_id', $type);
        }

        if ($list != null) {
            $todos = $todos->where('list_id', $list->id);
        }

        if ($status != null) {
            $todos = $todos->where('status_id', $status);
        }

        $todos = $todos->orderBy('status_id', 'desc')->oldest()->paginate($size);

        if($project != null){
            $lists = $project->TodoLists()->where('type_id', $type)->get();
        }

        if($user != null){
            $lists = $user->TodoLists()->where('type_id', $type)->get();
        }

        if($user != null and (int)$type === Definer::PUBLIC_TODO){
            $projects = $this->UserTodoProjects($user);
        }

        $statuses = TodoStatus::where('user_id', Definer::SUPER_ADMIN_ID)->get();

        return compact('todos', 'lists', 'statuses', 'projects');
    }

    /**
     * 创建To-do方法.
     *
     * @param TodoRequest $request
     * @param Project $project
     * @return Todo
     */
    public function CreateTodo(TodoRequest $request, Project $project)
    {
        $todo = new Todo();

        $input = $request->only(['content', 'user_id', 'color_id', 'list_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $todo->$key = $value;
        }

        $todo->type_id = Definer::PUBLIC_TODO;
        $todo->status_id = Definer::DEFAULT_STATUS_ID;
        $todo->project_id = $project->id;

        return $todo;
    }

    /**
     * 更新To-do方法.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return Todo
     */
    public function UpdateTodo(TodoRequest $request, Todo $todo)
    {
        $input = $request->only(['content', 'user_id', 'color_id', 'list_id', 'status_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $todo->$key = $value;
        }

        return $todo;
    }

    /**
     * 创建To-do列表方法.
     *
     * @param TypeRequest $request
     * @param Project|null $project
     * @param User|null $user
     * @return TodoList
     */
    public function CreateTodoList(TypeRequest $request, Project $project = null, User $user = null)
    {
        $todoList = new TodoList();

        $todoList->title = $request->get('type_name');

        if($project != null){
            $todoList->project_id = $project->id;
            $todoList->type_id = Definer::PUBLIC_TODO;
        }

        if($user != null){
            $todoList->user_id = $user->id;
            $todoList->type_id = Definer::PRIVATE_TODO;
        }

        return $todoList;
    }

    /**
     * 获取用户To-do对应的项目列表
     *
     * @param User $user
     * @return array
     */
    private function UserTodoProjects(User $user)
    {
        $projects = [];
        $todos = $user->Todos()->get();
        foreach ($todos as $todo){
            $todoProjects = $todo->Project()->get();
            foreach ($todoProjects as $project){
                if(isset($projects[$project->id]) != $project){
                    $projects[$project->id] = $project;
                }
            }
        }
        return $projects;
    }
}
