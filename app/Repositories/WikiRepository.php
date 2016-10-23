<?php

namespace App\Repositories;

use App\Http\Requests\TypeRequest;
use App\Http\Requests\WikiRequest;
use App\Project\Project;
use App\Wiki\Wiki;
use App\Wiki\WikiType;
use Illuminate\Support\Facades\Storage;

class WikiRepository
{
    /**
     * 创建默认WIKI方法
     *
     * @param Project $project
     * @return Wiki
     */
    public function FirstWiki(Project $project)
    {
        $wiki = new Wiki();
        $wiki->title = $project->title.' Wiki';
        $wiki->user_id = $project->user_id;
        $wiki->project_id = $project->id;

        return $wiki;
    }

    /**
     * WIKI资源
     *
     * @param Project $project
     * @return array
     */
    public function WikiResources(Project $project)
    {
        $HomeWiki = $project->Wikis()->oldest()->first();
        $wikis = $project->Wikis()->get();
        $types = $project->WikiTypes()->get();
        $DefaultType = WikiType::findOrFail(1);

        return compact('wikis', 'HomeWiki', 'types', 'DefaultType');
    }

    /**
     * 创建WIKI方法
     *
     * @param WikiRequest $request
     * @param Project $project
     * @return Wiki
     */
    public function CreateWiki(WikiRequest $request, Project $project)
    {
        $wiki = new Wiki();

        $input = $request->only(['title', 'content', 'type_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $wiki->$key = $value;
        }
        $wiki->user_id = $project->user_id;
        $wiki->project_id = $project->id;

        if ($request->file('image')) {
            $path = $request->file('image')->store("projects/$project->id/wiki", 'public');
            $wiki->image = $path;
        }

        return $wiki;
    }

    /**
     * 更新WIKI方法
     *
     * @param WikiRequest $request
     * @param Project $project
     * @param Wiki $wiki
     * @return Wiki
     */
    public function UpdateWiki(WikiRequest $request, Project $project, Wiki $wiki)
    {
        $input = $request->only(['title', 'content', 'type_id']);

        if ($request->file('image')) {
            $path = $request->file('image')->store("projects/$project->id/wiki", 'public');
            if ($wiki->image != '') {
                Storage::delete('public/'.$wiki->image);
            }
            $wiki->image = $path;
        }

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $wiki->$key = $value;
        }

        return $wiki;
    }

    /**
     * 创建WIKI索引方法
     *
     * @param TypeRequest $request
     * @param Project $project
     * @return WikiType
     */
    public function CreateWikiType(TypeRequest $request, Project $project)
    {
        $wikiType = new WikiType;

        $wikiType->name = $request->get('type_name');
        $wikiType->project_id = $project->id;

        return $wikiType;
    }
}
