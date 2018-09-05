<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use File;
use Colorable;

class UserResource extends Resource
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
