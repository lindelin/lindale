<?php

namespace App\Mail;

use App\Project\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectNotificationError extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Project
     */
    public $project, $locale;

    /**
     * ProjectNotificationError constructor.
     * @param Project $project
     */
    public function __construct(Project $project, $locale)
    {
        $this->project = $project;
        $this->locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \App::setLocale($this->locale);

        return $this->subject(trans('errors.send-slack-failed-mail'))
            ->cc(config('admin.system-notification.mail'))
            ->markdown('emails.notification.project-notification-error')
            ->with(['project' => $this->project]);
    }
}
