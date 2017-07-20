<?php

namespace App\Http\Controllers\Project;

use App\Project\Project;
use App\Http\Controllers\Controller;
use App\Repositories\ProgressRepository;
use App\Task\Task;
use DB;
use Swatkins\LaravelGantt\Gantt;

class ProgressController extends Controller
{
    protected $progressRepository;

    /**
     * ProgressController constructor.
     * @param ProgressRepository $progressRepository
     */
    public function __construct(ProgressRepository $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.progress.index', $this->progressRepository->ProgressResources($project))
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'overview']);
    }

    public function gantt(Project $project)
    {
        $select = 'title as label, DATE_FORMAT(start_at, \'%Y-%m-%d\') as start, 
        DATE_FORMAT(end_at, \'%Y-%m-%d\') as end, 
        if(is_finish = 1,\'success\',if(date(now()) > date(`end_at`),\'urgent\', if(date(now()) between date(`start_at`) and date(`end_at`),\'important\',\'no\'))) as class';
        $task = Task::select(DB::raw($select))
            ->orderBy('start', 'asc')
            ->orderBy('end', 'asc')
            ->get();

        $gantt = new Gantt($task->toArray(), [
            'title' => trans('header.tasks'),
        ]);

        return view('project.progress.gantt', [ 'gantt' => $gantt ])
            ->with(['project' => $project, 'selected' => 'progress', 'mode' => 'gantt']);
    }
}
