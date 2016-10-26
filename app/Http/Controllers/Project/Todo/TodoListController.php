<?php

namespace App\Http\Controllers\Project\Todo;

use App\Http\Requests\TypeRequest;
use App\Project\Project;
use App\Todo\TodoList;
use App\Repositories\TodoRepository;
use App\Http\Controllers\Controller;
use App\Repositories\MemberRepository;
use App\Definer;

class TodoListController extends Controller
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
     * TodoListController constructor.
     * @param TodoRepository $todoRepository
     * @param MemberRepository $memberRepository
     */
    public function __construct(TodoRepository $todoRepository, MemberRepository $memberRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * 显示创建To-do列表表单.
     *
     * @param Project $project
     * @return mixed
     */
    public function create(Project $project)
    {
        return view('project.todo.index', $this->todoRepository->TodoResources($project, Definer::PUBLIC_TODO))
            ->with($this->memberRepository->AllMember($project))
            ->with(['project' => $project, 'selected' => 'todo', 'add_todo_list' => 'on']);
    }

    /**
     * 创建To-do列表.
     *
     * @param Project $project
     * @param TypeRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Project $project, TypeRequest $request)
    {
        $result = $this->todoRepository->CreateTodoList($request, $project)->save();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 删除To-do列表.
     *
     * @param Project $project
     * @param $list
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, $list)
    {
        $list = TodoList::findOrFail($list);

        $this->authorize('delete', [$list, $project]);

        if ($list->delete()) {
            return redirect()->to("project/$project->id/todo/")->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
