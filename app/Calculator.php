<?php

namespace App;

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
        }
    }
}