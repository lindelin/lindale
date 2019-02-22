<?php

namespace App\Notifications\Project\Task;

use App\Task\TaskActivity;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class TaskActivityHasCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var TaskActivity
     */
    public $taskActivity;

    /**
     * @var
     */
    public $locale;

    /**
     * Create a new notification instance.
     *
     * @param TaskActivity $taskActivity
     * @param $locale
     */
    public function __construct(TaskActivity $taskActivity, $locale)
    {
        //
        $this->taskActivity = $taskActivity;
        $this->locale = $locale;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Slack 通知.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        \App::setLocale($this->locale);

        return (new SlackMessage)
            ->success()
            ->content(trans('task.created-task-activity', ['name' => $this->taskActivity->User->name]))
            ->attachment(function ($attachment) {
                $attachment->title(
                    ':scroll:'.trans($this->taskActivity->Task->Type->name).'：'.$this->taskActivity->Task->title,
                    url('/project/'.$this->taskActivity->Task->Project->id.'/task/show/'.$this->taskActivity->Task->id)
                )
                    ->content($this->taskActivity->content);
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
