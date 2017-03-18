<?php

namespace App\Repositories;

use App\Project\Project;
use Charts;
use App\Calculator;


class ProgressRepository
{
    public function ProgressResources(Project $project)
    {
        $schemaDonut = Charts::create('donut', 'c3')
            ->title(trans('progress.proportion'))
            ->labels(['TODO', trans('header.tasks'), trans('common.finish')])
            ->values([
                Calculator::ProjectUnfinishedTodoProgressCompute($project),
                Calculator::ProjectUnfinishedTaskProgressCompute($project),
                $project->progress,
            ])
            ->responsive(true);

        $projectProgressPie = Charts::create('percentage', 'justgage')
            ->title(trans('header.project'))
            ->elementLabel('%')
            ->values([
                $project->progress,
                0,
                100
            ])
            ->colors(['#2ca02c'])
            ->height(250)
            ->width(0)
            ->responsive(false);

        $taskProgressPie = Charts::create('percentage', 'justgage')
            ->title(trans('header.tasks'))
            ->elementLabel('%')
            ->values([
                Calculator::ProjectTaskProgressCompute($project),
                0,
                100
            ])
            ->colors(['#ff7f0e'])
            ->responsive(true);

        $todoProgressPie = Charts::create('percentage', 'justgage')
            ->title('TODO')
            ->elementLabel('%')
            ->values([
                Calculator::ProjectTodoProgressCompute($project),
                0,
                100
            ])
            ->colors(['#1f77b4'])
            ->responsive(true);

        $projectProgressAreaspline = Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $project->Tasks()->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $project->Tasks()->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $project->Todos()->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $project->Todos()->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->lastByDay(7, true);
        ;


        return compact(
            'schemaDonut',
            'projectProgressPie',
            'taskProgressPie',
            'todoProgressPie',
            'projectProgressAreaspline');
    }
}