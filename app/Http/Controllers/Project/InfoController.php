<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\MemberRepository;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * InfoController constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
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
