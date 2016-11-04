<?php

namespace App\Http\Controllers\Todo;

use App\Project\Project;
use App\Repositories\TodoRepository;
use App\Todo\TodoList;
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
     * 构造器
     * 通过DI注入资源库
     *
     * TodoController constructor.
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
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
        }else{
            $type = null;
        }

        if($type != null){
            $prefix = "todo/type/$type";
        }else{
            $prefix = 'todo';
        }

        return view('todo.index', $this->todoRepository->TodoResources($project, $type, $list, $status, Definer::TODO_PAGE_SIZE, $request->user()))
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
}
