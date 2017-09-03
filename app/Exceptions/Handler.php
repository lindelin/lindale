<?php

namespace App\Exceptions;

use Mail;
use Exception;
use App\Mail\UserNotificationError;
use App\Mail\ProjectNotificationError;
use Illuminate\Auth\AuthenticationException;
use App\Exceptions\Notification\UserNotificationException;
use App\Exceptions\Notification\ProjectNotificationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        ProjectNotificationException::class,
        UserNotificationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ProjectNotificationException) {
            return $this->projectNotificationExceptionHandler($request, $exception);
        } elseif ($exception instanceof UserNotificationException) {
            return $this->userNotificationExceptionHandler($request, $exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Project Slack 通知失敗処理.
     * @param $request
     * @param ProjectNotificationException $exception
     * @return mixed
     */
    protected function projectNotificationExceptionHandler($request, ProjectNotificationException $exception)
    {
        info($exception->getMessage(), ['project' => $exception->getProject()->id]);
        Mail::to($exception->getProject()->ProjectLeader)
            ->send(new ProjectNotificationError($exception->getProject(), project_config($exception->getProject(), config('config.project.lang'))));

        return redirect()->back()->withErrors(trans('errors.send-slack-failed'));
    }

    /**
     * User Slack 通知失敗処理.
     * @param $request
     * @param UserNotificationException $exception
     * @return mixed
     */
    protected function userNotificationExceptionHandler($request, UserNotificationException $exception)
    {
        info($exception->getMessage(), ['user' => $exception->getUser()->id]);
        Mail::to($exception->getUser())
            ->send(new UserNotificationError($exception->getUser(), config('config.user.lang')));

        return redirect()->back()->withErrors(trans('errors.send-slack-failed'));
    }
}
