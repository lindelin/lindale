<?php

namespace App\Http\Resources;

use App\Project\Project;
use App\User;
use Illuminate\Http\Resources\Json\Resource;
use File;
use Colorable;
use Calculator;
use Charts;

class ProfileResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $this->image(),
            'content' => $this->content,
            'company' => $this->company,
            'location' => $this->location,
            'created_at' => $this->created_at->format('Y/m/d h:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d h:i:s'),
            'status' => [
                'project_count' => (int)$this->my_project_count + $this->sl_project_count + $this->project_count,
                'unfinished_task_count' => (int)$this->unfinished_task_count,
                'unfinished_todo_count' => (int)$this->unfinished_todo_count,
            ],
            'progress' => [
                'total' => Calculator::UserProgress($this->resource),
                'task' => Calculator::UserTaskProgressCompute($this->resource),
                'todo' => Calculator::UserTodoProgressCompute($this->resource),
            ],
            'projects' => [
                'favorites' => new ProjectCollection($this->favorites),
                'management' => new ProjectCollection(Project::where('user_id', $this->id)
                    ->orWhere('sl_id', $this->id)
                    ->latest()
                    ->get()),
                'normal' => new ProjectCollection($this->Projects),
            ],
            'activity' => view()->make('layouts.webview')->with('contents', $this->createActivityChart($request->user()))->render(),
        ];
    }

    /**
     * 画像
     * @return string
     */
    private function image()
    {
        if ($this->photo != '' and File::exists(public_path('storage/'.$this->photo))) {
            return asset('storage/'.$this->photo);
        } else {
            return asset(Colorable::lindaleProfileImg($this->email));
        }
    }

    /**
     * activity
     * @param User $user
     * @return mixed
     */
    private function createActivityChart(User $user)
    {
        return Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $user->Tasks()->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $user->Tasks()->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $user->Todos()->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $user->Todos()->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->lastByDay(7, true)
            ->view('vendor.consoletvs.charts.highcharts.multi.areaspline')
            ->render();
    }
}
