<?php

namespace App\Listeners\Project\Notification;

use App\Events\Project\NoticeEvent;
use App\Tools\Facades\FCM;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PushNotice implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NoticeEvent  $event
     * @return void
     */
    public function handle(NoticeEvent $event)
    {
        $event->notice->load([
            'Project' => function ($query) {
                $query->with(['Users']);
            },
            'Type',
        ]);

        app()->setLocale(project_config($event->notice->Project, config('config.project.lang')));

        $users = $event->notice->Project->Users
            ->push($event->notice->Project->ProjectLeader)
            ->when($event->notice->Project->SubLeader, function ($collection) use ($event) {
                $collection->push($event->notice->Project->SubLeader);
            })
        ;

        FCM::to($users)
            ->title($event->notice->Project->title)
            ->subtitle(trans('errors.send-slack-failed-message'))
            ->messages('【'.trans($event->notice->Type->name).'】'.$event->notice->title)
            ->send();
    }
}
