<?php

namespace App\Repositories;

use App\Project\ProjectStatus;
use App\User;
use App\Project\ProjectType;
use App\Project\Project;
use App\Wiki\Wiki;
use App\Wiki\WikiType;
use Illuminate\Support\Facades\Storage;

class ProjectRepository
{

    /**
     * 项目资源
     *
     * @return array
     */
    public function ProjectResources()
    {
        $types = ProjectType::all();
        $users = User::all();
        $statuses = ProjectStatus::all();

        return compact('types', 'users', 'statuses');
    }

    /**
     * 获取用户的项目
     *
     * @param User $user
     * @return array
     */
    public function UserProjects(User $user)
    {
        $userProjects = Project::where('user_id', $user->id)->orWhere('sl_id', $user->id)->get();
        $userProjectCont = $this->UserProjectCont($user);

        return compact('userProjects', 'userProjectCont');
    }

    /**
     * 创建项目方法
     *
     * @param $request
     * @param Project $project
     * @return Project
     */
    public function CreateProject($request, Project $project)
    {
        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $project->$key = $value;
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('projects/'.$project->id, 'public');
            $project->image = $path;
        }

        $project->password = bcrypt($request->get('password'));

        $project->user_id = $request->user()->id;

        return $project;
    }

    /**
     * 更新项目方法
     *
     * @param $request
     * @param Project $project
     * @return Project
     */
    public function UpdateProject($request, Project $project)
    {
        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id', 'status_id']);

        if ($request->file('image')) {
            $path = $request->file('image')->store('projects/'.$project->id, 'public');
            if ($project->image != '') {
                Storage::delete('public/'.$project->image);
            }
            $project->image = $path;
        }

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $project->$key = $value;
        }

        if ($request->get('password') != '') {
            $project->password = bcrypt($request->get('password'));
        }

        return $project;
    }

    /**
     * 删除项目相关内容.
     *
     * @param Project $project
     */
    public function DeleteProject(Project $project)
    {
        //TODO: 删除项目相关内容
        //删除项目目录
        if ($project->image != '') {
            Storage::deleteDirectory('public/projects/'.$project->id);
        }
        //删除项目WIKI
        Wiki::where('project_id', $project->id)->delete();
        //删除项目WIKI索引
        WikiType::where('project_id', $project->id)->delete();
    }

    /**
     * 获取用户项目的数量
     *
     * @param User $user
     * @return mixed
     */
    private function UserProjectCont(User $user)
    {
        return (Project::where('user_id', $user->id)->count()) + (Project::where('sl_id', $user->id)->count());
    }
}
