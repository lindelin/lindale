<?php

namespace App\Http\Controllers\Project;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectUpdated;
use App\Project\Project;
use App\Repositories\ProjectRepository;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Events\Project\ProjectDeleted;

class ProjectController extends Controller
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
     * 项目一览.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index', $this->projectRepository->ProjectResources('projects'));
    }

    /**
     * 创建项目的表单.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create', $this->projectRepository->ProjectResources());
    }

    /**
     * 创建项目.
     *
     * @param ProjectRequest $request
     * @return mixed
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->projectRepository->CreateProject($request);
        $result = $project->save();

        if ($result) {

            event(new ProjectCreated($project));

            return redirect()->to('/project')->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-fail'));
        }
    }

    /**
     * 项目首页.
     *
     * @param Project $project
     * @return mixed
     */
    public function show(Project $project)
    {
        return view('project.show', ['selected' => 'top'])->with('project', $project);
    }

    /**
     * 编辑项目的表单.
     *
     * @param Project $project
     * @return mixed
     */
    public function edit(Project $project)
    {
        return view('project.edit', $this->projectRepository->ProjectResources())->with('project', $project);
    }

    /**
     * 更新项目.
     *
     * @param ProjectRequest $request
     * @param Project $project
     * @return mixed
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', [$project, $request]);

        $result = $this->projectRepository->UpdateProject($request, $project)->update();

        if ($result) {

            event(new ProjectUpdated($project));

            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 删除项目.
     *
     * @param ProjectRequest $request
     * @param Project $project
     * @return mixed
     */
    public function destroy(ProjectRequest $request, Project $project)
    {
        $this->authorize('delete', [$project, $request]);

        if ($project->delete()) {

            //删除项目相关内容
            event(new ProjectDeleted($project));

            return redirect()->to('/project')->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }
}
