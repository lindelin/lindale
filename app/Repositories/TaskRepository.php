<?php

namespace App\Repositories;


use App\Definer;
use App\Http\Requests\TaskGroupRequest;
use App\Project\Project;
use App\Task\TaskGroup;
use App\Task\TaskStatus;
use App\Task\TaskType;

class TaskRepository
{
    /**
     * 任务组资源
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupResources(Project $project)
    {
        $groups = $project->TaskGroups;
        $resources = $this->TaskGroupCreateResources($project);
        $statuses = $resources['statuses'];
        $types = $resources['types'];

        return compact('groups', 'statuses', 'types');
    }

    /**
     * 任务组（创建）资源
     *
     * @param Project $project
     * @return array
     */
    public function TaskGroupCreateResources(Project $project)
    {
        $type = TaskType::firstOrCreate(
            [
                'project_id' => $project->id
            ],
            [
                'name' => 'task.default',
                'color_id' => Definer::DEFAULT_COLOR_ID
            ]);
        if($type != null){
            $types = $project->TaskTypes;
        }

        $status = TaskStatus::firstOrCreate(
            [
                'project_id' => $project->id
            ],
            [
                'name' => 'task.underway',
                'color_id' => Definer::PRIMARY_COLOR_ID,
                'action_id' => Definer::UNDERWAY_STATUS_ID
            ]);
        if($status != null){
            $statuses = $project->TaskStatuses;
        }

        return compact('types', 'statuses');
    }

    /**
     * 创建任务组方法
     *
     * @param TaskGroupRequest $request
     * @param Project $project
     * @return TaskGroup
     */
    public function CreateGroup(TaskGroupRequest $request, Project $project)
    {
        $group = new TaskGroup();

        $input = $request->only(['title', 'information', 'type_id', 'status_id', 'start_at', 'end_at', 'color_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $group->$key = $value;
        }

        $group->project_id = $project->id;

        return $group;
    }
}