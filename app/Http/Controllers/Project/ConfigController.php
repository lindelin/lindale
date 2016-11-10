<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * 项目资源库.
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI获取项目资源库.
     *
     * ProjectController constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * 基本设定
     *
     * @param Project $project
     * @return $this
     */
    public function index(Project $project)
    {
        return view('project.config.index', $this->projectRepository->ProjectResources())
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'basic']);
    }
}
