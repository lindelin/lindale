<?php

namespace App\Contracts\Repositories;

use App\Project\Evaluation;
use App\Project\Project;

interface AchievementRepositoryContract
{
    /**
     * 成果资源.
     * @param Project $project
     * @return mixed
     */
    public function achievementResources(Project $project);

    /**
     * 评价表.
     * @param Project $project
     * @return mixed
     */
    public function evaluations(Project $project);

    /**
     * 完成评价表.
     * @param Project $project
     * @return mixed
     */
    public function closedEvaluations(Project $project);

    /**
     * 更新评价表.
     * @param $request
     * @param Evaluation $evaluation
     * @return mixed
     */
    public function updateEvaluations($request, Evaluation $evaluation);
}
