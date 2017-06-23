<?php

namespace App\Exceptions\Notification;

use App\Project\Project;

class ProjectNotificationException extends \Exception
{
    /**
     * プロジェクト.
     *
     * @var string
     */
    protected $project;

    /**
     * ProjectNotificationException constructor.
     * @param Project $project
     * @param string $message
     */
    public function __construct(Project $project, $message = 'Project notification error')
    {
        $this->project = $project;
        parent::__construct($message);
    }

    /**
     * プロジェクト取得.
     * @return string
     */
    final public function getProject()
    {
        return $this->project;
    }
}
