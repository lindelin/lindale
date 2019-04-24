<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\Project\Project;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * 项目资源库.
     * @var ProjectRepositoryContract
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * HomeController constructor.
     * @param ProjectRepositoryContract $projectRepository
     */
    public function __construct(ProjectRepositoryContract $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * 个人主页.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('home.index')->with('mode', 'home');
    }

    /**
     * 我的项目.
     *
     * @param Request $request
     * @return mixed
     */
    public function project(Request $request)
    {
        return view('home.project', $this->projectRepository->UserProjectResources($request->user()))->with('mode', 'project');
    }

    /**
     * お気に入り追加
     * @return mixed
     */
    public function addFavorites()
    {
        $project = Project::findOrFail(request('project_id'));
        $this->authorize('is_member', [$project]);
        try {
            request()->user()->favorites()->attach($project);
            $result = true;
        } catch (QueryException $exception) {
            $result = false;
        }

        return response()->update($result);
    }

    /**
     * お気に入り削除
     * @return mixed
     */
    public function removeFavorites()
    {
        $project = Project::findOrFail(request('project_id'));
        $this->authorize('is_member', [$project]);
        try {
            request()->user()->favorites()->detach($project);
            $result = true;
        } catch (QueryException $exception) {
            $result = false;
        }

        return response()->update($result);
    }
}
