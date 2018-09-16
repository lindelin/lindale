<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProjectCollection;
use App\Project\Project;
use App\Http\Controllers\Controller;

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
}
