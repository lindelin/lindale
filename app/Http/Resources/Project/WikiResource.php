<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\Resource;
use File;

class WikiResource extends Resource
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
            'content' => $this->content ?
                view()->make('webview.wiki')->with('wiki', $this->resource)->render() : null,
            'original_content' => $this->content,
            'image' => $this->image(),
            'user' => new UserResource($this->User),
            'project' => $this->project_id,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
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
            return null;
        }
    }
}
