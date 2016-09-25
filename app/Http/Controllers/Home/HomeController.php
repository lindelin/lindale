<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        return view('home.home',$this->projectRepository->UserProjects($request->user()))->with('mode', 'home');
    }
}
