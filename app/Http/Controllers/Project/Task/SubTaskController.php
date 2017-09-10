<?php

namespace App\Http\Controllers\Project\Task;

use App\Contracts\Repositories\TaskRepositoryContract;
use App\Exceptions\StoreSubTaskException;
use App\Task\Task;
use App\Task\SubTask;
use App\Project\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTaskController extends Controller
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
     * 附属任务添加
     * TODO: 代码解耦.
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function store(Request $request, Project $project, Task $task)
    {
        // TODO: 改修　脆弱性
        if ($task->is_finish === config('task.unfinished')) {
            $this->validate($request, [
                'contents' => 'required',
            ]);

            try {
                $subTask = null;
                foreach ($request->get('contents') as $content) {
                    if ($content == '') {
                        continue;
                    }
                    $subTask = new SubTask();
                    $subTask->content = $content;
                    $subTask->task_id = $task->id;
                    if (!$subTask->save()) {
                        throw new StoreSubTaskException('Can not store Sub-Task.');
                    }
                }
                $result = true;
            } catch (StoreSubTaskException $exception) {
                $result = false;
            }

            return response()->save($result);

        } else {
            return redirect()->back()->withErrors(trans('errors.can-not-add-sub-task'));
        }
    }

    /**
     * 附属任务更新.
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @param SubTask $subTask
     * @return mixed
     */
    public function update(Request $request, Project $project, Task $task, SubTask $subTask)
    {
        // TODO: 安全隐患
        return response()->update($this->taskRepository->UpdateSubTask($request, $subTask)->update());
    }

    /**
     * 附属任务删除.
     *
     * @param Project $project
     * @param Task $task
     * @param SubTask $subTask
     * @param Request $request
     * @return mixed
     */
    public function destroy(Project $project, Task $task, SubTask $subTask, Request $request)
    {
        // TODO: 安全隐患
        return response()->delete($subTask->delete());
    }
}
