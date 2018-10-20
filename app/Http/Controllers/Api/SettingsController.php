<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * 言語&地区　設定
     * @return \Illuminate\Http\JsonResponse
     */
    public function locale()
    {
        return response()->json(['language' => user_config(request()->user(), config('config.user.lang'))], 200);
    }
}
