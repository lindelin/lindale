<?php

namespace App\Contracts\Repositories;

use App\Notice\Notice;
use App\Project\Project;

interface NoticeRepositoryContract
{
    /**
     * 项目通知资源.
     * @param Project $project
     * @return mixed
     */
    public function projectNoticeResources(Project $project);

    /**
     * Create Notice.
     * @param $request
     * @param Project $project
     * @return mixed
     */
    public function createNotice($request, Project $project);

    /**
     * Update Notice.
     * @param $request
     * @param Project $project
     * @param Notice $notice
     * @return mixed
     */
    public function updateNotice($request, Project $project, Notice $notice);
}
