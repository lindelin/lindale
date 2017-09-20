<?php

namespace App\Repositories;

use App\Contracts\Repositories\AchievementRepositoryContract;
use App\Project\Evaluation;
use App\Project\Project;

class AchievementRepository implements AchievementRepositoryContract
{

    /**
     * 评价表资源.
     * @param Project $project
     * @return mixed
     */
    public function achievementResources(Project $project)
    {
        // TODO: Implement achievementResources() method.
    }

    /**
     * 评价表.
     * @param Project $project
     * @return mixed
     */
    public function evaluations(Project $project)
    {
        $evaluations = $project->evaluations()->where('is_closed', config('task.unfinished'))->get();

        return compact('evaluations');
    }

    /**
     * 完成评价表.
     * @param Project $project
     * @return mixed
     */
    public function closedEvaluations(Project $project)
    {
        $evaluations = $project->evaluations()->where('is_closed', config('task.finished'))->get();

        return compact('evaluations');
    }

    /**
     * 更新评价表.
     * @param $request
     * @param Evaluation $evaluation
     * @return mixed
     */
    public function updateEvaluations($request, Evaluation $evaluation)
    {
        $evaluation->evaluation = $request->evaluation;
        $evaluation->reviewer_id = $request->user()->id;
        $evaluation->is_closed = config('task.finished');

        return $evaluation->update();
    }
}
