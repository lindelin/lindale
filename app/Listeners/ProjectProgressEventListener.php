<?php

namespace App\Listeners;

use Calculator;
use App\Project\Project;
use App\Repositories\ProjectRepository;

class ProjectProgressEventListener
{
    /**
     * 项目资源库.
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * 创建事件订�
     * �
     * 实例.
     *
     * ProjectProgressEventListener constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * 处理To-do更新事件.
     *
     * @param $event
     */
    public function onTodoUpdated($event)
    {
        $project = Project::find($event->todo->project_id);

        if ($project != null and (int) $event->todo->type_id !== config('todo.private')) {
            $this->ProjectProgressUpdate($project);
        }
    }

    /**
     * 处理Task更新事件.
     *
     * @param $event
     */
    public function onTaskUpdated($event)
    {
        $project = Project::find($event->task->project_id);

        if ($project != null) {
            $this->ProjectProgressUpdate($project);
        }
    }

    /**
     * 处理项目进度�
     * �联事件（项目进度更新方法）.
     *
     * @param Project $project
     */
    private function ProjectProgressUpdate(Project $project)
    {
        $progress = Calculator::ProjectProgressCompute($project);
        $this->projectRepository->UpdateProjectProgress($progress, $project);
    }

    /**
     * 为订�
     * �
     * 注册监听器。
     *
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Todo\TodoCreated',
            'App\Listeners\ProjectProgressEventListener@onTodoUpdated'
        );
        $events->listen(
            'App\Events\Todo\TodoUpdated',
            'App\Listeners\ProjectProgressEventListener@onTodoUpdated'
        );
        $events->listen(
            'App\Events\Todo\TodoDeleted',
            'App\Listeners\ProjectProgressEventListener@onTodoUpdated'
        );

        $events->listen(
            'App\Events\Task\TaskCreated',
            'App\Listeners\ProjectProgressEventListener@onTaskUpdated'
        );
        $events->listen(
            'App\Events\Task\TaskUpdated',
            'App\Listeners\ProjectProgressEventListener@onTaskUpdated'
        );
        $events->listen(
            'App\Events\Task\TaskDeleted',
            'App\Listeners\ProjectProgressEventListener@onTaskUpdated'
        );
    }
}
