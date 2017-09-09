<?php

namespace App\Contracts\Repositories;


use App\Project\Project;
use App\User;

interface ProjectRepositoryContract
{
    /**
     * 项目资源.
     * @param null $key
     * @return mixed
     */
    public function ProjectResources($key = null);

    /**
     * 获取用户的项目资源.
     * @param User $user
     * @return mixed
     */
    public function UserProjectResources(User $user);

    /**
     * 获取用户主页的项目资源.
     * @param User $user
     * @return mixed
     */
    public function ProfileProjectResources(User $user);

    /**
     * 获取用户项目.
     * @param User $user
     * @return mixed
     */
    public function UserProjects(User $user);

    /**
     * 创建项目方法.
     * @param $request
     * @return mixed
     */
    public function CreateProject($request);

    /**
     * 更新项目方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function UpdateProject($request, Project $project);

    /**
     * 更新项目进度方法.
     * @param $progress
     * @param Project $project
     * @return mixed
     */
    public function UpdateProjectProgress($progress, Project $project);

    /**
     * 项目进展动态图.
     * @param Project $project
     * @return mixed
     */
    public function ProjectTopResources(Project $project);

    /**
     * 譲渡
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function Transfer($request, Project $project);
}