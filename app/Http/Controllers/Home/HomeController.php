<?php

namespace App\Http\Controllers\Home;

use App\Contracts\Repositories\ProjectRepositoryContract;
use App\Project\Project;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Home.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Projects.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function projects()
    {
        return view('home.projects');
    }

    /**
     * Tasks.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasks()
    {
        return view('home.tasks');
    }

    /**
     * Todos.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function todos()
    {
        return view('home.todos');
    }
}
