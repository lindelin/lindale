<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProjectCollection;
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
}
