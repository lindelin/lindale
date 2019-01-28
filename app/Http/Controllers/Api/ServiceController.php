<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LanguageResource;
use App\Models\User\Device;
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
            'token' => 'required',
            'name' => 'required',
            'type' => 'required',
            'revoked' => 'required',
        ]);

        Device::updateOrCreate(['token' => $request->input('token')], [
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'revoked' => $request->input('revoked'),
        ]);

        return response()->json(['status' => 'OK', 'messages' => trans('errors.save-succeed')], 200);
    }

    public function langSync(Request $request)
    {
        return new LanguageResource($request->user());
    }
}
