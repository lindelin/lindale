<?php

namespace App\System\Contracts\ConfigSystem;

use App\Project\Project;

interface ProjectConfigSystemContract
{
    /**
     * 创建设置.
     * @param Project $project
     * @param $config_name
     * @param $config_value
     * @return mixed
     */
    public function set(Project $project, $config_name, $config_value);

    /**
     * 获得设置信息.
     * @param Project $project
     * @param $config_name
     * @return mixed
     */
    public function get(Project $project, $config_name);
}
