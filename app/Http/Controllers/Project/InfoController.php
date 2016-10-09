<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Repositories\MemberRepository;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function index(Project $project)
    {
        return view('project.info.index')
            ->with($this->memberRepository->MemberResources($project))
            ->with(['project' => $project, 'selected' => 'info']);
    }
}
