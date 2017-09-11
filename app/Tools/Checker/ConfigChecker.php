<?php

namespace App\Tools\Checker;

use App\User;
use App\Project\Project;

trait ConfigChecker
{
    /**
     * @param Project $project
     * @return bool
     */
    protected function canNotifyTaskSlackToProject(Project $project)
    {
        return project_config($project, config('config.project.slack')) == config('config.on') and
            project_config($project, config('config.project.key.slack')) != '' and
            project_config($project, config('config.project.key.slack')) != 'Null';
    }

    /**
     * @param $user
     * @param $todo_type_id
     * @return bool
     */
    protected function canNotifyTodoSlackToUser($user, $todo_type_id)
    {
        return (int) $todo_type_id === config('todo.public')
        and $user != null
        and user_config($user, config('config.user.slack')) == config('config.on')
        and user_config($user, config('config.user.key.slack')) != ''
        and user_config($user, config('config.user.key.slack')) != 'Null';
    }

    /**
     * @param Project $project
     * @param $todo_type_id
     * @return bool
     */
    protected function canNotifyTodoSlackToProject(Project $project = null, $todo_type_id)
    {
        return (int) $todo_type_id === config('todo.public')
            and $project != null
            and project_config($project, config('config.project.slack')) == config('config.on')
            and project_config($project, config('config.project.key.slack')) != ''
            and project_config($project, config('config.project.key.slack')) != 'Null';
    }
}
