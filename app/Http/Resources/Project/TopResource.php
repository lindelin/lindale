<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Milestone;
use Illuminate\Http\Resources\Json\Resource;
use Counter;
use Calculator;
use Charts;

class TopResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => [
                'task' => Counter::ProjectTaskFinishedCount($this->resource).'/'.Counter::ProjectTaskCount($this->resource),
                'todo' => Counter::ProjectTodoFinishedCount($this->resource).'/'.Counter::ProjectTodoCount($this->resource),
                'event' => '0/0',
            ],
            'progress' => [
                'total' => $this->progress,
                'task' => Calculator::ProjectTaskProgressCompute($this->resource),
                'todo' => Calculator::ProjectTodoProgressCompute($this->resource),
            ],
            'milestone' => Milestone::collection($this->TaskGroups),
            'activity' => view()->make('layouts.webview')->with('contents', $this->createActivityChart($this->resource))->render(),
        ];
    }

    /**
     * 项目动态
     * @param $project
     * @return mixed
     */
    private function createActivityChart($project)
    {
        return Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $project->Tasks()->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $project->Tasks()->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $project->Todos()->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $project->Todos()->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->lastByDay(7, true)
            ->view('vendor.consoletvs.charts.highcharts.multi.areaspline');
    }
}
