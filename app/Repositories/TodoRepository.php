<?php

namespace App\Repositories;

use App\Definer;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\TypeRequest;
use App\Project\Project;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoStatus;

class TodoRepository
{
    /**
     * 获取项目To-do资源.
     *
     * @param Project $project
     * @param $type
     * @param TodoList|null $list
     * @param null $status
     * @param int $size
     * @return array
     */
    public function TodoResources(Project $project, $type, TodoList $list = null, $status = null, $size = Definer::TODO_PAGE_SIZE)
    {
        $todos = $project->Todos();

        if ($type === Definer::PUBLIC_TODO) {
            $todos = $todos->where('type_id', $type);
            $todoCount = $todos->count();
        }

        if ($type === Definer::PRIVATE_TODO) {
            $todos = $todos->where('type_id', $type)->orderBy('status_id', 'desc')->oldest()->paginate(10);
            $todoCount = $todos->count();
        }

        if ($list != null) {
            $todos = $todos->where('list_id', $list->id);
        }

        if ($status != null) {
            $todos = $todos->where('status_id', $status);
        }

        $todos = $todos->orderBy('status_id', 'desc')->oldest()->paginate($size);

        $lists = $project->TodoLists()->get();
        $statuses = TodoStatus::where('user_id', Definer::SUPER_ADMIN_ID)->get();

        return compact('todos', 'todoCount', 'lists', 'statuses');
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
     * @param Project $project
     * @param Todo $todo
     * @return Todo
     */
    public function UpdateTodo(TodoRequest $request, Project $project, Todo $todo)
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
     * @param Project $project
     * @return TodoList
     */
    public function CreateTodoList(TypeRequest $request, Project $project)
    {
        $todoList = new TodoList();

        $todoList->title = $request->get('type_name');
        $todoList->project_id = $project->id;
        $todoList->type_id = Definer::PUBLIC_TODO;

        return $todoList;
    }
}
