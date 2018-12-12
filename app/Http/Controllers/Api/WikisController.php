<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Project\WikiTypeResource;
use App\Project\Project;
use App\Wiki\WikiType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WikisController extends Controller
{
    /**
     * Wiki 索引取得
     * @param Project $project
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function wikiTypes(Project $project)
    {
        $this->authorize('is_member', [$project]);

        return WikiTypeResource::collection(WikiType::whereProjectId($project->id)->orWhereProjectId(null)->get());
    }
}
