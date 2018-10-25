<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Counter;

class TaskResource extends Resource
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
            'project' => $this->Project->title,
            'id' => $this->id,
            'initiator' => $this->Initiator  ? new UserResource($this->Initiator) : null,
            'title' => $this->title,
            'content' => $this->content,
            'start_at' => $this->start_at ? $this->start_at->format('Y/m/d') : null,
            'end_at' => $this->end_at ? $this->end_at->format('Y/m/d') : null,
            'cost' => $this->cost,
            'progress' => $this->progress,
            'user' => $this->User ? new UserResource($this->User) : null,
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
            'sub_tasks' => SubTaskResource::collection($this->SubTasks),
            'task_activities' => TaskActivitieResource::collection($this->Activities),
        ];
    }
}
