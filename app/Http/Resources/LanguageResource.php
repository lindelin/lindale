<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LanguageResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        app()->setLocale(user_config($request->user(), config('config.user.lang')));
        return [
            'achievement' => trans('achievement'),
            'admin' => trans('admin'),
            'auth' => trans('auth'),
            'color' => trans('color'),
            'common' => trans('common'),
            'errors' => trans('errors'),
            'header' => trans('header'),
            'member' => trans('member'),
            'notice' => trans('notice'),
            'progress' => trans('progress'),
            'project' => trans('project'),
            'status' => trans('status'),
            'task' => trans('task'),
            'todo' => trans('todo'),
            'type' => trans('type'),
            'user' => trans('user'),
            'wiki' => trans('wiki'),
            'config' => trans('config'),
        ];
    }
}
