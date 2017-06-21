<?php

namespace App\System\Contracts\ConfigSystem;

use App\User;

interface UserConfigSystemContract
{

    /**
     * 创建设置.
     * @param User $user
     * @param $config_name
     * @param $config_value
     * @return mixed
     */
    public function set(User $user, $config_name, $config_value);

    /**
     * 获得设置信息.
     * @param User $user
     * @param $config_name
     * @return mixed
     */
    public function get(User $user, $config_name);

}