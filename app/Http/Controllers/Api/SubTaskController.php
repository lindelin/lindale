<?php

namespace App\Http\Controllers\Api;

use App\Task\SubTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTaskController extends Controller
{
    /**
     * SubTask 更新
     * @param Request $request
     * @param SubTask $subTask
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, SubTask $subTask)
    {
        $this->validate($request, [
            'is_finish' => 'required|boolean',
        ]);

        $subTask->is_finish = $request->input('is_finish');
        $subTask->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }
}
