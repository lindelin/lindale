<?php

namespace App\Http\Controllers\Admin;

use App\Task\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        return view('admin.task.index')->withTasks(Task::all());
    }
}
