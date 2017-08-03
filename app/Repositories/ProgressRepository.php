<?php

namespace App\Repositories;

use App\Task\Task;
use DB;
use Charts;
use Calculator;
use App\Project\Project;
use Swatkins\LaravelGantt\Gantt;

class ProgressRepository
{
    /**
     * @param Project $project
     * @return array
     */
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

    /**
     * ガントチャート.
     * @param Project $project
     * @return array
     */
    public function taskGanttChart(Project $project)
    {
        $taskGroups = $project->TaskGroups;

        $gantt = [];
        foreach ($taskGroups as $group) {
            if (!$group->start_at) {
                continue;
            }
            $task_data = [];
            $task_data['id'] = $group->id;
            $task_data['text'] = $group->title;
            $task_data['start_date'] = $group->start_at->format('d-m-Y');
            $task_data['duration'] = $group->start_at->diffInDays($group->end_at);
            $task_data['progress'] = trans_progress($group->progress);
            $task_data['user'] = 'Lindelin';
            $task_data['open'] = false;
            $gantt[] = $task_data;
            if ($group->Tasks->count() > 0) {
                foreach ($group->Tasks as $task) {
                    if (!$task->start_at) {
                        continue;
                    }
                    $task_data = [];
                    //$task_data['id'] = $task->id;
                    $task_data['text'] = '<a href="/">'.$task->title.'</a>';
                    $task_data['start_date'] = $task->start_at->format('d-m-Y');
                    $task_data['duration'] = $task->start_at->diffInDays($task->end_at);
                    $task_data['progress'] = trans_progress($task->progress);
                    $task_data['user'] = $task->User ? $task->User->name : trans('project.none');
                    $task_data['open'] = false;
                    $task_data['parent'] = $group->id;
                    $gantt[] = $task_data;
                }
            }
        }

        $gantt = collect($gantt)->toJson();

        return compact('gantt');
    }

    public function memberProgress(Project $project)
    {
        $users = $project->Users;
        $projectLeader = $project->ProjectLeader;
        $subLeader = $project->SubLeader;

        return compact('users', 'subLeader', 'projectLeader');
    }
}
