<?php

namespace App\Tools\Analytics\ChartTools;


use App\Project\Project;
use Charts;

trait AchievementCharts
{
    /**
     * メンバー別スター集計棒グラフ
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementStarBar(Project $project)
    {
        $datas = $project->evaluations()
            ->select(\DB::raw('`user_id`, sum(`evaluation`) as `star`'))
            ->where('is_closed', config('task.finished'))
            ->groupBy('user_id')
            ->get();
        $users = [];
        $stars = [];
        foreach ($datas as $data) {
            $users[] = $data->user->name;
            $stars[] = (int)$data->star;
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
        $datas = $project->tasks()
            ->select(\DB::raw('`user_id`, sum(`cost`) as `cost`, sum(`spend`) as `spend`'))
            ->where('is_finish', config('task.finished'))
            ->where('user_id', '>', 0)
            ->groupBy('user_id')
            ->get();
        $users = [];
        $costs = [];
        $spends = [];
        foreach ($datas as $data) {
            $users[] = $data->user->name;
            $costs[] = (int)$data->cost;
            $spends[] = (int)$data->spend;
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
     * 项目成员任务／待办统计柱状图.
     * @param Project $project
     * @return mixed
     */
    public function memberAchievementTaskBar(Project $project)
    {
        $datas = $project->Tasks()
            ->select(\DB::raw('`user_id`, count(*) as `count`'))
            ->where('is_finish', true)
            ->where('user_id', '>', 0)
            ->groupBy('user_id')->get();

        $users = [];
        $tasks = [];

        foreach ($datas as $data) {
            $users[] = $data->user->name;
            $tasks[] = (int)$data->count;
        }

        return Charts::multi('bar', 'highcharts')
            ->title('Tasks')
            ->labels($users)
            ->dataset(trans('progress.finished-task'), $tasks)
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true);
    }
}