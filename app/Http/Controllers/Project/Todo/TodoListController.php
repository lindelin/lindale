<?php

namespace App\Http\Controllers\Project\Todo;

use App\Http\Requests\TypeRequest;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Repositories\TodoRepository;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function create(Project $project)
    {
        return view('project.todo.index', $this->todoRepository->TodoResources($project))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo', 'add_todo_list' => 'on']);
    }

    public function store(Project $project, TypeRequest $request)
    {
        $result = $this->todoRepository->CreateTodoList($request, $project)->save();

        if ($result) {
            return redirect()->to("project/$project->id/todo")->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }
}
