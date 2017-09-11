<?php

namespace App\Http\Controllers\Todo;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\Contracts\Repositories\TodoRepositoryContract;
use App\Todo\TodoList;
use App\Todo\TodoType;
use Illuminate\Http\Request;
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
     * 显示创建To-do列表表单.
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
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
            ->with($this->todoRepository->todoResources(null, $type, null, null, config('todo.page-size'), $request->user()))
            ->with($this->projectRepository->UserProjects($request->user()))
            ->with(['selected' => 'todo', 'add_todo_list' => 'on'])
            ->with(['prefix' => $prefix, 'type' => $type]);
    }

    /**
     * 创建To-do列表.
     *
     * @param TypeRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TypeRequest $request)
    {
        $result = $this->todoRepository->createTodoList($request, null, $request->user())->save();

        return response()->save($result);
    }

    /**
     * 删除To-do列表.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $list = $request->route('list');

        $list = TodoList::findOrFail($list);

        $this->authorize('user', [$list]);

        return response()->delete($list->delete());
    }
}
