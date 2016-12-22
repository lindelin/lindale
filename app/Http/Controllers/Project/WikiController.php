<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\WikiRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\WikiRequest;
use App\Wiki\Wiki;

class WikiController extends Controller
{
    /**
     * WIKI资源库.
     *
     * @var
     */
    protected $wikiRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * WikiController constructor.
     * @param WikiRepository $wikiRepository
     */
    public function __construct(WikiRepository $wikiRepository)
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
        return view('project.wiki.index', $this->wikiRepository->WikiResources($project))
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
        return view('project.wiki.create', $this->wikiRepository->WikiResources($project))
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
        $result = $this->wikiRepository->CreateWiki($request, $project)->save();

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
        return view('project.wiki.show', $this->wikiRepository->WikiResources($project))
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
        return view('project.wiki.edit', $this->wikiRepository->WikiResources($project))
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
        $result = $this->wikiRepository->UpdateWiki($request, $project, $wiki)->update();

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
        /*if ($wiki->image != '') { TODO: 删除WIKI图片
            Storage::deleteDirectory('public/projects/'.$project->title);
        }*/

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
        $this->wikiRepository->FirstWiki($project)->save();

        return redirect()->back();
    }
}
