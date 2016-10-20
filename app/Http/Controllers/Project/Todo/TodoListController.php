<?php

namespace App\Http\Controllers\Project\Todo;

use App\Http\Requests\TypeRequest;
use App\Project\Project;
use App\Todo\TodoList;
use Illuminate\Http\Request;
use App\Repositories\TodoRepository;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;

class TodoListController extends Controller
{
    protected $todoRepository;
    protected $memberRepository;

    public function __construct(TodoRepository $todoRepository, MemberRepository $memberRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->memberRepository = $memberRepository;
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
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    public function destroy(Project $project, $list)
    {
        $list = TodoList::findOrFail($list);

        if ($list->delete()) {
            return redirect()->to("project/$project->id/todo/")->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
