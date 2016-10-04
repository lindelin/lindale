<?php

namespace App\Http\Controllers\Project;

use App\Repositories\MemberRepository;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $this->authorize('addMember', [$project]);

        $result = $this->memberRepository->AddMember($request, $project);

        if ($result) {
            return redirect()->to('/project/'.$project->id.'/member')->with('status', trans('errors.add-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.add-failed'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
