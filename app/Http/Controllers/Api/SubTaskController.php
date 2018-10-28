<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Task\TaskUpdateApiException;
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
     * @throws TaskUpdateApiException
     */
    public function update(Request $request, SubTask $subTask)
    {
        if ($subTask->Task->is_finish === config('task.finished')) {
            TaskUpdateApiException::canNotEdit();
        }

        $this->validate($request, [
            'is_finish' => 'required|boolean',
        ]);

        $subTask->is_finish = $request->input('is_finish');
        $subTask->update();

        return response()->json(['status' => 'OK', 'messages' => trans('errors.update-succeed')], 200);
    }
}
