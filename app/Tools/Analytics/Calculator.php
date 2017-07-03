<?php

namespace App\Tools\Analytics;

use Counter;
use App\User;
use App\Task\Task;
use App\Todo\TodoType;
use App\Task\TaskGroup;
use App\Project\Project;

class Calculator
{
    const ZERO = 0;

    /**
     * 计算用户待办事项完成的进展.
     *
     * @param User $user
     * @return int
     */
    public function UserTodoProgressCompute(User $user)
    {
        if (Counter::UserTodoCount($user) > 0) {
            return (int) (Counter::UserTodoFinishCount($user) / Counter::UserTodoCount($user) * 100);
        } else {
            return self::ZERO;
        }
    }

    /**
     * 计算用户任务完成的进展.
     *
     * @param User $user
     * @return int
     */
    public function UserTaskProgressCompute(User $user)
    {
        if (Counter::UserTaskCount($user) > 0) {
            return (int) (Counter::UserFinishedTaskCount($user) / Counter::UserTaskCount($user) * 100);
        } else {
            return self::ZERO;
        }
    }

    /**
     * 计算用户进展.
     *
     * @param User $user
     * @return int
     */
    public function UserProgress(User $user)
    {
        if ((Counter::UserTaskCount($user) > 0) or (Counter::UserTodoCount($user) > 0)) {
            $finishCount = Counter::UserTodoFinishCount($user) + Counter::UserFinishedTaskCount($user);
            $count = Counter::UserTodoCount($user) + Counter::UserTaskCount($user);

            return (int) ($finishCount / $count * 100);
        } else {
            return self::ZERO;
        }
    }

    /**
     * 计算用户待办事项完成的进展（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public function UserTodoTypeProgressCompute(User $user, TodoType $type)
    {
        if (Counter::UserTodoTypeCount($user, $type) > 0) {
            return (int) (Counter::UserTodoTypeFinishCount($user, $type) / Counter::UserTodoTypeCount($user, $type) * 100);
        } else {
            return self::ZERO;
        }
    }

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
            return self::ZERO;
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
            return self::ZERO;
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
            return self::ZERO;
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
            return self::ZERO;
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
            return self::ZERO;
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
            return self::ZERO;
        }
    }

    /**
     * 计算未完成待办的比重.
     *
     * @param Project $project
     * @return int
     */
    public function ProjectUnfinishedTodoProgressCompute(Project $project)
    {
        if (Counter::ProjectTodoCount($project) > 0) {
            return (int) (100 - self::ProjectProgressCompute($project) - self::ProjectUnfinishedTaskProgressCompute($project));
        } else {
            return self::ZERO;
        }
    }
}