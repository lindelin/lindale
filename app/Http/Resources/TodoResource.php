<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TodoResource extends Resource
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
            'initiator' => $this->Initiator  ? new UserResource($this->Initiator) : null,
            'content' => $this->content,
            'details' => $this->details,
            'type' => $this->Type->name(),
            'status' => $this->Status->name(),
            'action' => $this->Status->action_id,
            'color' => $this->color_id,
            'list_name' => $this->TodoList ? $this->TodoList->title : null,
            'user' => $this->User ? new UserResource($this->User) : null,
            'project_name' => $this->Project->title,
            'updated_at' => $this->updated_at->diffForHumans(),
            'completed' => $this->status_id === config('todo.status.finished') ? true : false,
        ];
    }
}
