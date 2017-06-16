<?php

namespace App\Tools\Checker;


use App\Project\Project;
use ProjectConfig;

trait ConfigChecker
{
    /**
     * @param Project $project
     * @return bool
     */
    protected function projectSlackNotify(Project $project)
    {
        return ProjectConfig::get($project, ProjectConfig::SLACK_NOTIFICATION_NO) == ProjectConfig::ON and
            ProjectConfig::get($project, ProjectConfig::SLACK_API_KEY) != '' and
            ProjectConfig::get($project, ProjectConfig::SLACK_API_KEY) != 'Null';
    }
}