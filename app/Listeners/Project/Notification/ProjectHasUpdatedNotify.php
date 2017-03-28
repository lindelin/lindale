<?php

namespace App\Listeners\Project\Notification;

use App\Events\Project\ProjectUpdated;

class ProjectHasUpdatedNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectUpdated  $event
     * @return void
     */
    public function handle(ProjectUpdated $event)
    {
        //
    }
}
