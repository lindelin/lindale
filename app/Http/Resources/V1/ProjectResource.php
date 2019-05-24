<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'url' => route('project', ['project' => $this->id]),
            'title' => $this->title,
            'content' => $this->content,
            'start_at' => $this->start_at ? $this->start_at->format('Y/m/d') : '',
            'end_at' => $this->end_at ? $this->end_at->format('Y/m/d') : '',
            'image' => $this->image(),
            'type' => $this->type_id,
            'status' => $this->status_id,
            'progress' => $this->progress,
            'created_at' => $this->created_at->format('Y/m/d h:i:s'),
            'updated_at' => $this->updated_at->diffForHumans(),
            'pl' => new UserResource($this->pl),
            'sl' => new UserResource($this->sl),
            'status_data' => [
                'completed_tasks' => $this->sumCompletedTasks(),
                'total_tasks' => $this->tasks->count(),
                'completed_todos' => $this->sumCompletedTodos(),
                'total_todos' => $this->todos->count(),
            ],
        ];
    }

    /**
     * 完了したTaskを集計
     * @return int
     */
    private function sumCompletedTasks(): int
    {
        return $this->tasks->where('is_finish', true)->count();
    }

    /**
     * 完了したTodoを集計
     * @return int
     */
    private function sumCompletedTodos(): int
    {
        return $this->todos
            ->where('type_id', config('todo.public'))
            ->where('status_id', config('todo.status.finished'))
            ->count();
    }
}
