<?php

namespace App\Tools\Analytics;


use App\User;
use Carbon\Carbon;

trait Achievable
{
    /**
     * 持续日数
     * @return string
     */
    public function daysAchievement()
    {
        if ($this->start_at) {
            return $this->start_at->diffInDays(Carbon::now());
        } else {
            return '--';
        }
    }

    /**
     * 成员总数
     * @return int
     */
    public function membersAchievement()
    {
        $members = 1;
        if ($this->SubLeader) {
            $members += 1;
        }

        if (($users = $this->Users()->count()) > 0) {
            $members += (int)$users;
        }

        return (int)$members;
    }

    /**
     * wiki 总数
     * @return int
     */
    public function wikisAchievement()
    {
        return (int)$this->Wikis()->count();
    }

    /**
     * start 总数
     * @return int
     */
    public function starsAchievement()
    {
        return (int)$this->evaluations()->sum('evaluation');
    }

    /**
     * task 总数
     * @return int
     */
    public function tasksAchievement()
    {
        return (int)$this->tasks()->count();
    }

    /**
     * task 完了总数
     * @return int
     */
    public function tasksFinishedAchievement()
    {
        return (int)$this->tasks()->where('is_finish', config('task.finished'))->count();
    }

    /**
     * task 总数
     * @return int
     */
    public function todosAchievement()
    {
        return (int)$this->todos()->count();
    }

    /**
     * task 完了总数
     * @return int
     */
    public function todosFinishedAchievement()
    {
        return (int)$this->todos()
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }

    /**
     * task 予定总工数
     * @return int
     */
    public function costAchievement()
    {
        return (int)$this->Tasks()->sum('cost');
    }

    /**
     * task 実総工数
     * @return int
     */
    public function spendAchievement()
    {
        return (int)$this->Tasks()->sum('spend');
    }

    /**
     * 総貢献度
     * @return int
     */
    public function contributionAchievement()
    {
        return $this->tasksAchievement() * 50 +
            $this->tasksFinishedAchievement() * 50 +
            $this->todosAchievement() * 20 +
            $this->todosFinishedAchievement() * 30 +
            $this->wikisAchievement() * 100;
    }

    /**
     * ユーザ別貢献度
     * @return int
     */
    public function userContributionAchievement(User $user)
    {
        return $this->Tasks()->where('initiator_id', $user->id)->count() * 50 +
            $this->Tasks()->where('user_id', $user->id)->count() * 50 +
            $this->Todos()->where('initiator_id', $user->id)->count() * 20 +
            $this->todos()
                ->where('type_id', config('todo.public'))
                ->where('status_id', config('todo.status.finished'))
                ->where('user_id', $user->id)->count() * 30 +
            $this->Wikis()->where('user_id', $user->id)->count() * 100;
    }
}