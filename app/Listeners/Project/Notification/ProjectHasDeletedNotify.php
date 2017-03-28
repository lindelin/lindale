<?php

namespace App\Listeners\Project\Notification;

use App\Events\Project\ProjectDeleted;

class ProjectHasDeletedNotify
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
     * @param  ProjectDeleted  $event
     * @return void
     */
    public function handle(ProjectDeleted $event)
    {
        //
    }
}
