<?php

namespace App\Http\Controllers\Project\Wiki;

use App\Wiki\WikiType;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;
use App\Repositories\WikiRepository;

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
     * @return mixed
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
     * @return mixed
     */
    public function store(TypeRequest $request, Project $project)
    {
        $result = $this->wikiRepository->CreateWikiType($request, $project)->save();

        return response()->save($result);
    }

    /**
     * 更新WIKI表单.
     *
     * @param Request $request
     * @param WikiType $wikiType
     * @return mixed
     */
    public function update(Request $request, Project $project, WikiType $wikiType)
    {
        $result = $this->wikiRepository->UpdateWikiType($request, $wikiType)->update();

        return response()->update($result);
    }

    /**
     * 删除WIKI表单.
     *
     * @param Project $project
     * @param WikiType $wikiType
     * @return mixed
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
