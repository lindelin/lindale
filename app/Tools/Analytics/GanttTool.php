<?php

namespace App\Tools\Analytics;

use App\Task\Task;
use Carbon\Carbon;
use App\Task\SubTask;
use App\Task\TaskGroup;
use App\Project\Project;

trait GanttTool
{
    /**
     * Gantt JSON Data.
     * @param Project $project
     * @return string
     */
    public function ganttData(Project $project)
    {
        $taskGroups = $project->TaskGroups()
            ->where('start_at', '<>', '')
            ->where('end_at', '<>', '')
            ->get();
        $data = [];
        $link = [];
        foreach ($taskGroups as $group) {
            if (! $group->start_at and ! $group->end_at) {
                continue;
            }
            $data[] = $this->taskGroupDataMapping($group);
            if ($group->Tasks->count() > 0) {
                $tasks = $group->Tasks()
                    ->where('start_at', '<>', '')
                    ->where('end_at', '<>', '')
                    ->get();
                foreach ($tasks as $task) {
                    if ((! $task->start_at) and (! $task->end_at)) {
                        continue;
                    } else {
                        $data[] = $this->taskDataMapping($project, $group, $task);
                        $link[] = $this->linkDataMapping($group, $task);
                    }
                    if ($task->SubTasks->count() > 0) {
                        foreach ($task->SubTasks as $subTask) {
                            $data[] = $this->subTaskDataMapping($task, $subTask);
                            $link[] = $this->subLinkDataMapping($task, $subTask);
                        }
                    }
                }
            }
        }

        $tasks = collect($data)->toJson();
        $links = collect($link)->toJson();

        return compact('tasks', 'links');
    }

    /**
     * チケットグループデータマッピング.
     * @param TaskGroup $group
     * @return array
     */
    protected function taskGroupDataMapping(TaskGroup $group)
    {
        $data = [];
        $data['id'] = 'g_'.$group->id;
        $data['text'] = $group->title;
        $data['start_date'] = $group->start_at->format('d-m-Y');
        $data['duration'] = $group->start_at->diffInDays($group->end_at);
        $data['progress'] = trans_progress(\Calculator::TaskGroupProgressCompute($group));
        $data['user'] = trans('task.group');
        $data['task_type'] = 999;
        $data['work_type'] = trans($group->Type->name);
        $data['open'] = trans_task_group_status_for_gantt($group->status_id);

        return $data;
    }

    /**
     * チケットデータマッピング.
     * @param Project $project
     * @param TaskGroup $group
     * @param Task $task
     * @return array
     */
    protected function taskDataMapping(Project $project, TaskGroup $group, Task $task)
    {
        $data = [];
        $data['id'] = 't_'.$task->id;
        $data['text'] = '<a href="'.route('task.show', compact('project', 'task')).'">'.$task->title.'</a>';
        $data['start_date'] = $task->start_at->format('d-m-Y');
        $data['duration'] = $task->start_at->diffInDays($task->end_at);
        $data['progress'] = trans_progress($task->progress);
        $data['user'] = $task->User ? $task->User->name : trans('project.none');
        $data['open'] = false;
        $data['task_type'] = $this->taskTypeMapping($task);
        $data['work_type'] = trans($task->Type->name);
        $data['parent'] = 'g_'.$group->id;

        return $data;
    }

    /**
     * チケットデータマッピング.
     * @param Task $task
     * @param SubTask $subTask
     * @return array
     * @internal param Project $project
     * @internal param TaskGroup $group
     */
    protected function subTaskDataMapping(Task $task, SubTask $subTask)
    {
        $data = [];
        $data['id'] = 's_'.$subTask->id;
        $data['text'] = $subTask->content;
        $data['start_date'] = $task->start_at->format('d-m-Y');
        $data['duration'] = $task->start_at->diffInDays($task->end_at);
        $data['progress'] = trans_progress($task->progress);
        $data['user'] = $task->User ? $task->User->name : trans('project.none');
        $data['open'] = false;
        $data['task_type'] = $this->taskTypeMapping($task);
        $data['work_type'] = trans('task.sub-task');
        $data['parent'] = 't_'.$task->id;

        return $data;
    }

    /**
     * @param TaskGroup $group
     * @param Task $task
     * @return array
     */
    protected function linkDataMapping(TaskGroup $group, Task $task)
    {
        $data = [];
        $data['source'] = 'g_'.$group->id;
        $data['target'] = 't_'.$task->id;
        $data['type'] = 1;

        return $data;
    }

    /**
     * @param Task $task
     * @param SubTask $subTask
     * @return array
     * @internal param TaskGroup $group
     */
    protected function subLinkDataMapping(Task $task, SubTask $subTask)
    {
        $data = [];
        $data['source'] = 't_'.$task->id;
        $data['target'] = 's_'.$subTask->id;
        $data['type'] = 2;

        return $data;
    }

    /**
     * @param Task $task
     * @return int
     */
    private function taskTypeMapping(Task $task)
    {
        if ($task->is_finish === config('task.finished')) {
            return (int) 200;
        } elseif (Carbon::now()->between($task->start_at, $task->end_at, false)) {
            return (int) 755;
        } elseif (Carbon::parse($task->end_at)->lt(Carbon::now())) {
            return (int) 777;
        } else {
            return (int) 300;
        }
    }
}
