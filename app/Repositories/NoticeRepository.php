<?php

namespace App\Repositories;

use App\Contracts\Repositories\NoticeRepositoryContract;
use App\Notice\Notice;
use App\Project\Project;
use App\Notice\NoticeType;

class NoticeRepository implements NoticeRepositoryContract
{
    /**
     * @var array
     */
    protected $column = ['title', 'content', 'start_at', 'end_at', 'type_id'];

    /**
     * 项目通知资源.
     * @param Project $project
     * @return array
     */
    public function projectNoticeResources(Project $project)
    {
        $notices = $project->Notices()->latest()->get();
        $noticeTypes = NoticeType::all();

        return compact('noticeTypes', 'notices');
    }

    /**
     * Create Notice.
     * @param $request
     * @param Project $project
     * @return Notice
     */
    public function createNotice($request, Project $project)
    {
        $notice = new Notice();

        $input = $request->all($this->column);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $notice->$key = $value;
        }

        $notice->project_id = $project->id;
        $notice->user_id = $request->user()->id;

        return $notice;
    }

    /**
     * Update Notice.
     * @param $request
     * @param Project $project
     * @param Notice $notice
     * @return Notice
     */
    public function updateNotice($request, Project $project, Notice $notice)
    {
        $input = $request->only($this->column);

        foreach ($input as $key => $value) {
            if ($value == '') {
                continue;
            }
            $notice->$key = $value;
        }

        $notice->project_id = $project->id;
        $notice->user_id = $request->user()->id;

        return $notice;
    }
}
