<?php

namespace App\Http\Controllers\Web;

use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(Project $project, $section = 'dashboard')
    {
        $this->authorize('is_member', [$project]);

        return view('project.index', compact('project', 'section'));
    }
}
