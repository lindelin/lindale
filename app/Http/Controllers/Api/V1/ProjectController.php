<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * 管理しているプロジェクト
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function managedResources(Request $request)
    {
        $projects = Project::managedBy($request->user()->id)
            ->with([
                'pl',
                'sl',
                'todos',
                'tasks',
            ])
            ->orderBy('progress', 'asc')
            ->latest()
            ->paginate(8);

        return ProjectResource::collection($projects);
    }

    public function joinedResources(Request $request)
    {
        $projects = $request->user()
            ->projects()
            ->with([
            'pl',
            'sl',
            'todos',
            'tasks',
        ])
            ->orderBy('progress', 'asc')
            ->latest()
            ->paginate(8);

        return ProjectResource::collection($projects);
    }
}
