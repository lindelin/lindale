<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\MemberRepositoryContract;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Events\Todo\TodoCreated;
use App\Events\Todo\TodoDeleted;
use App\Events\Todo\TodoUpdated;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\TodoRepository;

class TodoController extends Controller
{
    /**
     * To-do资源库.
     * @var TodoRepository
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
     * @param TodoRepository $todoRepository
     * @param MemberRepositoryContract $memberRepository
     */
    public function __construct(TodoRepository $todoRepository, MemberRepositoryContract $memberRepository)
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

        return view('project.todo.index', $this->todoRepository->TodoResources($project, $type, null, $status))
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
        $todo = $this->todoRepository->CreateTodo($request, $project);

        $this->authorize('create', [$todo, $project]);

        $result = $todo->save();

        event(new TodoCreated($todo, $request->user()));

        return response()->save($result);
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

        return view('project.todo.index', $this->todoRepository->TodoResources($project, $type, $list))
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

        $result = $this->todoRepository->UpdateTodo($request, $todo)->update();

        event(new TodoUpdated($todo, $request->user()));

        return response()->update($result);
    }

    /**
     * 删除To-do.
     *
     * @param Project $project
     * @param Todo $todo
     * @param Request $request
     * @return mixed
     */
    public function destroy(Project $project, Todo $todo, Request $request)
    {
        $this->authorize('delete', [$todo, $project]);

        $result = $todo->delete();

        event(new TodoDeleted($todo, $request->user()));

        return response()->delete($result);
    }
}
