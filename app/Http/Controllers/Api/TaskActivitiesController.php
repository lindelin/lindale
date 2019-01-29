<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Task\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskActivitiesController extends Controller
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
     * 追加API
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Task $task)
    {
        $this->authorize('show', [$task]);

        $this->validate($request, ['content' => 'required']);

        $this->taskRepository->CreateTaskActivity($request, $task)->save();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.add-succeed')], 200);
    }
}
