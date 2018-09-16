<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Todo extends Resource
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
            'initiator_name' => $this->Initiator ? $this->Initiator->name : "System",
            'content' => $this->content,
            'details' => $this->details,
            'type' => $this->Type->name(),
            'status' => $this->Status->name(),
            'color' => $this->color_id,
            'list_name' => $this->TodoList ? $this->TodoList->title : null,
            'user_name' => $this->User ? $this->User->name : null,
            'project_name' => $this->Project->title,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
