<?php

namespace App\Repositories;

use Charts;
use Calculator;
use App\Task\Task;
use App\Project\Project;
use App\Tools\Analytics\GanttTool;

class ProgressRepository
{
    use GanttTool;

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
        $gantt = $this->ganttData($project);

        return compact('gantt');
    }

    /**
     * メンバー進捗.
     * @param Project $project
     * @return array
     */
    public function memberProgress(Project $project)
    {
        $users = $project->Users;
        $projectLeader = $project->ProjectLeader;
        $subLeader = $project->SubLeader;

        return compact('users', 'subLeader', 'projectLeader');
    }

    /**
     * @param Project $project
     * @return array
     */
    public function taskProgress(Project $project)
    {
        $taskGroups = $project->TaskGroups()->latest()->paginate(5);

        return compact('taskGroups');
    }

    /**
     * @param Project $project
     * @return array
     */
    public function todoProgress(Project $project)
    {
        $todos = $project->Todos()->latest()->paginate(20);

        return compact('todos');
    }
}
