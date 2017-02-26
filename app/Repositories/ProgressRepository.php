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

        $projectProgressAreaspline = Charts::multi('areaspline', 'highcharts')
            ->title('My nice chart')
            ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'])
            ->dataset('John', [3, 4, 3, 5, 4,])
            ->dataset('Jane',  [1, 3, 4, 3, 3,])
            ->responsive(true);


        return compact('schemaDonut', 'projectProgressPie', 'taskProgressPie', 'todoProgressPie', 'projectProgressAreaspline');

    }
}