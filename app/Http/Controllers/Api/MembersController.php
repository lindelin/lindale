<?php

namespace App\Http\Controllers\Api;

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

        $project->load([
            'ProjectLeader',
            'SubLeader',
            'Users'
        ]);

        return response()->json([
            'pl' => new UserResource($project->ProjectLeader),
            'sl' => $project->SubLeader ? new UserResource($project->SubLeader) : null,
            'members' => UserResource::collection($project->Users)
        ], 200);
    }
}
