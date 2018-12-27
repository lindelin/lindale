<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Exceptions\Task\TaskUpdateApiException;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\MyTaskCollection;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Task\Task;
use App\Task\TaskGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
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
     * My Tasks
     * @param Request $request
     * @return MyTaskCollection
     */
    public function myTaskCollection(Request $request)
    {
        return new MyTaskCollection($request->user()->Tasks()
            ->with([
                'Type',
                'Status',
                'Group',
                'Priority',
                'Project',
                'Initiator',
                'User',
            ])
            ->orderBy('is_finish', 'asc')
            ->latest()
            ->orderBy('priority_id', 'desc')
            ->paginate(30));
    }

    /**
     * Group's Tasks
     * @param TaskGroup $taskGroup
     * @return MyTaskCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function groupTaskCollection(TaskGroup $taskGroup)
    {
        $this->authorize('is_member', [$taskGroup->Project]);

        return new MyTaskCollection($taskGroup->Tasks()
            ->with([
                'Type',
                'Status',
                'Group',
                'Priority',
                'Project',
                'Initiator',
                'User',
            ])
            ->orderBy('is_finish', 'asc')
            ->latest()
            ->orderBy('priority_id', 'desc')
            ->paginate(30));
    }

    /**
     * Task Resource
     * @param Task $task
     * @return TaskResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function taskResource(Task $task)
    {
        $this->authorize('show', [$task]);

        $task->load([
            'Type',
            'Status',
            'Group',
            'Priority',
            'Project',
            'Initiator',
            'User',
            'SubTasks',
            'Activities' => function ($query) {
                $query->latest();
                $query->with(['User']);
            }
            ]);

        return new TaskResource($task);
    }

    /**
     * 編集資源
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function editResource(Task $task)
    {
        $this->authorize('show', [$task]);
        $project = $task->Project;
        $users = $project->Users;

        if ($project->ProjectLeader) {
            $users->push($project->ProjectLeader);
        }

        if ($project->SubLeader) {
            $users->push($project->SubLeader);
        }

        return response()->json([
            'users' => UserResource::collection($users)
        ], 200);
    }

    /**
     * チケットを完了
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function completeTask(Request $request, Task $task)
    {
        $this->authorize('show', [$task]);

        $this->validate($request, [
            'is_finish' => 'required|boolean',
        ]);

        if ($task->is_finish === config('task.finished') and (int)$request->input('is_finish') === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        if ($task->progress !== 100) {
            TaskUpdateApiException::canNotEdit();
        }

        if ((int)$task->user_id === 0) {
            TaskUpdateApiException::canNotFinishNoneUserTask();
        }

        $task->is_finish = $request->input('is_finish');
        $task->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * 更新API
     * @param TaskRequest $request
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('show', [$task]);

        if ($task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $this->taskRepository->UpdateTask($request, $task)->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * チケット削除
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws TaskUpdateApiException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Task $task)
    {
        $this->authorize('show', [$task]);

        if ($task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $task->delete();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.delete-succeed')], 200);
    }
}
