<?php

namespace App\Http\Controllers\Todo;

use App\Repositories\TodoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Definer;
use App\Http\Requests\TypeRequest;
use App\Todo\TodoList;

class TodoListController extends Controller
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
     * 显示创建To-do列表表单.
     *
     * @param Request $request
     * @return $this
     */
    public function create(Request $request)
    {
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

        return view('todo.index', $this->todoRepository->TodoResources(null, $type, null, null, Definer::TODO_PAGE_SIZE, $request->user()))
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
        $result = $this->todoRepository->CreateTodoList($request, null, $request->user())->save();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
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

        if ($list->delete()) {
            return redirect()->back()->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
