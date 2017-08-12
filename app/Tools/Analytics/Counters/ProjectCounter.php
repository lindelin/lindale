<?php

namespace App\Tools\Analytics\Counters;

use App\Task\Task;
use App\Task\TaskType;
use App\Task\TaskGroup;
use App\Project\Project;
use App\Task\TaskStatus;
use App\Task\TaskPriority;

trait ProjectCounter
{
    /**
     * 课题总数.
     * @param Project $project
     * @return int
     */
    public function projectTotalCount(Project $project)
    {
        return (int) $this->ProjectTaskCount($project) + $this->ProjectTodoCount($project);
    }

    /**
     * 合计任务组�
     * 含的任务总数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskCount(TaskGroup $group)
    {
        return (int) $group->Tasks()->count();
    }

    /**
     * 合计任务组�
     * 含的已完成任务数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskFinishCount(TaskGroup $group)
    {
        return (int) $group->Tasks()
            ->where('is_finish', config('task.finished'))
            ->count();
    }

    /**
     * 合计任务组中未完成任务数.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function GroupTaskUnfinishedCount(TaskGroup $group)
    {
        return (int) $group->Tasks()
            ->where('is_finish', config('task.unfinished'))
            ->count();
    }

    /**
     * 合计项目中任务组数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskGroupCount(Project $project)
    {
        return (int) $project->TaskGroups()->count();
    }

    /**
     * 合计项目中的任务总数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskCount(Project $project)
    {
        return (int) $project->Tasks()->count();
    }

    /**
     * 合计项目中已完成任务数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskFinishedCount(Project $project)
    {
        return (int) $project->Tasks()
            ->where('is_finish', config('task.finished'))
            ->count();
    }

    /**
     * 合计项目中未完成任务数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskUnfinishedCount(Project $project)
    {
        return (int) $project->Tasks()
            ->where('is_finish', config('task.unfinished'))
            ->count();
    }

    /**
     * 合计项目中的任务数（类型别）.
     *
     * @param Project $project
     * @param TaskType $type
     * @param null $is_finish
     * @return int
     */
    public function ProjectTypeTaskCount(Project $project, TaskType $type, $is_finish = null)
    {
        $task = $project->Tasks()->where('type_id', $type->id);
        if ($is_finish !== null) {
            $task = $task->where('is_finish', $is_finish);
        }

        return (int) $task->count();
    }

    /**
     * 项目中完成�
     * 办数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTodoFinishedCount(Project $project)
    {
        return (int) $project
            ->todos()
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }

    /**
     * 项目中�
     * 办总数.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTodoCount(Project $project)
    {
        return (int) $project
            ->todos()
            ->where('type_id', config('todo.public'))
            ->count();
    }

    /**
     * 合计项目中的任务数（状态别）.
     *
     * @param Project $project
     * @param TaskStatus $status
     * @return int
     * @internal param null $is_finish
     */
    public function ProjectStatusTaskCount(Project $project, TaskStatus $status)
    {
        $task = $project->Tasks()
            ->where('status_id', $status->id)
            ->where('is_finish', config('task.unfinished'));

        return (int) $task->count();
    }

    /**
     * 合计项目中的任务数（优�
     * �度别）.
     *
     * @param Project $project
     * @param TaskPriority $priority
     * @param null $is_finish
     * @return int
     */
    public function ProjectPriorityTaskCount(Project $project, TaskPriority $priority, $is_finish = null)
    {
        $task = $project->Tasks()->where('priority_id', $priority->id);
        if ($is_finish !== null) {
            $task = $task->where('is_finish', $is_finish);
        }

        return (int) $task->count();
    }

    /**
     * 任务中的附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function SubTaskCount(Task $task)
    {
        return (int) $task->SubTasks()->count();
    }

    /**
     * 任务中的已完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function FinishedSubTasks(Task $task)
    {
        return (int) $task->SubTasks()
            ->where('is_finish', config('task.finished'))
            ->count();
    }

    /**
     * 任务中的未完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public function UnfinishedSubTasks(Task $task)
    {
        return (int) $task->SubTasks()
            ->where('is_finish', config('task.unfinished'))
            ->count();
    }
}
