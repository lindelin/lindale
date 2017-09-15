<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
{
    public function index(Project $project)
    {
        return view('project.achievement.index')
            ->with(['project' => $project, 'selected' => 'achievement', 'mode' => 'overview']);
    }
}
