<?php

namespace App\Http\Controllers\Admin;

use App\Task\Task;
use App\Task\TaskComment;
use App\Task\TaskStatus;
use App\Task\TaskType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();
        $types = TaskType::all();

        return view('admin.task.index', [

            'tasks' => $tasks,
            'users' => $users,
            'types' => $types,

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

        $task->name = $request->get('name');
        $task->content = $request->get('content');
        $task->user_id = $request->get('user');
        $task->task_type_id = $request->get('type');
        $task->deadline = $request->get('deadline');

        if ($task->save()) {
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
        $users = User::all();
        $types = TaskType::all();
        $status = TaskStatus::all();

        return view('admin.task.show', [

            'users' => $users,
            'types' => $types,
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

        if (! Task::find($request->task_id)) {
            return redirect()->back()->withInput()->withErrors(trans('errors.comment-fail'));
        } elseif (TaskComment::create($request->all())) {
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
        TaskComment::where('task_id', '=', $id)->delete();
        Task::findOrFail($id)->delete();

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
        $task->task_type_id = $request->get('type');
        $task->user_id = $request->get('user');
        $task->task_status_id = $request->get('status');
        $task->content = $request->get('content');
        $task->progress = $request->get('progress');

        if ($task->save()) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors(trans('errors.update-fail'));
        }
    }
}
