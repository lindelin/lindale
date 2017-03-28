<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\ProgressRepository;

class ProgressController extends Controller
{
    protected $progressRepository;

    public function __construct(ProgressRepository $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }

    public function index(Project $project)
    {
        return view('project.progress.index', $this->progressRepository->ProgressResources($project))
            ->with(['project' => $project, 'selected' => 'progress']);
    }
}
