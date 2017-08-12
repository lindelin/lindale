<?php

namespace App\Http\Controllers\Todo;

use App\Todo\Todo;
use App\Todo\TodoList;
use App\Todo\TodoType;
use Illuminate\Http\Request;
use App\Events\Todo\TodoCreated;
use App\Events\Todo\TodoDeleted;
use App\Events\Todo\TodoUpdated;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\TodoRepository;
use App\Repositories\ProjectRepository;

class TodoController extends Controller
{
    /**
     * To-do资源库.
     *
     * @var
     */
    protected $todoRepository;

    /**
     * 项目资源库.
     *
     * @var
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI注�
     * �资源库.
     *
     * TodoController constructor.
     * @param TodoRepository $todoRepository
     * @param ProjectRepository $projectRepository
     */
    public function __construct(TodoRepository $todoRepository, ProjectRepository $projectRepository)
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
            ->with($this->todoRepository->TodoResources($project, $type, $list, $status, config('todo.page-size'), $request->user()))
            ->with($this->projectRepository->UserProjects($request->user()))
            ->with(['prefix' => $prefix, 'type' => $type]);
    }

    /**
     * 更新To-do.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return mixed
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('user', [$todo]);

        $result = $this->todoRepository->UpdateTodo($request, $todo)->update();

        event(new TodoUpdated($todo, $request->user()));

        return response()->update($result);
    }

    /**
     * 创建To-do.
     *
     * @param TodoRequest $request
     * @return mixed
     */
    public function store(TodoRequest $request)
    {
        $todo = $this->todoRepository->CreateTodo($request);
        $result = $todo->save();

        event(new TodoCreated($todo, $request->user()));

        return response()->save($result);
    }

    /**
     * 删除To-do.
     *
     * @param Todo $todo
     * @param Request $request
     * @return mixed
     */
    public function destroy(Todo $todo, Request $request)
    {
        $this->authorize('user', [$todo]);

        $result = $todo->delete();

        event(new TodoDeleted($todo, $request->user()));

        return response()->delete($result);
    }
}
