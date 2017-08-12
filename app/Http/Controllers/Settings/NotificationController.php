<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\Contracts\ConfigSystem\UserConfigSystemContract;

class NotificationController extends Controller
{
    /**
     * 用户�
     * �置系统
     *
     * @var UserConfigSystemContract
     */
    protected $configSystem;

    /**
     * 构造器.
     *
     * LocaleController constructor.
     * @param UserConfigSystemContract $configSystem
     */
    public function __construct(UserConfigSystemContract $configSystem)
    {
        $this->configSystem = $configSystem;
    }

    /**
     * 通知.
     *
     * @return mixed
     */
    public function notification()
    {
        return view('settings.notification.index')->with(['mode' => 'notification']);
    }

    /**
     * Slack通知更新.
     *
     * @param Request $request
     * @return mixed
     */
    public function updateNotification(Request $request)
    {
        $result1 = $this->configSystem->set($request->user(), config('config.user.slack'), $request->get(config('config.user.slack')));
        $result2 = $this->configSystem->set($request->user(), config('config.user.key.slack'), $request->get(config('config.user.key.slack')));

        return response()->update($result1 and $result2);
    }
}
