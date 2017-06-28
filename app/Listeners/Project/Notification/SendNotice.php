<?php

namespace App\Listeners\Project\Notification;

use App\Events\Project\NoticeEvent;
use App\Mail\SendNoticeMail;
use Carbon\Carbon;
use Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
