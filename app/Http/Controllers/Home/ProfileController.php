<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\User;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
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
     * ユーザプロフィール
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('home.profile', $this->projectRepository->ProfileProjectResources($user));
    }
}
