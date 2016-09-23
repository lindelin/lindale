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


    public function WikiResources(Project $project)
    {
        $HomeWiki = $project->Wikis()->oldest()->first();
        $wikis = $project->Wikis()->get();
        $types = $project->WikiTypes()->get();
        $DefaultType = WikiType::findOrFail(1);

        return compact('wikis', 'HomeWiki', 'types', 'DefaultType');
    }

    /**
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
            $path = $request->file('image')->store("projects/$project->title/wiki", 'public');
            $wiki->image = $path;
        }

        return $wiki;
    }

    public function UpdateWiki(WikiRequest $request, Project $project, Wiki $wiki)
    {

        $input = $request->only(['title', 'content', 'type_id']);

        if ($request->file('image')) {
            $path = $request->file('image')->store("projects/$project->title/wiki", 'public');
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

    public function CreateWikiType(TypeRequest $request, Project $project)
    {
        $wikiType = new WikiType;

        $wikiType->name = $request->get('type_name');
        $wikiType->project_id = $project->id;

        return $wikiType;
    }
}