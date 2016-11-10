<?php

namespace App\Http\Controllers\Project\Wiki;

use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;
use App\Repositories\WikiRepository;
use App\Project\Project;
use App\Wiki\WikiType;
use Illuminate\Http\Request;

class WikiTypeController extends Controller
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
     * 创建WIKI表单.
     *
     * @param Project $project
     * @return $this
     */
    public function create(Project $project)
    {
        return view('project.wiki.index', $this->wikiRepository->WikiResources($project))
            ->with(['project' => $project, 'selected' => 'wiki', 'add_wiki_index' => 'on']);
    }

    /**
     * 创建WIKI.
     *
     * @param TypeRequest $request
     * @param Project $project
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TypeRequest $request, Project $project)
    {
        $result = $this->wikiRepository->CreateWikiType($request, $project)->save();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }

    /**
     * 更新WIKI表单.
     *
     * @param Request $request
     * @param WikiType $wikiType
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project, WikiType $wikiType)
    {
        $result = $this->wikiRepository->UpdateWikiType($request, $wikiType)->update();

        if ($result) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }

    /**
     * 删除WIKI表单.
     *
     * @param Project $project
     * @param WikiType $wikiType
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, WikiType $wikiType)
    {
        $wikiType->Wikis()->delete();

        if ($wikiType->delete()) {
            return redirect()->to("/project/$project->id/wiki")->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }
}
