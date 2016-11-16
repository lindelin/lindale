<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    /**
     * OAuth应用认证与授权
     *
     * @return $this
     */
    public function application()
    {
        return view('settings.developer.application')->with('mode', 'developer');
    }

    /**
     * 个人访问令牌
     *
     * @return $this
     */
    public function personal()
    {
        return view('settings.developer.personal')->with('mode', 'personal');
    }
}
