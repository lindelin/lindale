<?php

namespace App\Http\Controllers\Project\Todo;

use App\Contracts\Repositories\MemberRepositoryContract;
use App\Contracts\Repositories\TodoRepositoryContract;
use App\Todo\TodoList;
use App\Todo\TodoType;
use App\Project\Project;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{
    /**
     * To-do资源库.
     * @var TodoRepositoryContract
     */
    protected $todoRepository;

    /**
     * 项目成员资源库.
     * @var MemberRepositoryContract
     */
    protected $memberRepository;

    /**
     * 构造器
     * 通过DI注入资源库.
     *
     * TodoListController constructor.
     * @param TodoRepositoryContract $todoRepository
     * @param MemberRepositoryContract $memberRepository
     */
    public function __construct(TodoRepositoryContract $todoRepository, MemberRepositoryContract $memberRepository)
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
        $type = TodoType::findOrFail(config('todo.public'));

        return view('project.todo.index', $this->todoRepository->todoResources($project, $type))
            ->with($this->memberRepository->allMember($project))
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
        $list = $this->todoRepository->createTodoList($request, $project);

        $this->authorize('create', [$list, $project]);

        return response()->save($list->save());
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
