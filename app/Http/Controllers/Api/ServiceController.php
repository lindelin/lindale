<?php

namespace App\Http\Controllers\Api;

use App\Models\User\DeviceToken;
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

    /**
     * Device Token 保存 API
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function storeDeviceToken(Request $request)
    {
        $this->validate($request, [
            'device_token' => 'required'
        ]);

        DeviceToken::updateOrCreate(['device_token' => $request->input('device_token')], [
            'user_id' => $request->user()->id
        ]);

        return response()->json(['status' => 'OK', 'messages' => trans('errors.save-succeed')], 200);
    }
}
