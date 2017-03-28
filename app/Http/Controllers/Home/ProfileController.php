<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Repositories\ProjectRepository;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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

    public function show(User $user)
    {
        return view('home.profile', $this->projectRepository->ProfileProjectResources($user));
    }
}
