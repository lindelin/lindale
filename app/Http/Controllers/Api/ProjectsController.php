<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProjectCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function resources(Request $request)
    {
        return new ProjectCollection($request->user()->MyProjects()->with([
            'ProjectLeader',
            'SubLeader'
        ])->get());
    }
}
