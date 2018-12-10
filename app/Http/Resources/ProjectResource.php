<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use File;
use Colorable;
use Counter;

class ProjectResource extends Resource
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
            'title' => $this->title,
            'content' => $this->content,
            'start_at' => (string)$this->start_at,
            'end_at' => (string)$this->end_at,
            'image' => $this->image(),
            'pl' => new UserResource($this->ProjectLeader),
            'sl' => new UserResource($this->SubLeader),
            'type' => $this->type_id,
            'status' => $this->status_id,
            'task_status' => Counter::ProjectTaskFinishedCount($this->resource).'/'.Counter::ProjectTaskCount($this->resource),
            'todo_status' => Counter::ProjectTodoFinishedCount($this->resource).'/'.Counter::ProjectTodoCount($this->resource),
            'progress' => $this->progress,
            'created_at' => $this->created_at->format('Y/m/d h:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d h:i:s'),
        ];
    }

    /**
     * WEB View
     * @param string $contents
     * @return string
     */
    private function webView($contents)
    {
        return view()->make('layouts.webview')
            ->with('contents', markdown($contents))
            ->render();
    }

    /**
     * 画像
     * @return string
     */
    private function image()
    {
        if ($this->image != '' and File::exists(public_path('storage/'.$this->image))) {
            return asset('storage/'.$this->image);
        } else {
            return asset(Colorable::lindaleImage());
        }
    }
}
