<?php

namespace App\Listeners\Project\Notification;

use Mail;
use Carbon\Carbon;
use App\Mail\SendNoticeMail;
use App\Events\Project\NoticeEvent;

class SendNotice
{
    /**
     * Handle the event.
     *
     * @param  NoticeEvent  $event
     * @return void
     */
    public function handle(NoticeEvent $event)
    {
        if (Carbon::today()->between($event->notice->start_at, $event->notice->end_at) and $event->notice->Project->Users->count() > 0) {
            Mail::to($event->notice->Project->Users)
                ->send(new SendNoticeMail($event->notice, project_config($event->notice->Project, config('config.project.lang'))));
        }
    }
}
