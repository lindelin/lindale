<?php

namespace App\Mail;

use App\Project\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectNotificationError extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Project
     */
    public $project;

    /**
     * ProjectNotificationError constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notification.project-notification-error')
            ->with(['project' => $this->project]);
    }
}
