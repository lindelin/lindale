<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{
    public function index(Project $project)
    {
        return view('project.progress.index')->with(['project' => $project, 'selected' => 'progress']);
    }
}
