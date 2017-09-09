<?php

namespace App\Contracts\Repositories;


use App\Project\Project;
use App\Task\SubTask;
use App\Task\Task;
use App\Task\TaskGroup;
use App\Task\TaskPriority;
use App\Task\TaskStatus;
use App\Task\TaskType;
use App\User;

interface TaskRepositoryContract
{
    /**
     * 任务资源.
     * @param Project $project
     * @param null $is_finish
     * @param TaskType|null $type
     * @param TaskPriority|null $priority
     * @param TaskStatus|null $status
     * @return mixed
     */
    public function TaskResources(Project $project, $is_finish = null, TaskType $type = null, TaskPriority $priority = null, TaskStatus $status = null);

    /**
     * 用户任务资源.
     * @param User $user
     * @param null $is_finish
     * @param Project|null $project
     * @param TaskPriority|null $priority
     * @return mixed
     */
    public function UserTaskResources(User $user, $is_finish = null, Project $project = null, TaskPriority $priority = null);

    /**
     * 任务详情资源.
     * @param Project $project
     * @param Task $task
     * @return mixed
     */
    public function TaskShowResources(Project $project, Task $task);

    /**
     * 任务（创建）资源.
     * @param Project $project
     * @return mixed
     */
    public function TaskCreateResources(Project $project);

    /**
     * 任务组资源.
     * @param Project $project
     * @return mixed
     */
    public function TaskGroupResources(Project $project);

    /**
     * 任务组（创建）资源.
     * @param Project $project
     * @return mixed
     */
    public function TaskGroupCreateResources(Project $project);

    /**
     * 创建任务方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function CreateTask($request, Project $project);

    /**
     * 更新任务方法.
     * @param $request
     * @param Task $task
     * @return mixed
     */
    public function UpdateTask($request, Task $task);

    /**
     * 创建任务组方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function CreateGroup($request, Project $project);

    /**
     * 更新任务组方法.
     * @param $request
     * @param TaskGroup $group
     * @return mixed
     */
    public function UpdateGroup($request, TaskGroup $group);

    /**
     * 更新附属任务方法.
     * @param $request
     * @param SubTask $subTask
     * @return mixed
     */
    public function UpdateSubTask($request, SubTask $subTask);

    /**
     * 创建任务动态方法.
     * @param $request
     * @param Task $task
     * @return mixed
     */
    public function CreateTaskActivity($request, Task $task);

    /**
     * 更新任务进度方法.
     * @param $progress
     * @param Task $task
     * @return mixed
     */
    public function UpdateTaskProgress($progress, Task $task);

    /**
     * サブチケット作成
     * @param $request
     * @param Task $task
     * @return mixed
     */
    public function createSubTask($request, Task $task);
}