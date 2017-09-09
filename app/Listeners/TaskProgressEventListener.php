<?php

namespace App\Listeners;

use App\Contracts\Repositories\TaskRepositoryContract;
use Calculator;
use App\Task\Task;
use App\Events\Task\TaskUpdated;

class TaskProgressEventListener
{
    /**
     * 任务资源库.
     * @var TaskRepositoryContract
     */
    protected $taskRepository;

    /**
     * 创建事件监听器.
     *
     * TaskProgressUpdate constructor.
     * @param TaskRepositoryContract $taskRepository
     */
    public function __construct(TaskRepositoryContract $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * 处理附属任务更新事件.
     *
     * @param $event
     */
    public function onSubTaskUpdated($event)
    {
        $this->TaskProgressUpdate($event->subTask->Task);
        event(new TaskUpdated($event->subTask->Task, $event->user));
    }

    /**
     * 处理任务进度关联事件（任务进度更新方法）.
     *
     * @param Task $task
     */
    private function TaskProgressUpdate(Task $task)
    {
        $progress = Calculator::TaskProgressCompute($task);

        $this->taskRepository->UpdateTaskProgress($progress, $task);
    }

    /**
     * 为订阅者注册监听器。
     *
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Task\SubTask\SubTaskCreated',
            'App\Listeners\TaskProgressEventListener@onSubTaskUpdated'
        );
        $events->listen(
            'App\Events\Task\SubTask\SubTaskUpdated',
            'App\Listeners\TaskProgressEventListener@onSubTaskUpdated'
        );
        $events->listen(
            'App\Events\Task\SubTask\SubTaskDeleted',
            'App\Listeners\TaskProgressEventListener@onSubTaskUpdated'
        );
    }
}
