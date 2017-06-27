<?php

namespace App\Repositories;


use App\Http\Requests\NoticeRequest;
use App\Notice\Notice;
use App\Notice\NoticeType;
use App\Project\Project;
use Mockery\Matcher\Not;

class NoticeRepository
{
    protected $column = ['title', 'content', 'start_at', 'end_at', 'type_id'];

    /**
     * @param Project $project
     * @return array
     */
    public function ProjectNoticeResources(Project $project)
    {
        $notices = $project->Notices()->latest()->get();
        $noticeTypes = NoticeType::all();

        return compact('noticeTypes', 'notices');
    }

    public function CreateNotice($request, Project $project)
    {
        $notice = new Notice();

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

    public function UpdateNotice($request, Project $project,Notice $notice)
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