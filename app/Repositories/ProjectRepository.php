<?php

namespace App\Repositories;

use App\Project\ProjectStatus;
use App\User;
use App\Project\ProjectType;
use App\Project\Project;
use Illuminate\Support\Facades\Storage;


class ProjectRepository
{
    /**
     * @return array
     */
    public function ProjectResources()
    {
        $types = ProjectType::all();
        $users = User::all();
        $statuses = ProjectStatus::all();

        return ['types' => $types, 'users' => $users, 'statuses' => $statuses];
    }

    /**
     * @param $request
     * @param Project $project
     * @return Project
     */
    public function CreateProject($request, Project $project)
    {
        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id']);

        foreach ($input as $key => $value){
            if($value == ""){
                continue;
            }
            $project->$key = $value;
        }

        if($request->file('image')){
            $path = $request->file('image')->store('projects/'.$project->title, 'public');
            $project->image = $path;
        }

        $project->password = bcrypt($request->get('password'));

        $project->user_id = $request->user()->id;

        return $project;
    }

    /**
     * @param $request
     * @param Project $project
     * @return Project
     */
    public function UpdateProject($request, Project $project)
    {
        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id', 'status_id']);

        if($request->file('image')){
            $path = $request->file('image')->store('projects/'.$project->title, 'public');
            if($project->image != ""){
                Storage::delete('public/'.$project->image);
            }
            $project->image = $path;
        }

        foreach ($input as $key => $value){
            if($value == ""){
                continue;
            }
            $project->$key = $value;
        }

        if($request->get('password') != ""){
            $project->password = bcrypt($request->get('password'));
        }

        return $project;

    }
}