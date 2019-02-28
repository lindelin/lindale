<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * プロフィール資源
     * @param Request $request
     * @return ProfileResource
     */
    public function resources(Request $request)
    {
        return new ProfileResource(
            User::where('id', $request->user()->id)->withCount([
                'Todos as unfinished_todo_count' => function ($query) {
                    $query->where('status_id', '<>', config('todo.status.finished'));
                },
                'Tasks as unfinished_task_count' => function ($query) {
                    $query->where('is_finish', config('task.unfinished'));
                },
                'MyProjects as my_project_count',
                'MySlProjects as sl_project_count',
                'Projects as project_count',
            ])->with([
                'Projects' => function ($query) {
                    $query->with(['ProjectLeader', 'SubLeader']);
                },
                'favorites' => function ($query) {
                    $query->with(['ProjectLeader', 'SubLeader']);
                },
            ])->first()
        );
    }
}
