<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * 超级用户控制台.
     *
     * @return $this
     */
    public function index()
    {
        return view('admin.index')->with('mode', 'center');
    }
}
