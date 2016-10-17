<?php

namespace App\Repositories;


use App\Definer;
use App\Http\Requests\TypeRequest;
use App\Project\Project;
use App\Todo\Todo;
use App\Todo\TodoList;
use Illuminate\Http\Request;

class TodoRepository
{
    public function TodoResources(Project $project)
    {
        $todos = $project->Todos()->where('type_id', Definer::PUBLIC_TODO)->paginate(10);
        $allTodos = $project->Todos()->where('type_id', Definer::PUBLIC_TODO)->count();
        $lists = $project->TodoLists()->get();

        return compact('todos', 'allTodos', 'lists');
    }

    public function TodoListResources(Project $project, $list)
    {
        $todos = $project->Todos()->where('type_id', Definer::PUBLIC_TODO)->where('list_id', $list)->paginate(10);
        $allTodos = $project->Todos()->where('type_id', Definer::PUBLIC_TODO)->count();
        $lists = $project->TodoLists()->get();

        return compact('todos', 'allTodos', 'lists');
    }

    public function CreateTodo(Request $request, Project $project)
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

    public function CreateTodoList(TypeRequest $request, Project $project)
    {
        $todoList = new TodoList();

        $todoList->title = $request->get('type_name');
        $todoList->project_id = $project->id;
        $todoList->type_id = Definer::PUBLIC_TODO;

        return $todoList;
    }

}