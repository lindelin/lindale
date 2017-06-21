<?php

namespace App;

use Config;
use App\Project\Project;
use App\System\ConfigSystem\ProjectConfigSystem;

class ProjectConfig
{
    /**
     * 开关定义.
     */
    const ON = 'on';
    const OFF = 'off';

    const NULL = 'Null';

    /**
     * 语言设定.
     */
    const LANG = 'project_lang';

    /**
     * Slack 设置项目.
     */
    const SLACK_API_KEY = 'slack_api_key'; //Api Key
    const SLACK_NOTIFICATION_NO = 'slack_notification'; //Slack通知设定

    /**
     * 获取设置信息.
     *
     * @param Project $project
     * @param $key
     * @return mixed
     */
    public static function get(Project $project, $key)
    {
        return self::getOrSetDefaultConfigInfo($project, $key);
    }

    /**
     * 获取设置信息或者设定默认设置信息.
     *
     * @param Project $project
     * @param $config_name
     * @return mixed
     */
    private static function getOrSetDefaultConfigInfo(Project $project, $config_name)
    {
        $system = new ProjectConfigSystem;

        $value = $system->get($project, $config_name);

        if ($value !== null or $value != '') {
            return $value;
        } else {
            $system->set($project, $config_name, self::getDefaultConfig($config_name));
            $value = $system->get($project, $config_name);

            return $value;
        }
    }

    /**
     * 获取默认设置.
     *
     * @param $key
     * @return mixed
     */
    private static function getDefaultConfig($key)
    {
        $default = [];
        //语言设定
        $default[self::LANG] = config('app.fallback_locale');
        //Slack 设置项目
        $default[self::SLACK_API_KEY] = self::NULL;
        $default[self::SLACK_NOTIFICATION_NO] = self::OFF;

        return $default[$key];
    }
}
