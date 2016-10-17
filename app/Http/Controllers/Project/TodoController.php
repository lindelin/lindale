<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\TodoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index(Project $project)
    {
        return view('project.todo.index', $this->todoRepository->TodoResources($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'content' => 'required|max:100',
        ]);

        $result = $this->todoRepository->CreateTodo($request,$project)->save();

        if ($result) {
            return redirect()->to("project/$project->id/todo")->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    public function show(Project $project, $list)
    {
        return view('project.todo.index', $this->todoRepository->TodoListResources($project, $list))
            ->with(['project' => $project, 'selected' => 'todo']);
    }
}
