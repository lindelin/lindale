<?php

namespace App\Http\Controllers\Project;

use App\Contracts\Repositories\NoticeRepositoryContract;
use App\Notice\Notice;
use App\Project\Project;
use App\Events\Project\NoticeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;

class NoticeController extends Controller
{
    /**
     * @var NoticeRepositoryContract
     */
    protected $noticeRepository;

    /**
     * NoticeController constructor.
     * @param NoticeRepositoryContract $noticeRepository
     */
    public function __construct(NoticeRepositoryContract $noticeRepository)
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
        return view('project.config.notice', $this->noticeRepository->projectNoticeResources($project))
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
        $notice = $this->noticeRepository->createNotice($request, $project);
        $this->authorize('create', [$notice, $project]);

        return response()->save($notice->save());
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

        return response()->update($this->noticeRepository->updateNotice($request, $project, $notice)->update());
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

        return response()->delete($notice->delete());
    }
}
