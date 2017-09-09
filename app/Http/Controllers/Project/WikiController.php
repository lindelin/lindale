<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\WikiRepositoryContract;
use Storage;
use App\Wiki\Wiki;
use App\Project\Project;
use App\Http\Requests\WikiRequest;
use App\Http\Controllers\Controller;

class WikiController extends Controller
{
    /**
     * WIKI资源库.
     * @var WikiRepositoryContract
     */
    protected $wikiRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * WikiController constructor.
     * @param WikiRepositoryContract $wikiRepository
     */
    public function __construct(WikiRepositoryContract $wikiRepository)
    {
        $this->wikiRepository = $wikiRepository;
    }

    /**
     * 项目一览.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.wiki.index', $this->wikiRepository->wikiResources($project))
            ->with(['project' => $project, 'selected' => 'wiki']);
    }

    /**
     * 创建项目的表单.
     *
     * @param Project $project
     * @return mixed
     */
    public function create(Project $project)
    {
        return view('project.wiki.create', $this->wikiRepository->wikiResources($project))
            ->with(['project' => $project, 'selected' => 'wiki']);
    }

    /**
     * 创建项目.
     *
     * @param WikiRequest $request
     * @param Project $project
     * @return mixed
     */
    public function store(WikiRequest $request, Project $project)
    {
        $wiki = $this->wikiRepository->createWiki($request, $project);

        $this->authorize('create', [$wiki, $project]);

        $result = $wiki->save();

        if ($result) {
            return redirect()->to("project/$project->id/wiki")->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 项目主页.
     *
     * @param Project $project
     * @param Wiki $wiki
     * @return mixed
     */
    public function show(Project $project, Wiki $wiki)
    {
        return view('project.wiki.show', $this->wikiRepository->wikiResources($project))
            ->with(['project' => $project, 'wiki' => $wiki, 'selected' => 'wiki']);
    }

    /**
     * 编辑项目的表单.
     *
     * @param Project $project
     * @param Wiki $wiki
     * @return mixed
     */
    public function edit(Project $project, Wiki $wiki)
    {
        $this->authorize('update', [$wiki, $project]);

        return view('project.wiki.edit', $this->wikiRepository->wikiResources($project))
            ->with(['project' => $project, 'wiki' => $wiki, 'selected' => 'wiki']);
    }

    /**
     * 更新项目.
     *
     * @param WikiRequest $request
     * @param Project $project
     * @param Wiki $wiki
     * @return mixed
     */
    public function update(WikiRequest $request, Project $project, Wiki $wiki)
    {
        $this->authorize('update', [$wiki, $project]);

        $result = $this->wikiRepository->updateWiki($request, $project, $wiki)->update();

        if ($result) {
            return redirect()->to("project/$project->id/wiki/$wiki->id")->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 删除WIKI.
     *
     * @param Project $project
     * @param Wiki $wiki
     * @return mixed
     */
    public function destroy(Project $project, Wiki $wiki)
    {
        $this->authorize('delete', [$wiki, $project]);

        if ($wiki->image != '') {
            Storage::delete('public/'.$wiki->image);
        }

        if ($wiki->delete()) {
            return redirect()->to("project/$project->id/wiki")->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }

    /**
     * 创建默认WIKI.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function first(Project $project)
    {
        $this->wikiRepository->firstWiki($project)->save();

        return redirect()->back();
    }
}
