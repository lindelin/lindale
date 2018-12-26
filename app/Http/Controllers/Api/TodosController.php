<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\TodoRepositoryContract;
use App\Exceptions\Todo\TodoUpdateApiException;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\MyTodoCollection;
use App\Http\Resources\Todo\Status;
use App\Http\Resources\UserResource;
use App\Todo\Todo;
use App\Todo\TodoStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodosController extends Controller
{
    /**
     * To-do资源库.
     * @var TodoRepositoryContract
     */
    protected $todoRepository;

    /**
     * 构造器
     * 通过DI注入资源库.
     *
     * TodoController constructor.
     * @param TodoRepositoryContract $todoRepository
     */
    public function __construct(TodoRepositoryContract $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * My Todos
     * @param Request $request
     * @return MyTodoCollection
     */
    public function myTodoCollection(Request $request)
    {
        return new MyTodoCollection($request->user()->Todos()
            ->with([
                'Initiator',
                'Type',
                'Status',
                'Project',
                'TodoList',
                'User',
            ])
            ->where('type_id', config('todo.public'))
            ->orderBy('status_id', 'desc')
            ->latest('updated_at')
            ->paginate(50));
    }

    /**
     * 編集資源
     * @return \Illuminate\Http\JsonResponse
     */
    public function editResource(Todo $todo)
    {
        $users = $this->todoRepository->projectUsers($todo);
        return response()->json([
            'statuses' => Status::collection(TodoStatus::all()),
            'users' =>  $users ? UserResource::collection($users) : null
        ], 200);
    }

    /**
     * Color 変更API
     * @param Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function changeColor(Request $request, Todo $todo)
    {
        $this->authorize('update', [$todo]);

        $this->validate($request, [
            'color_id' => 'required|integer',
        ]);

        $todo->color_id = $request->input('color_id');
        $todo->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * 完了API
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws TodoUpdateApiException
     */
    public function updateToFinished(Todo $todo)
    {
        $this->authorize('update', [$todo]);

        if ($todo->status_id == config('todo.status.finished')) {
            TodoUpdateApiException::hasFinished();
        }

        $todo->status_id = config('todo.status.finished');
        $todo->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * 更新API
     * @param TodoRequest $request
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('update', [$todo]);

        $this->todoRepository->updateTodo($request, $todo)->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * 削除API
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('delete', [$todo]);

        $todo->delete();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.delete-succeed')], 200);
    }
}
