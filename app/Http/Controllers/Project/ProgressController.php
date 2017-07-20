<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\ProgressRepository;
use App\Task\Task;
use DB;
use Swatkins\LaravelGantt\Gantt;

class ProgressController extends Controller
{
    protected $progressRepository;

    /**
     * ProgressController constructor.
     * @param ProgressRepository $progressRepository
     */
    public function __construct(ProgressRepository $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.progress.index', $this->progressRepository->ProgressResources($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'overview']);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function gantt(Project $project)
    {
        return view('project.progress.gantt', $this->progressRepository->taskGanttChart($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'gantt']);
    }
}
