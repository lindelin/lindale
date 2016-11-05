<?php

namespace App\Repositories;

use App\Http\Requests\ProjectRequest;
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
     * 项目资源.
     *
     * @return array
     */
    public function ProjectResources($key = null)
    {
        if ($key == null) {
            $types = ProjectType::all();
            $users = User::all();
            $statuses = ProjectStatus::all();

            return compact('types', 'users', 'statuses');
        }
        if ($key == 'projects') {
            $projects = Project::latest()->get();

            return compact('projects');
        }
    }

    /**
     * 获取用户的项目资源.
     *
     * @param User $user
     * @return array
     */
    public function UserProjectResources(User $user)
    {
        $myProjects = Project::where('user_id', $user->id)->orWhere('sl_id', $user->id)->latest()->simplePaginate(6, ['*'], 'mPage');
        $userProjects = $user->Projects()->latest()->simplePaginate(6, ['*'], 'uPage');
        $userProjectCount = $this->UserProjectCount($user);

        return compact('myProjects', 'userProjectCount', 'userProjects');
    }

    /**
     * 获取用户项目.
     *
     * @param User $user
     * @return array
     */
    public function UserProjects(User $user)
    {
        $MProjects = Project::where('user_id', $user->id)->orWhere('sl_id', $user->id)->get();
        $JProjects = $user->Projects()->get();

        return compact('MProjects', 'JProjects');
    }

    /**
     * 创建项目方法.
     *
     * @param ProjectRequest $request
     * @return mixed
     */
    public function CreateProject(ProjectRequest $request)
    {
        $project = new Project();

        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id']);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $project->$key = $value;
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('projects/tmp', 'public');
            $project->image = $path;
        }

        $project->password = bcrypt($request->get('password'));

        $project->user_id = $request->user()->id;

        return $project;
    }

    /**
     * 更新项目方法.
     *
     * @param $request
     * @param Project $project
     * @return Project
     */
    public function UpdateProject($request, Project $project)
    {
        $input = $request->only(['title', 'content', 'start_at', 'end_at', 'type_id', 'sl_id', 'status_id']);

        if ($request->file('image')) {
            if ($project->image != '') {
                Storage::delete('public/'.$project->image);
            }
            $path = $request->file('image')->store('projects/'.$project->id, 'public');
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $result = Storage::move('public/'.$path, 'public/projects/'.$project->id.'/'.'icon'.'.'.$extension);
            if ($result) {
                $newPath = 'projects/'.$project->id.'/'.'icon'.'.'.$extension;
                $project->image = $newPath;
            }
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
     * 更新项目进度方法.
     *
     * @param $progress
     * @param Project $project
     */
    public function UpdateProjectProgress($progress, Project $project)
    {
        $project->progress = $progress;
        $project->update();
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
     * 获取用户项目的数量.
     *
     * @param User $user
     * @return mixed
     */
    private function UserProjectCount(User $user)
    {
        return ($user->MyProjects()->count()) + ($user->MySlProjects()->count()) + ($user->Projects()->count());
    }
}
