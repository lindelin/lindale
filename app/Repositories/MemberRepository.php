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
        $paCount = $project->Users()->where('is_admin', Definer::projectAdmin())->count();
        $pmCount = $project->Users->count() - $paCount;
        $allCount = $pmCount + $paCount;
        if ($pl) {
            $allCount += 1;
        }
        if ($sl) {
            $allCount += 1;
            $slCount = 1;
        } else {
            $slCount = 0;
        }
        $users = User::all();

        return compact('pl', 'sl', 'pms', 'pmCount', 'allCount', 'slCount', 'users', 'paCount');
    }

    public function AddMember(Request $request, Project $project)
    {
        $user = User::findOrFail($request->get('id'));

        if ($project->Users()->find($user->id) != null) {
            return false;
        } elseif ($user->id === $project->user_id) {
            return false;
        } elseif ($user->id === $project->sl_id) {
            return false;
        } elseif ($user->id === Definer::getSuperAdminId()) {
            return false;
        } else {
            $project->Users()->attach($user);

            return true;
        }
    }

    public function RemoveMember(Project $project, User $user)
    {
        if ($project->Users()->find($user->id) == null) {
            return false;
        } elseif ($user->id === $project->user_id) {
            return false;
        } elseif ($user->id === $project->sl_id) {
            return false;
        } elseif ($user->id === Definer::getSuperAdminId()) {
            return false;
        } else {
            $project->Users()->detach($user);

            return true;
        }
    }

    public function Policy(Project $project, User $user, Request $request)
    {
        if ($project->Users()->find($user->id) == null) {
            return false;
        } elseif ($user->id === $project->user_id) {
            return false;
        } elseif ($user->id === $project->sl_id) {
            return false;
        } elseif ($user->id === Definer::getSuperAdminId()) {
            return false;
        } else {
            $pa = $project->Users()->findOrFail($user->id);
            $pa->pivot->is_admin = $request->get('policy');
            $pa->pivot->update();
            return true;
        }
    }
}
