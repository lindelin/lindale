<?php

namespace App\Listeners;

use App\Definer;
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
     * 创建事件订阅者实例.
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

        if($project != null and (int)$event->todo->type_id !== Definer::PRIVATE_TODO){
            $this->ProjectProgressUpdate($project);
        }
    }

    /**
     * 处理项目进度关联事件（项目进度更新方法）.
     *
     * @param Project $project
     */
    private function ProjectProgressUpdate(Project $project)
    {
        if ($project->Todos()->count() > 0) {
            $progress = (int) ($project->Todos()
                    ->where('type_id', Definer::PUBLIC_TODO)
                    ->where('status_id', Definer::FINISH_STATUS_ID)->count() / $project->Todos()
                    ->where('type_id', Definer::PUBLIC_TODO)
                    ->count() * 100);
            $this->projectRepository->UpdateProjectProgress($progress, $project);
        } else {
            $progress = 0;
            $this->projectRepository->UpdateProjectProgress($progress, $project);
        }
    }

    /**
     * 为订阅者注册监听器。
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

        /*$events->listen(
            'App\Events\UserLoggedOut',
            'App\Listeners\UserEventListener@ProjectProgressUpdate'
        );*/
    }
}
