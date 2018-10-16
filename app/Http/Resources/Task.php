<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

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
            'content' => view()->make('layouts.webview')->with('contents', markdown($this->content)),
            'start_at' => $this->start_at ? $this->start_at->format('Y/m/d') : null,
            'end_at' => $this->end_at ? $this->end_at->format('Y/m/d') : null,
            'cost' => $this->cost,
            'progress' => $this->progress,
            'user_name' => $this->User->name ?? 'None',
            'color' => $this->color_id,
            'type' => trans($this->Type->name),
            'status' => $this->is_finish ? trans('task.finish') : $this->Status->name(),
            'group' => $this->Group ? $this->Group->title : null,
            'priority' => $this->Priority->name(),
            'is_finish' => $this->is_finish,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
