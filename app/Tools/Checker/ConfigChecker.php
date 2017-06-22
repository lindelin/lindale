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
        return project_config($project, config('config.project.slack')) == config('config.on') and
            project_config($project, config('config.project.key.slack')) != '' and
            project_config($project, config('config.project.key.slack')) != 'Null';
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
