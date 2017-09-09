<?php

namespace App\Contracts\Repositories;


use App\Project\Project;
use App\User;

interface MemberRepositoryContract
{
    /**
     * 项目成员资源.
     * @param Project $project
     * @return mixed
     */
    public function memberResources(Project $project);

    /**
     * 获取所有成员.
     * @param Project $project
     * @return mixed
     */
    public function allMember(Project $project);

    /**
     * 添加成员方法.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function addMember($request, Project $project);

    /**
     * 移除成员方法.
     * @param Project $project
     * @param User $user
     * @return mixed
     */
    public function removeMember(Project $project, User $user);

    /**
     * 成员认证方法.
     * @param Project $project
     * @param User $user
     * @param $request
     * @return mixed
     */
    public function policy(Project $project, User $user, $request);
}