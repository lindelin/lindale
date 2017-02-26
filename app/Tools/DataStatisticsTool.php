<?php

namespace App\Tools;

use App\Project\Project;
use App\Task\Task;
use App\Task\TaskGroup;
use App\Task\TaskPriority;
use App\Task\TaskStatus;
use App\Task\TaskType;
use App\Todo\TodoStatus;
use App\Todo\TodoType;


trait DataStatisticsTool
{
    /**
     * 获取用户项目的总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserProjectCount(User $user)
    {
        return (int)($user->MyProjects()->count() + $user->MySlProjects()->count() + $user->Projects()->count());
    }

    /**
     * 合计用户未完成任务总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserUnfinishedTaskCount(User $user)
    {
        return (int)($user->Tasks()->Where('is_finish', Definer::TASK_UNFINISHED)->count());
    }

    /**
     * 合计用户完成任务总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserFinishedTaskCount(User $user)
    {
        return (int)($user->Tasks()->Where('is_finish', Definer::TASK_FINISHED)->count());
    }

    /**
     * 合计用户任务总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTaskCount(User $user)
    {
        return (int)($user->Tasks()->count());
    }

    /**
     * 合计用户待办总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoCount(User $user)
    {
        return (int)$user->Todos()->count();
    }

    /**
     * 合计用户完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoFinishCount(User $user)
    {
        return (int)$user->Todos()->where('status_id', Definer::FINISH_STATUS_ID)->count();
    }

    /**
     * 合计用户未完成待办总数.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoUnfinishedCount(User $user)
    {
        return (int)$user->Todos()->where('status_id', '<>',Definer::FINISH_STATUS_ID)->count();
    }

    /**
     * 合计用户待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public static function UserTodoTypeCount(User $user, TodoType $type)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->count();
    }

    /**
     * 合计用户完成待办总数（按类别）.
     *
     * @param User $user
     * @param $type
     * @return int
     */
    public static function UserTodoTypeFinishCount(User $user, TodoType $type)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->where('status_id', Definer::FINISH_STATUS_ID)->count();
    }

    /**
     * 合计用户待办总数（按状态）.
     *
     * @param User $user
     * @param TodoStatus $status
     * @return int
     */
    public static function UserTodoStatus(User $user, TodoStatus $status)
    {
        return (int)$user->Todos()->where('status_id', $status->id)->count();
    }

    /**
     * 合计用户待办总数（按类别和状态）.
     *
     * @param User $user
     * @param TodoType $type
     * @param TodoStatus $status
     * @return int
     */
    public static function UserTodoTypeStatusCount(User $user, TodoType $type, TodoStatus $status)
    {
        return (int)$user->Todos()->where('type_id', $type->id)->where('status_id', $status->id)->count();
    }

    /**
     * 合计项目中用户负责的待办完成数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public static function UserProjectTodoFinishCount(Project $project, User $user)
    {
        return (int)$project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', Definer::PUBLIC_TODO)
            ->where('status_id', Definer::FINISH_STATUS_ID)
            ->count();
    }

    /**
     * 合计项目中用户负责的待办总数.
     *
     * @param Project $project
     * @param User $user
     * @return int
     */
    public static function UserProjectTodoCount(Project $project, User $user)
    {
        return (int)$project
            ->Todos()
            ->where('user_id', $user->id)
            ->where('type_id', Definer::PUBLIC_TODO)
            ->count();
    }

    /**
     * 合计任务组包含的任务总数
     *
     * @param TaskGroup $group
     * @return int
     */
    public static function GroupTaskCount(TaskGroup $group)
    {
        return (int)$group->Tasks()->count();
    }

    /**
     * 合计任务组包含的已完成任务数
     *
     * @param TaskGroup $group
     * @return int
     */
    public static function GroupTaskFinishCount(TaskGroup $group)
    {
        return (int)$group->Tasks()->where('is_finish', Definer::TASK_FINISHED)->count();
    }

    /**
     * 合计任务组中未完成任务数
     *
     * @param TaskGroup $group
     * @return int
     */
    public static function GroupTaskUnfinishedCount(TaskGroup $group)
    {
        return (int)$group->Tasks()->where('is_finish', Definer::TASK_UNFINISHED)->count();
    }

    /**
     * 合计项目中任务组数
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTaskGroupCount(Project $project)
    {
        return (int)$project->TaskGroups()->count();
    }

    /**
     * 合计项目中的任务总数
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTaskCount(Project $project)
    {
        return (int)$project->Tasks()->count();
    }

    /**
     * 合计项目中已完成任务数
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTaskFinishedCount(Project $project)
    {
        return (int)$project->Tasks()->where('is_finish', Definer::TASK_FINISHED)->count();
    }

    /**
     * 合计项目中未完成任务数
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTaskUnfinishedCount(Project $project)
    {
        return (int)$project->Tasks()->where('is_finish', Definer::TASK_UNFINISHED)->count();
    }

    /**
     * 合计项目中的任务数（类型别）
     *
     * @param Project $project
     * @param TaskType $type
     * @param null $is_finish
     * @return int
     */
    public static function ProjectTypeTaskCount(Project $project, TaskType $type, $is_finish = null)
    {
        $task = $project->Tasks()->where('type_id', $type->id);
        if($is_finish !== null){
            $task = $task->where('is_finish', $is_finish);
        }

        return (int)$task->count();
    }

    /**
     * 项目中完成待办数.
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTodoFinishedCount(Project $project)
    {
        return (int)$project
            ->todos()
            ->where('type_id', Definer::PUBLIC_TODO)
            ->where('status_id', Definer::FINISH_STATUS_ID)
            ->count();
    }

    /**
     * 项目中待办总数.
     *
     * @param Project $project
     * @return int
     */
    public static function ProjectTodoCount(Project $project)
    {
        return (int)$project
            ->todos()
            ->where('type_id', Definer::PUBLIC_TODO)
            ->count();
    }

    /**
     * 合计项目中的任务数（状态别）
     *
     * @param Project $project
     * @param TaskStatus $status
     * @param null $is_finish
     * @return int
     */
    public static function ProjectStatusTaskCount(Project $project, TaskStatus $status, $is_finish = null)
    {
        $task = $project->Tasks()->where('status_id', $status->id);
        if($is_finish !== null){
            $task = $task->where('is_finish', $is_finish);
        }

        return (int)$task->count();
    }

    /**
     * 合计项目中的任务数（优先度别）
     *
     * @param Project $project
     * @param TaskPriority $priority
     * @param null $is_finish
     * @return int
     */
    public static function ProjectPriorityTaskCount(Project $project, TaskPriority $priority, $is_finish = null)
    {
        $task = $project->Tasks()->where('priority_id', $priority->id);
        if($is_finish !== null){
            $task = $task->where('is_finish', $is_finish);
        }

        return (int)$task->count();
    }

    /**
     * 任务中的附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public static function SubTaskCount(Task $task)
    {
        return (int)$task->SubTasks()->count();
    }

    /**
     * 任务中的已完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public static function FinishedSubTasks(Task $task)
    {
        return (int)$task->SubTasks()->where('is_finish', Definer::TASK_FINISHED)->count();
    }

    /**
     * 任务中的未完成附属任务总数.
     *
     * @param Task $task
     * @return int
     */
    public static function UnfinishedSubTasks(Task $task)
    {
        return (int)$task->SubTasks()->where('is_finish', Definer::TASK_UNFINISHED)->count();
    }
}