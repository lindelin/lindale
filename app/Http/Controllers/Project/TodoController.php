<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\MemberRepository;
use App\Repositories\TodoRepository;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * To-do资源库.
     * @var TodoRepository
     */
    protected $todoRepository;
    /**
     * 项目成员资源库.
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * 构造器
     * 通过DI注入资源库.
     *
     * TodoController constructor.
     * @param TodoRepository $todoRepository
     * @param MemberRepository $memberRepository
     */
    public function __construct(TodoRepository $todoRepository, MemberRepository $memberRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Index.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.todo.index', $this->todoRepository->TodoResources($project))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    /**
     * 创建To-do.
     *
     * @param TodoRequest $request
     * @param Project $project
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TodoRequest $request, Project $project)
    {
        $result = $this->todoRepository->CreateTodo($request, $project)->save();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 展示To-do(列表).
     *
     * @param Project $project
     * @param $list
     * @return mixed
     */
    public function show(Project $project, $list)
    {
        $list = TodoList::findOrFail($list);

        return view('project.todo.index', $this->todoRepository->TodoListResources($project, $list))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    /**
     * 更新To-do.
     *
     * @param TodoRequest $request
     * @param Project $project
     * @param Todo $todo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(TodoRequest $request, Project $project, Todo $todo)
    {
        $this->authorize('update', [$todo, $project]);

        $result = $this->todoRepository->UpdateTodo($request, $project, $todo)->update();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 删除To-do.
     *
     * @param Project $project
     * @param Todo $todo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, Todo $todo)
    {
        $this->authorize('delete', [$todo, $project]);

        if ($todo->delete()) {
            return redirect()->back()->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
