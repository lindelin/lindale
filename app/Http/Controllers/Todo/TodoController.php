<?php

namespace App\Http\Controllers\Todo;

use App\Project\Project;
use App\Repositories\ProjectRepository;
use App\Repositories\TodoRepository;
use App\Todo\TodoList;
use App\Todo\TodoType;
use Illuminate\Http\Request;
use App\Definer;
use App\Http\Requests\TodoRequest;
use App\Http\Controllers\Controller;
use App\Todo\Todo;
use App\Events\TodoUpdated;

class TodoController extends Controller
{
    /**
     * To-do资源库
     *
     * @var
     */
    protected $todoRepository;

    /**
     * 项目资源库
     *
     * @var
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI注入资源库
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
     * @return $this
     */
    public function index(Request $request)
    {
        if($request->route('status')){
            $status = $request->route('status');
        }else{
            $status = null;
        }

        if($request->route('list')){
            $list = TodoList::findOrFail($request->route('list'));
            $this->authorize('user', [$list]);
        }else{
            $list = null;
        }

        if($request->route('project')){
            $project = $request->route('project');
        }else{
            $project = null;
        }

        if($request->route('type')){
            $type = $request->route('type');
            $type = TodoType::findOrFail($type);
        }else{
            $type = null;
        }

        if($type != null){
            $prefix = "todo/type/$type->id";
        }else{
            $prefix = 'todo';
        }

        return view('todo.index')
            ->with($this->todoRepository->TodoResources($project, $type, $list, $status, Definer::TODO_PAGE_SIZE, $request->user()))
            ->with($this->projectRepository->UserProjects($request->user()))
            ->with(['prefix' => $prefix, 'type' => $type]);
    }

    /**
     * 更新To-do.
     *
     * @param TodoRequest $request
     * @param Todo $todo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('user', [$todo]);

        $result = $this->todoRepository->UpdateTodo($request, $todo)->update();

        if ($result) {

            event(new TodoUpdated($todo));

            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 创建To-do.
     *
     * @param TodoRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TodoRequest $request)
    {
        $todo = $this->todoRepository->CreateTodo($request);
        $result = $todo->save();

        if ($result) {

            event(new TodoUpdated($todo));

            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 删除To-do.
     *
     * @param Todo $todo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('user', [$todo]);

        if ($todo->delete()) {

            event(new TodoUpdated($todo));

            return redirect()->back()->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
