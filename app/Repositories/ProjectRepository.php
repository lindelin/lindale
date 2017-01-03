<?php

namespace App\Repositories;

use App\Counter;
use App\Events\ProjectDeleted;
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
        if ($key == 'unfinished') {
            $projects = Project::where('progress', '<>', 100)->latest()->get();

            return compact('projects');
        }
        if ($key == 'finished') {
            $projects = Project::where('progress', 100)->latest()->get();

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
        $userProjectCount = Counter::UserProjectCount($user);

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
     * TODO: 需要调整（参照任务资源库）
     *
     * @param $progress
     * @param Project $project
     */
    public function UpdateProjectProgress($progress, Project $project)
    {
        $project->progress = $progress;
        $project->update();
    }
}
