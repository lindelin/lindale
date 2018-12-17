<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Apple App Site Association
     * @return \Illuminate\Http\JsonResponse
     */
    public function appleAppSiteAssociation()
    {
        return response()->json([
            'webcredentials' => [
                'apps' => [
                    'QDZ72V563C.org.lindelin.lindale-ios',
                ]
            ]
        ], 200);
    }
}
