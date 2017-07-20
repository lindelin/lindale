<?php

namespace App\Repositories;

use Charts;
use Calculator;
use App\Project\Project;
use Swatkins\LaravelGantt\Gantt;
use DB;

class ProgressRepository
{
    public function ProgressResources(Project $project)
    {
        $schemaDonut = Charts::create('donut', 'highcharts')
            ->title(trans('progress.proportion'))
            ->labels(['TODO', trans('header.tasks'), trans('common.finish')])
            ->values([
                Calculator::ProjectUnfinishedTodoProgressCompute($project),
                Calculator::ProjectUnfinishedTaskProgressCompute($project),
                $project->progress,
            ])
            ->dimensions(1000, 500)
            ->responsive(true);

        $projectProgressPie = Charts::create('percentage', 'justgage')
            ->title(trans('header.project'))
            ->elementLabel('%')
            ->values([
                $project->progress,
                0,
                100,
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
                100,
            ])
            ->colors(['#ff7f0e'])
            ->responsive(true);

        $todoProgressPie = Charts::create('percentage', 'justgage')
            ->title('TODO')
            ->elementLabel('%')
            ->values([
                Calculator::ProjectTodoProgressCompute($project),
                0,
                100,
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

        return compact(
            'schemaDonut',
            'projectProgressPie',
            'taskProgressPie',
            'todoProgressPie',
            'projectProgressAreaspline');
    }

    public function taskGanttChart(Project $project)
    {
        $select = 'title as label, 
        if(start_at is not null, DATE_FORMAT(start_at, \'%Y-%m-%d\'), DATE_FORMAT(now(), \'%Y-%m-%d\')) as start, 
        if(end_at is not null, DATE_FORMAT(end_at, \'%Y-%m-%d\'), DATE_FORMAT(now(), \'%Y-%m-%d\')) as end, 
        if(is_finish = 1,\'success\',if(date(now()) > date(`end_at`),\'urgent\', 
        if(date(now()) between date(`start_at`) and date(`end_at`),\'important\',\'no\'))) as class';

        $tasks = $project->Tasks()
            ->where('start_at', '<>', '')
            ->where('end_at', '<>', '')
            ->select(DB::raw($select))
            ->orderBy('start', 'asc')
            ->orderBy('end', 'asc')
            ->get();

        $gantt = new Gantt($tasks->toArray(), [
            'title' => trans('header.tasks'),
        ]);

        return compact('gantt');
    }
}
