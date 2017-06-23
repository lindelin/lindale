<?php

namespace App\Exceptions;

use App\Exceptions\Notification\ProjectNotificationException;
use App\Exceptions\Notification\UserNotificationException;
use App\Mail\ProjectNotificationError;
use App\Mail\UserNotificationError;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Mail;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        ProjectNotificationException::class,
        UserNotificationException::class,
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
        if($exception instanceof ProjectNotificationException){
            return $this->projectNotificationExceptionHandler($request, $exception);
        } elseif ($exception instanceof UserNotificationException) {
            return $this->userNotificationExceptionHandler($request, $exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }

    /**
     * Project Slack 通知失敗処理
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
     * User Slack 通知失敗処理
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
