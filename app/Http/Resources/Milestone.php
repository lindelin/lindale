<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Calculator;

class Milestone extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'color' => $this->color_id,
            'type' => trans($this->resource->Type->name).'#'.$this->id,
            'type_color' => $this->resource->Type->color_id,
            'progress' => Calculator::TaskGroupProgressCompute($this->resource),
        ];
    }
}
