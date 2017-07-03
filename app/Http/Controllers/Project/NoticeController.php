<?php

namespace App\Http\Controllers\Project;

use App\Notice\Notice;
use App\Project\Project;
use App\Events\Project\NoticeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Repositories\NoticeRepository;

class NoticeController extends Controller
{
    /**
     * @var NoticeRepository
     */
    private $noticeRepository;

    /**
     * NoticeController constructor.
     * @param NoticeRepository $noticeRepository
     */
    public function __construct(NoticeRepository $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }

    /**
     * Index.
     * @param Project $project
     * @return mixed
     */
    public function index(Project $project)
    {
        return view('project.config.notice', $this->noticeRepository->ProjectNoticeResources($project))
            ->with(['project' => $project, 'selected' => 'config', 'mode' => 'notice']);
    }

    /**
     * Store.
     * @param NoticeRequest $request
     * @param Project $project
     * @return mixed
     */
    public function store(NoticeRequest $request, Project $project)
    {
        $notice = $this->noticeRepository->CreateNotice($request, $project);
        $this->authorize('create', [$notice, $project]);
        $result = $notice->save();
        if ($result) {
            event(new NoticeEvent($notice));
        }

        return response()->save($result);
    }

    /**
     * Update.
     * @param NoticeRequest $request
     * @param Project $project
     * @param Notice $notice
     * @return mixed
     */
    public function update(NoticeRequest $request, Project $project, Notice $notice)
    {
        $this->authorize('update', [$notice, $project]);
        $result = $this->noticeRepository->UpdateNotice($request, $project, $notice)->update();

        return response()->update($result);
    }

    /**
     * Delete.
     * @param Project $project
     * @param Notice $notice
     * @return mixed
     */
    public function destroy(Project $project, Notice $notice)
    {
        $this->authorize('delete', [$notice, $project]);
        $result = $notice->delete();

        return response()->delete($result);
    }
}