<?php

namespace App;

use App\Task\Task;
use App\Task\TaskGroup;
use App\Todo\TodoType;

class Calculator
{
    const ZERO = 0;

    /**
     * 计算用户待办事项完成的进展.
     *
     * @param User $user
     * @return int
     */
    public static function UserTodoProgressCompute(User $user)
    {
        if(Counter::UserTodoCount($user) > 0){
            return (int)(Counter::UserTodoFinishCount($user) / Counter::UserTodoCount($user) * 100);
        }else{
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
    public static function UserTodoTypeProgressCompute(User $user, TodoType $type)
    {
        if(Counter::UserTodoTypeCount($user, $type) > 0){
            return (int)(Counter::UserTodoTypeFinishCount($user, $type) / Counter::UserTodoTypeCount($user, $type) * 100);
        }else{
            return self::ZERO;
        }
    }

    /**
     * 计算任务组的任务进展率
     *
     * @param TaskGroup $group
     * @return int
     */
    public static function TaskGroupProgressCompute(TaskGroup $group)
    {
        if(Counter::GroupTaskCount($group) > 0){
            return (int)(Counter::GroupTaskFinishCount($group) / Counter::GroupTaskCount($group) * 100);
        }else{
            return self::ZERO;
        }
    }

    /**
     * 计算任务进度
     *
     * @param Task $task
     * @return int
     */
    public static function TaskProgressCompute(Task $task)
    {
        if(Counter::SubTaskCount($task) > 0){
            return (int)(Counter::FinishedSubTasks($task) / Counter::SubTaskCount($task) * 100);
        }else{
            return self::ZERO;
        }
    }
}