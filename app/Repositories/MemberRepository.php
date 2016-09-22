<?php

namespace App\Repositories;


use App\Project\Project;

class MemberRepository
{
    public function MemberResources(Project $project)
    {
        $pl = $project->ProjectLeader;
        $sl = $project->SubLeader;

        return compact('pl', 'sl');
    }
}