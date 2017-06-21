<?php

namespace App\Tools\Checker;

use App\User;
use ProjectConfig;
use App\Project\Project;

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

    /**
     * @param User $user
     * @param $todo_type_id
     * @return bool
     */
    protected function userSlackNotify(User $user, $todo_type_id)
    {
        return (int) $todo_type_id === config('todo.public')
        and $user != null
        and user_config($user, config('config.user.slack')) == config('config.on')
        and user_config($user, config('config.user.key.slack')) != ''
        and user_config($user, config('config.user.key.slack')) != 'Null';
    }
}
