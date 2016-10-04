<?php

namespace App\Repositories;

use App\Definer;
use App\Project\Project;
use App\User;
use Illuminate\Http\Request;

class MemberRepository
{
    public function MemberResources(Project $project)
    {
        $pl = $project->ProjectLeader;
        $sl = $project->SubLeader;
        $pms = $project->Users->all();
        $pmCount = $project->Users->count();
        $allCount = $pmCount;
        if($pl){
            $allCount += 1;
        }
        if($sl){
            $allCount += 1;
            $slCount = 1;
        }else{
            $slCount = 0;
        }
        $users = User::all();

        return compact('pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users');
    }

    public function AddMember(Request $request, Project $project)
    {
        $user = User::findOrFail($request->get('id'));

        if($project->Users()->find($user->id) != null){
            return false;
        }else if($user->id === $project->user_id){
            return false;
        }else if($user->id === $project->sl_id) {
            return false;
        }else if($user->id === Definer::getSuperAdminId()){
                return false;
        }else{
            $project->Users()->attach($user);
            return true;
        }
    }
}
