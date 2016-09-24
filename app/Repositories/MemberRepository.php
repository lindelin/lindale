<?php

namespace App\Repositories;

use App\Project\Project;

class MemberRepository
{
    public function MemberResources(Project $project)
    {
        $pl = $project->ProjectLeader;
        $sl = $project->SubLeader;
        $pms = $project->Users->all();

        return compact('pl', 'sl', 'pms');
    }
}
