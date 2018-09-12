<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use File;
use Colorable;
use Calculator;

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
                'project_count' => (int)$this->my_projects + $this->sl_projects + $this->projects,
                'unfinished_task_count' => (int)$this->unfinished_task_count,
                'unfinished_todo_count' => (int)$this->unfinished_todo_count,
            ],
            'progress' => [
                'total' => Calculator::UserProgress($this->resource),
                'task' => Calculator::UserTaskProgressCompute($this->resource),
                'todo' => Calculator::UserTodoProgressCompute($this->resource),
            ],
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
}
