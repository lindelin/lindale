<?php

namespace App\Tools\Analytics\Progresses;

use Counter;
use App\Task\Task;
use App\Task\TaskGroup;
use App\Project\Project;

trait ProjectProgress
{
    /**
     * 计算任务组的任务进展率.
     *
     * @param TaskGroup $group
     * @return int
     */
    public function TaskGroupProgressCompute(TaskGroup $group)
    {
        if (Counter::GroupTaskCount($group) > 0) {
            return (int) (Counter::GroupTaskFinishCount($group) / Counter::GroupTaskCount($group) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算任务进度.
     *
     * @param Task $task
     * @return int
     */
    public function TaskProgressCompute(Task $task)
    {
        if (Counter::SubTaskCount($task) > 0) {
            return (int) (Counter::FinishedSubTasks($task) / Counter::SubTaskCount($task) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算项目进度.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectProgressCompute(Project $project)
    {
        if ((Counter::ProjectTaskCount($project) > 0) or (Counter::ProjectTodoCount($project) > 0)) {
            return (int) ((Counter::ProjectTaskFinishedCount($project) + Counter::ProjectTodoFinishedCount($project)) / (Counter::ProjectTaskCount($project) + Counter::ProjectTodoCount($project)) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算项目任务进度.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTaskProgressCompute(Project $project)
    {
        if (Counter::ProjectTaskCount($project) > 0) {
            return (int) (Counter::ProjectTaskFinishedCount($project) / Counter::ProjectTaskCount($project) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算项目To-do进度.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectTodoProgressCompute(Project $project)
    {
        if (Counter::ProjectTodoCount($project) > 0) {
            return (int) (Counter::ProjectTodoFinishedCount($project) / Counter::ProjectTodoCount($project) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算未完成任务的比重.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectUnfinishedTaskProgressCompute(Project $project)
    {
        if (Counter::ProjectTaskCount($project) > 0) {
            return (int) (Counter::ProjectTaskUnfinishedCount($project) / (Counter::ProjectTaskCount($project) + Counter::ProjectTodoCount($project)) * 100);
        } else {
            return 0;
        }
    }

    /**
     * 计算未完成�
     * 办的比重.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectUnfinishedTodoProgressCompute(Project $project)
    {
        if (Counter::ProjectTodoCount($project) > 0) {
            return (int) (100 - self::ProjectProgressCompute($project) - self::ProjectUnfinishedTaskProgressCompute($project));
        } else {
            return 0;
        }
    }
}
