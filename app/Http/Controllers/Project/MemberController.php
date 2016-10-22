<?php

namespace App\Http\Controllers\Project;

use App\Repositories\MemberRepository;
use App\User;
use Illuminate\Http\Request;
use App\Project\Project;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param Project $project
     * @return $this
     */
    public function index(Project $project)
    {
        return view('project.member.index', $this->memberRepository->MemberResources($project))
            ->with(['project' => $project, 'selected' => 'member']);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $this->authorize('member', [$project]);

        $result = $this->memberRepository->AddMember($request, $project);

        if ($result) {
            return redirect()->to('/project/'.$project->id.'/member')->with('status', trans('errors.add-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.add-failed'));
        }
    }

    /**
     * @param Request $request
     * @param Project $project
     * @param User $user
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Project $project, User $user)
    {
        $this->validate($request, [
            'project-pass' => 'required',
        ]);

        $this->authorize('update', [$project, $request]);

        $result = $this->memberRepository->RemoveMember($project, $user);

        if ($result) {
            return redirect()->to('/project/'.$project->id.'/member')->with('status', trans('errors.remove-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.remove-failed'));
        }
    }

    public function policy(Request $request, Project $project, User $user)
    {
        $this->authorize('member', [$project]);

        $result = $this->memberRepository->Policy($project, $user, $request);

        if ($result) {
            return redirect()->to('/project/'.$project->id.'/member')->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }
}
