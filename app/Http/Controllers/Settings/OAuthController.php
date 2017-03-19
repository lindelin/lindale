<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OAuthController extends Controller
{
    /**
     * 已授权应用
     *
     * @return mixed
     */
    public function authorized()
    {
        return view('settings.oauth.authorized')->with('mode', 'authorized');
    }
}
