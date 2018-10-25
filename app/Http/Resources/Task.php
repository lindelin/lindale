<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Counter;

class Task extends Resource
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
            'project_name' => $this->Project->title,
            'id' => $this->id,
            'initiator_name' => $this->Initiator->name ?? "System",
            'title' => $this->title,
            'content' => $this->content,
            'start_at' => $this->start_at ? $this->start_at->format('Y/m/d') : null,
            'end_at' => $this->end_at ? $this->end_at->format('Y/m/d') : null,
            'cost' => $this->cost,
            'progress' => $this->progress,
            'user_name' => $this->User->name ?? 'None',
            'color' => $this->color_id,
            'type' => trans($this->Type->name),
            'status' => $this->is_finish ? trans('task.finish') : $this->Status->name(),
            'sub_task_status' => Counter::SubTaskCount($this->resource).'　'.
                trans('task.sub-task').'（'.Counter::FinishedSubTasks($this->resource).' - '.
                trans('task.finish').' ，'.Counter::UnfinishedSubTasks($this->resource).' - '.
                trans('task.unfinished').'）',
            'group' => $this->Group ? $this->Group->title : null,
            'priority' => $this->Priority->name(),
            'is_finish' => $this->is_finish,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
