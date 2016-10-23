<?php

namespace App\Http\Controllers\Project\Wiki;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;
use App\Repositories\WikiRepository;
use App\Project\Project;

class WikiTypeController extends Controller
{
    /**
     * WIKI资源库
     *
     * @var
     */
    protected $wikiRepository;

    /**
     * 构造器
     * 通过DI获取资源库
     *
     * WikiController constructor.
     * @param WikiRepository $wikiRepository
     */
    public function __construct(WikiRepository $wikiRepository)
    {
        $this->wikiRepository = $wikiRepository;
    }

    /**
     * 创建WIKI表单
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
     * 创建WIKI
     *
     * @param TypeRequest $request
     * @param Project $project
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TypeRequest $request, Project $project)
    {
        $result = $this->wikiRepository->CreateWikiType($request, $project)->save();

        if ($result) {
            return redirect()->to("project/$project->id/wiki")->with('status', trans('errors.save-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.save-failed'));
        }
    }
}
