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
        $lang = user_config(request()->user(), config('config.user.lang'));
        return response()->json([
            'language' => $lang,
            'language_name' => config('app.available_language.' . $lang),
            'options' => config('app.available_language'),
        ], 200);
    }
}
