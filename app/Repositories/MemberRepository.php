<?php

namespace App\Repositories;

use App\Definer;
use App\Project\Project;
use App\User;
use Illuminate\Http\Request;

class MemberRepository
{
    /**
     * 项目成员资源.
     *
     * @param Project $project
     * @return array
     */
    public function MemberResources(Project $project)
    {
        $pl = $project->ProjectLeader;
        $sl = $project->SubLeader;
        $pms = $project->Users->all();
        $paCount = $project->Users()->where('is_admin', Definer::PROJECT_ADMIN)->count();
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

    /**
     * 获取所有成员.
     *
     * @param Project $project
     * @return array
     */
    public function AllMember(Project $project)
    {
        $pl = $project->ProjectLeader;
        $sl = $project->SubLeader;
        $pms = $project->Users->all();

        return compact('pl', 'sl', 'pms');
    }

    /**
     * 添加成员方法.
     *
     * @param Request $request
     * @param Project $project
     * @return bool
     */
    public function AddMember(Request $request, Project $project)
    {
        $user = User::findOrFail($request->get('id'));

        if ($project->Users()->find($user->id) != null) {
            return false;
        } elseif ($user->id === $project->user_id) {
            return false;
        } elseif ($user->id === $project->sl_id) {
            return false;
        } elseif ($user->id === Definer::SUPER_ADMIN_ID) {
            return false;
        } else {
            $project->Users()->attach($user);

            return true;
        }
    }

    /**
     * 移除成员方法.
     *
     * @param Project $project
     * @param User $user
     * @return bool
     */
    public function RemoveMember(Project $project, User $user)
    {
        if ($project->Users()->find($user->id) == null) {
            return false;
        } else {
            $project->Users()->detach($user);

            return true;
        }
    }

    /**
     * 成员认证方法.
     *
     * @param Project $project
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function Policy(Project $project, User $user, Request $request)
    {
        if ($project->Users()->find($user->id) == null) {
            return false;
        } elseif ($user->id === $project->user_id) {
            return false;
        } elseif ($user->id === $project->sl_id) {
            return false;
        } elseif ($user->id === Definer::SUPER_ADMIN_ID) {
            return false;
        } else {
            $pa = $project->Users()->findOrFail($user->id);
            $pa->pivot->is_admin = $request->get('policy');
            $pa->pivot->update();

            return true;
        }
    }
}
