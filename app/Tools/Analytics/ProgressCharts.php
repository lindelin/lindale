<?php

namespace App\Tools\Analytics;

use App\User;
use Charts;
use App\Project\Project;

class ProgressCharts
{
    /**
     * 项目成员任务／待办统计柱状图
     * @param Project $project
     * @return mixed
     */
    public function memberOverviewBar(Project $project)
    {
        $users =  $project->Users;
        $userLabels = [];
        foreach ($users as $user){
            $userLabels[$user->id] = $user->name;
        }
        $userLabels[$project->ProjectLeader->id] = $project->ProjectLeader->name;
        $userLabels[$project->SubLeader->id] = $project->SubLeader->name;
        $userLabels[''] = trans('project.none');

        return Charts::multiDatabase('bar', 'highcharts')
            ->title('Overview')
            ->dataset(trans('header.tasks'), $project->Tasks)
            ->dataset(trans('progress.finished-task'), $project->Tasks()->where('is_finish', true)->get())
            ->dataset('TODO', $project->Todos)
            ->dataset(trans('progress.finished-todo'), $project->Todos()->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->groupBy('user_id', null, $userLabels);
    }

    public function memberProgressAreaspline(Project $project, User $user)
    {
        return Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $user->Tasks()->where('project_id', $project->id)->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $user->Tasks()->where('project_id', $project->id)->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $user->Todos()->where('project_id', $project->id)->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $user->Todos()->where('project_id', $project->id)->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->groupByMonth()
            ->view('vendor.consoletvs.charts.highcharts.multi.areaspline');
    }

    public function memberTaskTypePie(Project $project, User $user)
    {
        $types =  $project->TaskTypes;
        $typeLabels = [];
        foreach ($types as $type){
            $typeLabels[$type->id] = trans($type->name);
        }
        $typeLabels[''] = trans('project.none');

        return Charts::database($project->Tasks()->where('user_id', $user->id)->get(), 'pie', 'highcharts')
            ->title(trans('task.type'))
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupBy('type_id', null, $typeLabels);
    }
}