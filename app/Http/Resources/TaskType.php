<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Calculator;
use Counter;

class TaskType extends Resource
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
            'name' => trans($this->name),
            'color_id' => $this->color_id,
        ];
    }
}
