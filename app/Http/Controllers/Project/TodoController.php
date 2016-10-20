<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\MemberRepository;
use App\Repositories\TodoRepository;
use App\Todo\Todo;
use Illuminate\Http\Request;
use App\Todo\TodoList;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    protected $todoRepository;
    protected $memberRepository;

    public function __construct(TodoRepository $todoRepository, MemberRepository $memberRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->memberRepository = $memberRepository;
    }

    public function index(Project $project)
    {
        return view('project.todo.index', $this->todoRepository->TodoResources($project))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'content' => 'required|max:100',
        ]);

        $result = $this->todoRepository->CreateTodo($request,$project)->save();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    public function show(Project $project, $list)
    {
        $list = TodoList::findOrFail($list);

        return view('project.todo.index', $this->todoRepository->TodoListResources($project, $list))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    public function update(Request $request, Project $project, Todo $todo)
    {
        $result = $this->todoRepository->UpdateTodo($request, $project, $todo)->update();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    public function destroy(Project $project, Todo $todo)
    {
        if ($todo->delete()) {
            return redirect()->back()->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
