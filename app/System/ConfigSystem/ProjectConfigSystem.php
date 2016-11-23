<?php
/**
 * Created by PhpStorm.
 * User: lindale
 * Date: 2016/11/19
 * Time: 22:19
 */

namespace App\System\ConfigSystem;


use App\Project\Project;
use App\Settings\ProjectSettings;

class ProjectConfigSystem
{
    /**
     * 获得设置信息
     *
     * @param Project $project
     * @param $config_name
     * @return mixed
     */
    public function getConfigInfo(Project $project, $config_name)
    {
        return $project->Config()->where('config_name', $config_name)->pluck('config_value')->first();
    }

    /**
     * 创建设置
     *
     * @param Project $project
     * @param $config_name
     * @param $config_value
     * @return bool
     */
    public function setConfigInfo(Project $project, $config_name, $config_value)
    {
        return ProjectSettings::updateOrCreate(['config_name' => $config_name, 'project_id' => $project->id], ['config_value' => $config_value]);
    }
}