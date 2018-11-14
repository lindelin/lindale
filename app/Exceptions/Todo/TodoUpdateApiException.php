<?php

namespace App\Exceptions\Todo;

class TodoUpdateApiException extends \Exception
{
    /**
     * 已完成待办
     * @throws TodoUpdateApiException
     */
    public static function hasFinished()
    {
        throw new self(trans('todo.has-finished-todo'));
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