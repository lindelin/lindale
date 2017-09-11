<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\ProgressRepositoryContract;
use App\Project\Project;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{
    /**
     * @var ProgressRepositoryContract
     */
    protected $progressRepository;

    /**
     * ProgressController constructor.
     * @param ProgressRepositoryContract $progressRepository
     */
    public function __construct(ProgressRepositoryContract $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.progress.index', $this->progressRepository->progressResources($project))
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

    /**
     * @param Project $project
     * @return mixed
     */
    public function ganttFull(Project $project)
    {
        return view('project.progress.gantt-full', $this->progressRepository->taskGanttChart($project))
            ->with(['project' => $project]);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function member(Project $project)
    {
        return view('project.progress.member', $this->progressRepository->memberProgress($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'member']);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function tasks(Project $project)
    {
        return view('project.progress.task', $this->progressRepository->taskProgress($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'task']);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function todo(Project $project)
    {
        return view('project.progress.todo', $this->progressRepository->todoProgress($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'todo']);
    }
}
