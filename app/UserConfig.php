<?php

namespace App;


use App\System\ConfigSystem\UserConfigSystem;
use Config;

class UserConfig
{
    /**
     * 开关定义
     */
    const ON = 'on';
    const OFF = 'off';

    /**
     *
     */
    const NULL = 'Null';

    /**
     * 语言设定
     */
    const LANG = 'user_lang';

    /**
     * Slack 设置项目
     */
    const SLACK_API_KEY = 'slack_api_key'; //Api Key
    const SLACK_NOTIFICATION_NO = 'slack_notification'; //Slack通知设定

    /**
     * 获取设置信息
     *
     * @param User $user
     * @param $key
     * @return mixed
     */
    public static function get(User $user, $key)
    {
        return self::getOrSetDefaultConfigInfo($user, $key);
    }

    /**
     * 获取设置信息或者设定默认设置信息
     *
     * @param User $user
     * @param $config_name
     * @return mixed
     */
    private static function getOrSetDefaultConfigInfo(User $user, $config_name)
    {
        $system = new UserConfigSystem();

        $value = $system->getConfigInfo($user, $config_name);

        if($value !== null or $value != ''){
            return $value;
        }else{
            $system->setConfigInfo($user, $config_name, self::getDefaultConfig($config_name));
            $value = $system->getConfigInfo($user, $config_name);
            return $value;
        }
    }

    private static function getDefaultConfig($key)
    {
        $default = [];
        //语言设定
        $default[self::LANG] = Config::get('app.fallback_locale');
        //Slack 设置项目
        $default[self::SLACK_API_KEY] = self::NULL;
        $default[self::SLACK_NOTIFICATION_NO] = self::OFF;

        return $default[$key];
    }
}