<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\AchievementRepositoryContract;
use App\Project\Evaluation;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
{
    /**
     * @var AchievementRepositoryContract
     */
    protected $achievementRepository;

    /**
     * AchievementController constructor.
     * @param AchievementRepositoryContract $achievementRepository
     */
    public function __construct(AchievementRepositoryContract $achievementRepository)
    {
        $this->achievementRepository = $achievementRepository;
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.achievement.index')
            ->with(['project' => $project, 'selected' => 'achievement', 'mode' => 'overview']);
    }

    /**
     * 未評価
     * @param Project $project
     * @return mixed
     */
    public function evaluation(Project $project)
    {
        return view('project.achievement.evaluation', $this->achievementRepository->evaluations($project))
            ->with(['project' => $project, 'selected' => 'achievement', 'mode' => 'evaluation']);
    }

    /**
     * 評価済
     * @param Project $project
     * @return mixed
     */
    public function closedEvaluation(Project $project)
    {
        return view('project.achievement.closed-evaluation', $this->achievementRepository->closedEvaluations($project))
            ->with(['project' => $project, 'selected' => 'achievement', 'mode' => 'evaluation']);
    }

    /**
     * 評価
     * @param Project $project
     * @param Evaluation $evaluation
     * @param Request $request
     * @return mixed
     */
    public function updateEvaluation(Project $project, Evaluation $evaluation, Request $request)
    {
        $this->validate($request, [
            'evaluation' => 'required|min:1|max:5|numeric'
        ]);

        $this->authorize('update', [$evaluation, $project]);

        return response()->update($this->achievementRepository->updateEvaluations($request, $evaluation));
    }

    public function member(Project $project)
    {
        return view('project.achievement.member')
            ->with(['project' => $project, 'selected' => 'achievement', 'mode' => 'member']);
    }
}
