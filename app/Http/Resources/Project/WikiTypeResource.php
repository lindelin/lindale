<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\Resource;

class WikiTypeResource extends Resource
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
            'name' => trans($this->name),
        ];
    }
}
