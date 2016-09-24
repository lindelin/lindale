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
     * @var
     */
    protected $wikiRepository;

    /**
     * WikiController constructor.
     * @param WikiRepository $wikiRepository
     */
    public function __construct(WikiRepository $wikiRepository)
    {
        $this->wikiRepository = $wikiRepository;
    }

    /**
     * @param Project $project
     * @return $this
     */
    public function index(Project $project)
    {
        return view('project.wiki.index', $this->wikiRepository->WikiResources($project))
            ->with(['project' => $project, 'selected' => 'wiki']);
    }

    /**
     * @param Project $project
     * @return $this
     */
    public function create(Project $project)
    {
        return view('project.wiki.create', $this->wikiRepository->WikiResources($project))
            ->with(['project' => $project, 'selected' => 'wiki']);
    }

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
     * @param Project $project
     * @param Wiki $wiki
     * @return $this
     */
    public function show(Project $project, Wiki $wiki)
    {
        return view('project.wiki.show', $this->wikiRepository->WikiResources($project))
            ->with(['project' => $project, 'wiki' => $wiki, 'selected' => 'wiki']);
    }

    /**
     * @param Project $project
     * @param Wiki $wiki
     * @return $this
     */
    public function edit(Project $project, Wiki $wiki)
    {
        return view('project.wiki.edit', $this->wikiRepository->WikiResources($project))
            ->with(['project' => $project, 'wiki' => $wiki, 'selected' => 'wiki']);
    }

    /**
     * @param WikiRequest $request
     * @param Project $project
     * @param Wiki $wiki
     * @return $this|\Illuminate\Http\RedirectResponse
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
     * @param Project $project
     * @param Wiki $wiki
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, Wiki $wiki)
    {
        /*if ($wiki->image != '') { TODO
            Storage::deleteDirectory('public/projects/'.$project->title);
        }*/

        if ($wiki->delete()) {
            return redirect()->to("project/$project->id/wiki")->with('status', trans('errors.delete-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.delete-failed'));
        }
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function first(Project $project)
    {
        $this->wikiRepository->FirstWiki($project)->save();

        return redirect()->back();
    }
}
