<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;

class HomeController extends Controller
{
    /**
     * 项目资源库.
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * HomeController constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
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
        return view('home.index', $this->projectRepository->UserProjectResources($request->user()))->with('mode', 'home');
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
}
