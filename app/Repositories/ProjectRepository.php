<?php

namespace App\Repositories;

use Carbon\Carbon;
use Image;
use Charts;
use Counter;
use App\User;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectRepository
{
    /**
     * 项目资源.
     * @param null $key
     * @return array
     */
    public function ProjectResources($key = null)
    {
        if ($key == null) {
            $users = User::all();

            return compact('users');
        }
        if ($key == 'projects') {
            $projects = Project::orderBy('progress', 'asc')->latest()->Paginate(6);

            return compact('projects');
        }
        if ($key == 'unfinished') {
            $projects = Project::where('progress', '<>', 100)->orderBy('progress', 'asc')->latest()->Paginate(6);

            return compact('projects');
        }
        if ($key == 'finished') {
            $projects = Project::where('progress', 100)->latest()->Paginate(6);

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
        $myProjects = Project::where('user_id', $user->id)
            ->orWhere('sl_id', $user->id)
            ->orderBy('progress', 'asc')
            ->latest()
            ->simplePaginate(6, ['*'], 'mPage');

        $userProjects = $user->Projects()
            ->orderBy('progress', 'asc')
            ->latest()
            ->simplePaginate(6, ['*'], 'uPage');

        $userProjectCount = Counter::UserProjectCount($user);
        $userProgressAreaspline = $this->UserProgressAreaspline($user);

        return compact('myProjects', 'userProjects', 'userProjectCount', 'userProgressAreaspline');
    }

    /**
     * @param User $user
     * @return array
     */
    public function ProfileProjectResources(User $user)
    {
        $userProgressAreaspline = $this->UserProgressAreaspline($user);

        return compact('userProgressAreaspline', 'user');
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
            Image::make(storage_path().'/app/public/'.$path)->resize(600, 600)->save(storage_path().'/app/public/'.$path);
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
                Image::make(storage_path().'/app/public/'.$newPath)->resize(600, 600)->save(storage_path().'/app/public/'.$newPath);
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
     * TODO: 需要调整（参照任务资源库）.
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
     * 项目进展动态图.
     *
     * @param Project $project
     * @return array
     */
    public function ProjectTopResources(Project $project)
    {
        $projectActivity = Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $project->Tasks()->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $project->Tasks()->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $project->Todos()->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $project->Todos()->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->lastByDay(7, true)
            ->view('vendor.consoletvs.charts.highcharts.multi.areaspline');

        $today = Carbon::today()->toDateString();
        $notices = $project->Notices()->where('start_at', '<=', $today)->where('end_at', '>=', $today)->latest()->get();

        return compact('projectActivity', 'notices');
    }

    /**
     * 譲渡
     * @param Request $request
     * @param Project $project
     * @return Project
     */
    public function Transfer(Request $request, Project $project)
    {
        $project->user_id = $request->get('id');

        return $project;
    }

    /**
     * 用户进展动态图.
     *
     * @param User $user
     * @return mixed
     */
    private function UserProgressAreaspline(User $user)
    {
        return Charts::multiDatabase('areaspline', 'highcharts')
            ->title(trans('progress.status'))
            ->dataset(trans('progress.new-task'), $user->Tasks()->select('created_at')->get())
            ->dataset(trans('progress.finished-task'), $user->Tasks()->select('updated_at AS created_at')->where('is_finish', true)->get())
            ->dataset(trans('progress.new-todo'), $user->Todos()->select('created_at')->get())
            ->dataset(trans('progress.finished-todo'), $user->Todos()->select('updated_at AS created_at')->where('status_id', 2)->get())
            ->colors(['#008bfa', '#ff2321', '#ff8a00', '#00a477'])
            ->elementLabel(trans('progress.count'))
            ->responsive(true)
            ->lastByDay(7, true)
            ->view('vendor.consoletvs.charts.highcharts.multi.areaspline');
    }
}
