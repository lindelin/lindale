<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\System\ConfigSystem\UserConfigSystem;
use App\UserConfig;

class NotificationController extends Controller
{
    /**
     * 用户配置系统
     *
     * @var UserConfigSystem
     */
    protected $configSystem;


    /**
     * 构造器
     *
     * LocaleController constructor.
     * @param UserConfigSystem $userConfigSystem
     */
    public function __construct(UserConfigSystem $userConfigSystem)
    {
        $this->configSystem = $userConfigSystem;
    }

    /**
     * 通知
     *
     * @return mixed
     */
    public function notification()
    {
        return view('settings.notification.index')->with(['mode' => 'notification']);
    }

    /**
     * Slack通知更新
     *
     * @param Request $request
     * @return mixed
     */
    public function updateNotification(Request $request)
    {
        $result1 = $this->configSystem->setConfigInfo($request->user(), UserConfig::SLACK_NOTIFICATION_NO, $request->get(UserConfig::SLACK_NOTIFICATION_NO));
        $result2 = $this->configSystem->setConfigInfo($request->user(), UserConfig::SLACK_API_KEY, $request->get(UserConfig::SLACK_API_KEY));

        if ($result1 and $result2) {
            return redirect()->back()->with('status', trans('errors.update-succeed'));
        } else {
            return redirect()->back()->withErrors(trans('errors.update-failed'));
        }
    }
}
