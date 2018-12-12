<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Project\TopResource;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\TaskGroup;
use App\Project\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * プロジェクト一覧資源
     * @return ProjectCollection
     */
    public function resources()
    {
        return new ProjectCollection(Project::orderBy('progress', 'asc')->latest()->Paginate(30));
    }

    /**
     * お気に入りプロジェクト
     * @param Request $request
     * @return ProjectCollection
     */
    public function favorites(Request $request)
    {
        return new ProjectCollection($request->user()->favorites);
    }

    /**
     * Top 資源
     * @param Project $project
     * @return TopResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function topResources(Project $project)
    {
        $this->authorize('is_member', [$project]);

        $project->load([
            'TaskGroups' => function ($query) {
                $query->latest()->limit(10);
            }
        ]);

        return new TopResource($project);
    }

    /**
     * Task Groups Api
     * @param Project $project
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function taskGroups(Project $project)
    {
        $this->authorize('is_member', [$project]);

        return TaskGroup::collection($project->TaskGroups()
            ->orderBy('status_id', 'asc')->latest()->paginate(10));
    }
}
