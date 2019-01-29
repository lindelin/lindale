<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Project\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    /**
     * Members Api
     * @param Project $project
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function members(Project $project)
    {
        $this->authorize('is_member', [$project]);

        $subQuery = function ($query) {
            $query->withCount([
                'Todos as unfinished_todo_count' => function ($query) {
                    $query->where('status_id', '<>', config('todo.status.finished'));
                },
                'Tasks as unfinished_task_count' => function ($query) {
                    $query->where('is_finish', config('task.unfinished'));
                },
                'MyProjects as my_projects',
                'MySlProjects as sl_projects',
                'Projects as projects',
            ]);
        };

        $project->load([
            'ProjectLeader' => $subQuery,
            'SubLeader' => $subQuery,
            'Users' => $subQuery
        ]);

        return response()->json([
            'pl' => new ProfileResource($project->ProjectLeader),
            'sl' => $project->SubLeader ? new ProfileResource($project->SubLeader) : null,
            'members' => ProfileResource::collection($project->Users)
        ], 200);
    }
}
