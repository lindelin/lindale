<?php

namespace App\Tools\Analytics\ChartTools;


use App\Project\Project;
use Charts;

trait AchievementCharts
{
    /**
     * 作業区分円棒グラフ.
     * @param Project $project
     * @return mixed
     */
    public function taskTypeAchievementStarBar(Project $project)
    {
        return Charts::database($project->Tasks()
            ->where('is_finish', config('task.finished'))
            ->get(), 'bar', 'highcharts')
            ->title(trans('task.type'))
            ->responsive(true)
            ->elementLabel(trans('progress.count'))
            ->groupBy('type_id', null, $this->taskTypeLabels($project));
    }

    /**
     * メンバー別スター集計棒グラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementStarBar(Project $project)
    {
        $evaluations = $project->evaluations()
            ->select(\DB::raw('`user_id`, sum(`evaluation`) as `star`'))
            ->where('is_closed', config('task.finished'))
            ->groupBy('user_id')
            ->get();
        $users = [];
        $stars = [];
        foreach ($evaluations as $evaluation) {
            $users[] = $evaluation->user->name;
            $stars[] = (int)$evaluation->star;
        }

        return Charts::multi('bar', 'highcharts')
            ->title('Stars')
            ->colors(['#28a745', '#00ff00', '#0000ff'])
            ->labels($users)
            ->dataset('Stars', $stars)
            ->elementLabel(trans('achievement.star-count'))
            ->responsive(true);
    }

    /**
     * メンバー別タスク予定工数対実工数棒グラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementCostSpendBar(Project $project)
    {
        $tasks = $project->tasks()
            ->select(\DB::raw('`user_id`, sum(`cost`) as `cost`, sum(`spend`) as `spend`'))
            ->where('is_finish', config('task.finished'))
            ->where('user_id', '>', 0)
            ->groupBy('user_id')
            ->get();
        $users = [];
        $costs = [];
        $spends = [];
        foreach ($tasks as $task) {
            $users[] = $task->user->name;
            $costs[] = (int)$task->cost;
            $spends[] = (int)$task->spend;
        }

        return Charts::multi('bar', 'highcharts')
            ->title(trans('achievement.man-hours'))
            ->colors(['#28a745', '#00ff00', '#0000ff'])
            ->labels($users)
            ->dataset(trans('achievement.estimated'), $costs)
            ->dataset(trans('achievement.spent'), $spends)
            ->elementLabel(trans('achievement.hour'))
            ->responsive(true);
    }

    /**
     * メンバー別タスク予定工数対実工数棒グラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementContributionBar(Project $project)
    {
        $users = [];
        $contributions = [];
        $users[] = $project->ProjectLeader->name;
        $contributions[] = $project->userContributionAchievement($project->ProjectLeader);
        if ($project->SubLeader) {
            $users[] = $project->SubLeader->name;
            $contributions[] = $project->userContributionAchievement($project->SubLeader);
        }
        foreach ($project->Users() as $member) {
            $users[] = $member->name;
            $contributions[] = $project->userContributionAchievement($member);
        }

        return Charts::multi('bar', 'highcharts')
            ->title(trans('achievement.contribution'))
            ->colors(['#28a745', '#00ff00', '#0000ff'])
            ->labels($users)
            ->dataset(trans('achievement.contribution'), $contributions)
            ->elementLabel(trans('achievement.point'))
            ->responsive(true);
    }

    /**
     * メンバー別タスク集計棒グラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementTaskBar(Project $project)
    {
        $tasks = $project->Tasks()
            ->select(\DB::raw('`user_id`, count(*) as `count`'))
            ->where('is_finish', true)
            ->where('user_id', '>', 0)
            ->groupBy('user_id')->get();

        $users = [];
        $task_counts = [];

        foreach ($tasks as $task) {
            $users[] = $task->user->name;
            $task_counts[] = (int)$task->count;
        }

        return Charts::multi('bar', 'highcharts')
            ->title('Tasks')
            ->labels($users)
            ->dataset(trans('progress.finished-task'), $task_counts)
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true);
    }

    /**
     * メンバー別 TODOS 集計棒ブラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementTodoBar(Project $project)
    {
        $todos = $project->Todos()
            ->select(\DB::raw('`user_id`, count(*) as `count`'))
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->where('user_id', '>', 0)
            ->groupBy('user_id')->get();

        $todo_counts = [];
        $users = [];

        foreach($todos as $todo) {
            $todo_counts[] = (int)$todo->count;
            $users[] = $todo->user->name;
        }

        return Charts::multi('bar', 'highcharts')
            ->title('To-dos')
            ->labels($users)
            ->dataset(trans('progress.finished-todo'), $todo_counts)
            ->colors(['#ff2321'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true);
    }
}