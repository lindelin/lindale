<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\WikiRepositoryContract;
use App\Http\Requests\WikiRequest;
use App\Http\Resources\Project\WikiResource;
use App\Http\Resources\Project\WikiTypeResource;
use App\Project\Project;
use App\Wiki\Wiki;
use App\Wiki\WikiType;
use App\Http\Controllers\Controller;

class WikisController extends Controller
{
    /**
     * wiki資源契約
     * @var WikiRepositoryContract
     */
    protected $wikiRepository;

    /**
     * 依存性注入
     * WikisController constructor.
     */
    public function __construct(WikiRepositoryContract $wikiRepository)
    {
        $this->wikiRepository = $wikiRepository;
    }


    /**
     * Wiki 索引取得
     * @param Project $project
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function wikiTypes(Project $project)
    {
        $this->authorize('is_member', [$project]);

        return WikiTypeResource::collection(WikiType::whereProjectId($project->id)->orWhere('project_id', null)->get());
    }

    /**
     * Wikis タイプから取得
     * @param Project $project
     * @param WikiType $type
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function wikisByType(Project $project, WikiType $type)
    {
        $this->authorize('is_member', [$project]);

        return WikiResource::collection($project->Wikis()->typeFilter($type)->with([
            'User',
        ])->get());
    }

    /**
     * Wiki 1件取得
     * @param Wiki $wiki
     * @return WikiResource
     */
    public function show(Wiki $wiki)
    {
        return new WikiResource($wiki);
    }

    /**
     * Wiki 更新　API
     * @param WikiRequest $request
     * @param Wiki $wiki
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(WikiRequest $request, Wiki $wiki)
    {
        $this->authorize('is_member', [$wiki->project]);

        $this->wikiRepository->updateWiki($request, $wiki->project, $wiki)->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }

    /**
     * Wiki 作成　API
     * @param WikiRequest $request
     * @param Project $project
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(WikiRequest $request, Project $project)
    {
        $this->authorize('is_member', [$project]);

        $this->wikiRepository->createWiki($request, $project)->save();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.save-succeed')], 200);
    }
}
