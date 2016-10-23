<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

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
     * @return $this
     */
    public function index(Request $request)
    {
        return view('home.index', $this->projectRepository->UserProjects($request->user()))->with('mode', 'home');
    }
}
