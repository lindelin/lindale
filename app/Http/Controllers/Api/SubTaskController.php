<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Exceptions\Task\TaskUpdateApiException;
use App\Task\SubTask;
use App\Task\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTaskController extends Controller
{
    /**
     * 任务资源库.
     * @var TaskRepositoryContract
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepositoryContract $taskRepository
     */
    public function __construct(TaskRepositoryContract $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * SubTask 更新
     * @param Request $request
     * @param SubTask $subTask
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, SubTask $subTask)
    {
        $this->authorize('show', [$subTask->Task]);

        if ($subTask->Task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $this->validate($request, [
            'is_finish' => 'required|boolean',
        ]);

        $subTask->is_finish = $request->input('is_finish');
        $subTask->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * サブチケット追加
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Task $task)
    {
        $this->authorize('show', [$task]);

        if ($task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $this->validate($request, ['contents.*' => 'required']);

        $this->taskRepository->createSubTask($request, $task);

        return response()->json(['status' => 'OK', 'messages' => trans('errors.add-succeed')], 200);
    }

    /**
     * 削除API
     * @param SubTask $subTask
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(SubTask $subTask)
    {
        $this->authorize('show', [$subTask->Task]);

        if ($subTask->Task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $subTask->delete();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.delete-succeed')], 200);
    }
}
