<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TaskActivitieResource extends Resource
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
            'task_id' => $this->task_id,
            'id' => $this->id,
            'content' => view()->make('layouts.webview')->with('contents', markdown($this->content)),
            'user' => new UserResource($this->User),
            'update_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
