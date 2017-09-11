<?php

namespace App\Contracts\Repositories;

use App\Project\Project;

interface ProgressRepositoryContract
{
    /**
     * 进展资源
     * @param Project $project
     * @return mixed
     */
    public function progressResources(Project $project);

    /**
     * ガントチャート.
     * @param Project $project
     * @return mixed
     */
    public function taskGanttChart(Project $project);

    /**
     * メンバー進捗.
     * @param Project $project
     * @return mixed
     */
    public function memberProgress(Project $project);

    /**
     * 任务进展
     * @param Project $project
     * @return mixed
     */
    public function taskProgress(Project $project);

    /**
     * To-do 进展
     * @param Project $project
     * @return mixed
     */
    public function todoProgress(Project $project);
}
