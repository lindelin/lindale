<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        //项目事件
        'App\Events\Project\ProjectCreated' => [
            'App\Listeners\Project\MakeProjectDirectory',
            'App\Listeners\Project\Notification\ProjectHasCreatedNotify',
        ],
        'App\Events\Project\ProjectUpdated' => [
            'App\Listeners\Project\Notification\ProjectHasUpdatedNotify',
        ],
        'App\Events\Project\ProjectDeleted' => [
            'App\Listeners\Project\DeleteProjectInfo',
            'App\Listeners\Project\Notification\ProjectHasDeletedNotify',
        ],

        //お知らせ
        'App\Events\Project\NoticeEvent' => [
            'App\Listeners\Project\Notification\SendNotice',
        ],

        //To-do事件
        'App\Events\Todo\TodoCreated' => [
            'App\Listeners\Todo\Notification\TodoHasCreatedNotify',
        ],
        'App\Events\Todo\TodoUpdated' => [
            'App\Listeners\Todo\Notification\TodoHasUpdatedNotify',
        ],
        'App\Events\Todo\TodoDeleted' => [
            'App\Listeners\Todo\Notification\TodoHasDeletedNotify',
        ],

        //任务事件
        'App\Events\Task\TaskCreated' => [
            'App\Listeners\Task\Notification\TaskHasCreatedNotify',
        ],
        'App\Events\Task\TaskUpdated' => [
            'App\Listeners\Task\Notification\TaskHasUpdatedNotify',
        ],
        'App\Events\Task\TaskDeleted' => [
            'App\Listeners\Task\Notification\TaskHasDeletedNotify',
        ],

        //任务动态事件
        'App\Events\Task\TaskActivity\TaskActivityCreated' => [
            'App\Listeners\Task\Notification\TaskActivityHasCreatedNotify',
        ],

        //用户事件
        'App\Events\User\UserCreated' => [
            'App\Listeners\User\SendInviteMail',
        ],

    ];

    protected $subscribe = [
        'App\Listeners\TaskProgressEventListener',
        'App\Listeners\ProjectProgressEventListener',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
