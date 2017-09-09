<?php

namespace App\Contracts\Repositories;


use App\Project\Project;
use App\Wiki\Wiki;
use App\Wiki\WikiType;

interface WikiRepositoryContract
{
    /**
     * 创建默认WIKI方法.
     * @param Project $project
     * @return mixed
     */
    public function firstWiki(Project $project);

    /**
     * WIKI资源.
     * @param Project $project
     * @return mixed
     */
    public function wikiResources(Project $project);

    /**
     * 创建WIKI方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function createWiki($request, Project $project);

    /**
     * 更新WIKI方法.
     * @param $request
     * @param Project $project
     * @param Wiki $wiki
     * @return mixed
     */
    public function updateWiki($request, Project $project, Wiki $wiki);

    /**
     * 创建WIKI索引方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function createWikiType($request, Project $project);

    /**
     * 更新WIKI索引方法.
     * @param $request
     * @param WikiType $wikiType
     * @return mixed
     */
    public function updateWikiType($request, WikiType $wikiType);
}