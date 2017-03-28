<?php
/**
 * Created by PhpStorm.
 * User: lindale
 * Date: 2016/11/23
 * Time: 22:50.
 */

namespace App\System\ConfigSystem;

use App\User;
use App\Settings\UserSettings;

class UserConfigSystem
{
    /**
     * 获得设置信息.
     *
     * @param User $user
     * @param $config_name
     * @return mixed
     */
    public function getConfigInfo(User $user, $config_name)
    {
        return $user->Config()->where('config_name', $config_name)->pluck('config_value')->first();
    }

    /**
     * 创建设置.
     *
     * @param User $user
     * @param $config_name
     * @param $config_value
     * @return mixed
     */
    public function setConfigInfo(User $user, $config_name, $config_value)
    {
        return UserSettings::updateOrCreate(['config_name' => $config_name, 'user_id' => $user->id], ['config_value' => $config_value]);
    }
}
