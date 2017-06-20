<?php

namespace App\Http\Controllers\Task;

use Definer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * 任务资源库.
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Index.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('task.index', $this->taskRepository->UserTaskResources($request->user()));
    }

    /**
     * 为完成的任务
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unfinished(Request $request)
    {
        return view('task.index', $this->taskRepository->UserTaskResources($request->user(), Definer::TASK_UNFINISHED));
    }

    /**
     * 完成的任务
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finished(Request $request)
    {
        return view('task.index', $this->taskRepository->UserTaskResources($request->user(), Definer::TASK_FINISHED));
    }
}
