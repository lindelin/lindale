<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\MemberRepositoryContract;
use App\Project\Project;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * 项目成员资源库.
     * @var MemberRepositoryContract
     */
    protected $memberRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * InfoController constructor.
     * @param MemberRepositoryContract $memberRepository
     */
    public function __construct(MemberRepositoryContract $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * 个人主页.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        $this->authorize('member', [$project]);
        return view('project.info.index', $this->memberRepository->memberResources($project))
            ->with(['project' => $project, 'selected' => 'info']);
    }
}
