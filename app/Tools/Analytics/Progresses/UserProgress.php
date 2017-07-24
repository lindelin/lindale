<?php

namespace App\Tools\Analytics\Progresses;

use Counter;
use App\User;
use App\Todo\TodoType;

trait UserProgress
{
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
            return 0;
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
            return 0;
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
            return 0;
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
            return 0;
        }
    }
}