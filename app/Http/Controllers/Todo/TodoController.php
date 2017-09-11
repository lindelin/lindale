<?php

namespace App\Http\Controllers\Todo;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\Contracts\Repositories\TodoRepositoryContract;
use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use Illuminate\Http\Request;
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
     * 项目资源库.
     * @var ProjectRepositoryContract
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI注入资源库.
     *
     * TodoController constructor.
     * @param TodoRepositoryContract $todoRepository
     * @param ProjectRepositoryContract $projectRepository
     */
    public function __construct(TodoRepositoryContract $todoRepository, ProjectRepositoryContract $projectRepository)
    {
        $this->todoRepository = $todoRepository;
        $this->projectRepository = $projectRepository;
    }

    /**
     * Index.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        if ($request->route('status')) {
            $status = $request->route('status');
        } else {
            $status = null;
        }

        if ($request->route('list')) {
            $list = TodoList::findOrFail($request->route('list'));
            $this->authorize('user', [$list]);
        } else {
            $list = null;
        }

        if ($request->route('project')) {
            $project = $request->route('project');
        } else {
            $project = null;
        }

        if ($request->route('type')) {
            $type = $request->route('type');
            $type = TodoType::findOrFail($type);
        } else {
            $type = null;
        }

        if ($type != null) {
            $prefix = "todo/type/$type->id";
        } else {
            $prefix = 'todo';
        }

        return view('todo.index')
            ->with($this->todoRepository->todoResources($project, $type, $list, $status, config('todo.page-size'), $request->user()))
            ->with($this->projectRepository->UserProjects($request->user()))
            ->with(['prefix' => $prefix, 'type' => $type]);
    }

    /**
     * 更新To-do.
     *
     * @param TodoRequest $request
     * @param To-do $todo
     * @return mixed
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('user', [$todo]);

        return response()->update($this->todoRepository->updateTodo($request, $todo)->update());
    }

    /**
     * 创建To-do.
     *
     * @param TodoRequest $request
     * @return mixed
     */
    public function store(TodoRequest $request)
    {
        return response()->save($this->todoRepository->createTodo($request)->save());
    }

    /**
     * 删除To-do.
     * @param To-do $todo
     * @return mixed
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('user', [$todo]);

        return response()->delete($todo->delete());
    }
}
