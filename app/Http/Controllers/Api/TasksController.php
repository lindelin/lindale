<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MyTaskCollection;
use App\Http\Resources\TaskResource;
use App\Task\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
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
}
