<?php

namespace App\Http\Controllers\Settings;

use App\System\Contracts\ConfigSystem\UserConfigSystemContract;
use UserConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * 用户配置系统
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
        $result1 = $this->configSystem->set($request->user(), UserConfig::SLACK_NOTIFICATION_NO, $request->get(UserConfig::SLACK_NOTIFICATION_NO));
        $result2 = $this->configSystem->set($request->user(), UserConfig::SLACK_API_KEY, $request->get(UserConfig::SLACK_API_KEY));

        return response()->update($result1 and $result2);
    }
}
