<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\MemberRepositoryContract;
use App\Contracts\Repositories\TodoRepositoryContract;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use App\Project\Project;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;

class TodoController extends Controller
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
     * TodoController constructor.
     * @param TodoRepositoryContract $todoRepository
     * @param MemberRepositoryContract $memberRepository
     */
    public function __construct(TodoRepositoryContract $todoRepository, MemberRepositoryContract $memberRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Index.
     *
     * @param Project $project
     * @param null $status
     * @return mixed
     */
    public function index(Project $project, $status = null)
    {
        $type = TodoType::find(config('todo.public'));

        return view('project.todo.index', $this->todoRepository->todoResources($project, $type, null, $status))
            ->with($this->memberRepository->allMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    /**
     * 创建To-do.
     *
     * @param TodoRequest $request
     * @param Project $project
     * @return mixed
     */
    public function store(TodoRequest $request, Project $project)
    {
        $todo = $this->todoRepository->createTodo($request, $project);

        $this->authorize('create', [$todo, $project]);

        return response()->save($todo->save());
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
        $type = TodoType::find(config('todo.public'));

        return view('project.todo.index', $this->todoRepository->todoResources($project, $type, $list))
            ->with($this->memberRepository->allMember($project))
            ->with(['project' => $project, 'selected' => 'todo']);
    }

    /**
     * 更新To-do.
     *
     * @param TodoRequest $request
     * @param Project $project
     * @param Todo $todo
     * @return mixed
     */
    public function update(TodoRequest $request, Project $project, Todo $todo)
    {
        $this->authorize('update', [$todo, $project]);

        return response()->update($this->todoRepository->updateTodo($request, $todo)->update());
    }

    /**
     * 删除To-do.
     * @param Project $project
     * @param Todo $todo
     * @return mixed
     */
    public function destroy(Project $project, Todo $todo)
    {
        $this->authorize('delete', [$todo, $project]);

        return response()->delete($todo->delete());
    }
}
