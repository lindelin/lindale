<?php

namespace App\Http\Controllers\Admin;

use App\Task\Task;
use App\Task\TaskComment;
use App\Task\TaskStatus;
use App\Task\TaskType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Mailer\TaskMailer;

class TaskController extends Controller
{
    /**
     * 任务资源库的实例。
     * タスクリポジトリのインスタント作成
     *
     * @var TaskRepository
     */
    protected $taskRepository;

    /**
     * 邮件服务实例。
     * メーラーのインスタント作成
     *
     * @var TaskMailer
     */
    protected $mailer;

    /**
     * 创建新的控制器实例。
     * タスクコントローラのインスタンス作成
     *
     * TaskController constructor.
     * @param TaskRepository $taskRepository
     * @param TaskMailer $mailer
     */
    public function __construct(TaskRepository $taskRepository, TaskMailer $mailer)
    {
        $this->taskRepository = $taskRepository;
        $this->mailer = $mailer;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tasks = Task::latest()->paginate(10);
        $users = User::all();
        $types = TaskType::all();

        return view('admin.task.index', [

            'userTasks' => $this->taskRepository->UserTasks($request->user()),
            'tasks'     => $tasks,
            'users'     => $users,
            'types'     => $types,

        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:30',
            'content'  => 'required|max:255',
        ]);

        $task = new Task();

        $task->name         = $request->get('name');
        $task->content      = $request->get('content');
        $task->user_id      = $request->get('user');
        $task->task_type_id = $request->get('type');
        $task->deadline     = $request->get('deadline');

        if ($task->save()) {

            $task = Task::findOrFail($task->id);
            $user = User::findOrFail($task->user_id);
            $this->mailer->SentNewTaskInfo($user, $task);

            return redirect('admin/task');
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.save-fail'));
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $users  = User::all();
        $types  = TaskType::all();
        $status = TaskStatus::all();

        return view('admin.task.show', [

            'users'    => $users,
            'types'    => $types,
            'statuses' => $status,

        ])->withTask(Task::with('Type', 'Status', 'User', 'Comments')->findOrFail($id));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request)
    {
        $this->validate($request, [
            'content'  => 'required|max:255',
        ]);

        if (! Task::findOrFail($request->task_id)) {
            return redirect()->back()->withInput()->withErrors(trans('errors.comment-fail'));
        } elseif (TaskComment::create($request->all())) {

            $task   = Task::findOrFail($request->task_id);
            $user   = User::findOrFail($task->user_id);
            $sender = $request->user();
            $this->mailer->SentTaskChangeInfo($user, $task, $sender);

            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.comment-fail'));
        }
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('destroy', $task);
        TaskComment::where('task_id', '=', $id)->delete();
        $task->delete();

        return redirect()->to('admin/task')->withInput()->withErrors(trans('errors.delete-success'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content'  => 'required|max:255',
        ]);

        $task = Task::findOrFail($id);
        $this->authorize('update', $task);

        $task->task_type_id   = $request->get('type');
        $task->user_id        = $request->get('user');
        $task->task_status_id = $request->get('status');
        $task->content        = $request->get('content');
        $task->progress       = $request->get('progress');

        if ($task->save()) {
            $task = Task::findOrFail($task->id);
            $user = User::findOrFail($task->user_id);
            $sender = $request->user();
            $this->mailer->SentTaskChangeInfo($user, $task, $sender);
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.update-fail'));
        }
    }
}
