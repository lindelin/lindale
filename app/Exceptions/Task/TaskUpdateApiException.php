<?php

namespace App\Exceptions\Task;

class TaskUpdateApiException extends \Exception
{
    /**
     * 編集禁止
     * @throws TaskUpdateApiException
     */
    public static function canNotEdit()
    {
        throw new self(trans('errors.can-not-edit-task'));
    }

    /**
     * 担当者のないチケットを完了することができません。
     * @throws TaskUpdateApiException
     */
    public static function canNotFinishNoneUserTask()
    {
        throw new self(trans('task.can-not-finish-none-user-task'));
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json(['status' => 'NG', 'messages' => $this->getMessage()], 200);
    }
}