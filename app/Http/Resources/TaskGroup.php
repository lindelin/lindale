<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Calculator;
use Counter;

class TaskGroup extends Resource
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
            'project_id' => $this->project_id,
            'id' => $this->id,
            'title' => $this->title,
            'information' => $this->information,
            'progress' => Calculator::TaskGroupProgressCompute($this->resource),
            'status' => Counter::GroupTaskCount($this->resource).' '.trans('header.tasks').'（'.Counter::GroupTaskFinishCount($this->resource).' - '.trans('task.finish').', '.Counter::GroupTaskUnfinishedCount($this->resource).' - '.trans('task.unfinished').'）',
            'type' => trans($this->resource->Type->name),
            'type_color' => $this->resource->Type->color_id,
            'status_id' => $this->status_id,
            'start_at' => $this->start_at ? $this->start_at->format('Y/m/d') : '',
            'end_at' => $this->end_at ? $this->end_at->format('Y/m/d') : '',
            'color' => $this->color_id,
        ];
    }
}
