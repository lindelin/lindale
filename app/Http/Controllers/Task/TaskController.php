<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Repositories\TaskRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * 任务资源库.
     * @var TaskRepositoryContract
     */
    protected $taskRepository;

    /**
     * 构造器
     * 注入资源.
     *
     * TaskGroupController constructor.
     * @param TaskRepositoryContract $taskRepository
     */
    public function __construct(TaskRepositoryContract $taskRepository)
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
        return view('task.index', $this->taskRepository->UserTaskResources($request->user(), config('task.unfinished')));
    }

    /**
     * 完成的任务
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finished(Request $request)
    {
        return view('task.index', $this->taskRepository->UserTaskResources($request->user(), config('task.finished')));
    }
}
