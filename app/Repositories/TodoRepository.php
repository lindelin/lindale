<?php

namespace App\Repositories;

use App\Contracts\Repositories\TodoRepositoryContract;
use App\User;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use App\Project\Project;
use App\Todo\TodoStatus;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\TypeRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoRepository implements TodoRepositoryContract
{
    use AuthorizesRequests;
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
    public function todoResources(Project $project = null, TodoType $type = null, TodoList $list = null, $status = null, $size = null, User $user = null)
    {
        $size = config('todo.page-size');

        $todos = null;

        if ($project == null and $user == null) {
            abort(404);
        }

        if ($project != null) {
            $todos = $project->Todos();
        }

        if ($user != null) {
            $todos = $user->Todos();
        }

        if ($type != null) {
            if ((int) $type->id === config('todo.public')) {
                $todos = $todos->where('type_id', $type->id);
            }

            if ((int) $type->id === config('todo.private')) {
                $todos = $todos->where('type_id', $type->id);
            }
        }

        if ($list != null) {
            $todos = $todos->where('list_id', $list->id);
        }

        if ($status != null) {
            $todos = $todos->where('status_id', $status);
        }

        if ($project != null) {
            $lists = $project->TodoLists()->where('type_id', config('todo.public'))->get();
        }

        if ($user != null) {
            $lists = $user->TodoLists()->where('type_id', config('todo.private'))->get();
        }

        if ($user != null and $type != null) {
            if ((int) $type->id === config('todo.public')) {
                $projects = $this->userTodoProjects($user);
                if ($project != null) {
                    $todos = $todos->where('project_id', $project->id);
                }
            }
        }

        $todos = $todos->orderBy('status_id', 'desc')->latest('updated_at')->paginate($size);

        $statuses = TodoStatus::where('user_id', config('admin.super_admin.id'))->get();

        return compact('todos', 'lists', 'statuses', 'projects');
    }

    /**
     * 创建To-do方法.
     *
     * @param TodoRequest $request
     * @param Project|null $project
     * @return Todo
     */
    public function createTodo($request, Project $project = null)
    {
        $todo = new Todo();

        $input = $request->all(['content', 'details', 'user_id', 'list_id', 'type_id', 'project_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $todo->$key = $value;
        }

        if ($project !== null) {
            $todo->type_id = config('todo.public');
            $todo->project_id = $project->id;
            $this->authorize('create', [$todo, $project]);
        } else {
            $todo->user_id = $request->user()->id;
        }

        $todo->color_id = $request->input('color_id', 1);
        $todo->status_id = config('todo.status.underway');
        $todo->initiator_id = $request->user()->id;

        return $todo;
    }

    /**
     * 更新To-do方法.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return Todo
     */
    public function updateTodo($request, Todo $todo)
    {
        $input = $request->all(['content', 'details', 'user_id', 'color_id', 'list_id', 'status_id']);

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
    public function createTodoList($request, Project $project = null, User $user = null)
    {
        $todoList = new TodoList();

        $todoList->title = $request->get('type_name');

        if ($project !== null) {
            $todoList->project_id = $project->id;
            $todoList->type_id = config('todo.public');
        }

        if ($user !== null) {
            $todoList->user_id = $user->id;
            $todoList->type_id = config('todo.private');
        }

        return $todoList;
    }

    /**
     * 获取用户To-do对应的项目列表.
     *
     * @param User $user
     * @return array
     */
    private function userTodoProjects(User $user)
    {
        $projects = [];
        $todos = $user->Todos()->get();
        foreach ($todos as $todo) {
            $todoProjects = $todo->Project()->get();
            foreach ($todoProjects as $project) {
                if (isset($projects[$project->id]) != $project) {
                    $projects[$project->id] = $project;
                }
            }
        }

        return $projects;
    }

    /**
     * Todo からプロジェクトのユーザを取得
     * @param Todo $todo
     * @return mixed
     */
    public function projectUsers(Todo $todo)
    {
        $users = null;
        $project = $todo->Project;

        if ($project) {
            $users = $project->Users;

            if ($project->ProjectLeader) {
                $users->push($project->ProjectLeader);
            }

            if ($project->SubLeader) {
                $users->push($project->SubLeader);
            }
        }

        return $users;
    }
}
