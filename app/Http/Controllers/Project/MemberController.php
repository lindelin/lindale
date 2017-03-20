<?php

namespace App\Http\Controllers\Project;

use App\Repositories\MemberRepository;
use App\User;
use Illuminate\Http\Request;
use App\Project\Project;
use App\Http\Controllers\Controller;

class MemberController extends Controller
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
     * MemberController constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * 项目成员页.
     *
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.member.index', $this->memberRepository->MemberResources($project))
            ->with(['project' => $project, 'selected' => 'member']);
    }

    /**
     * 添加成员.
     *
     * @param Request $request
     * @param Project $project
     * @return mixed
     */
    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $this->authorize('member', [$project]);

        $result = $this->memberRepository->AddMember($request, $project);

        return response()->add($result);
    }

    /**
     * 移除成员.
     *
     * @param Request $request
     * @param Project $project
     * @param User $user
     * @return mixed
     */
    public function destroy(Request $request, Project $project, User $user)
    {
        //TODO: 成员专用Request
        $this->validate($request, [
            'project-pass' => 'required',
        ]);

        $this->authorize('update', [$project, $request]);

        $result = $this->memberRepository->RemoveMember($project, $user);

        return response()->remove($result);
    }

    /**
     * 变更成员权限.
     *
     * @param Request $request
     * @param Project $project
     * @param User $user
     * @return mixed
     */
    public function policy(Request $request, Project $project, User $user)
    {
        $this->authorize('member', [$project]);

        $result = $this->memberRepository->Policy($project, $user, $request);

        return response()->update($result);
    }
}
