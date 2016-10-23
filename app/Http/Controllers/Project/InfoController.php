<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\MemberRepository;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * 项目成员资源库.
     *
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * 构造器
     * 通过DI获取资源库.
     *
     * InfoController constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
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
        return view('project.info.index')
            ->with($this->memberRepository->MemberResources($project))
            ->with(['project' => $project, 'selected' => 'info']);
    }
}
