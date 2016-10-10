<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @return $this
     */
    public function index()
    {
        return view('admin.index')->with('mode', 'center');
    }
}
