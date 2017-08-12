<?php

namespace App\Notifications\Project\Task;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class TaskHasDeleted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * 任务信息.
     *
     * @var
     */
    public $task_title;
    public $task_user;
    public $task_created_at;

    /**
     * 用户.
     *
     * @var User
     */
    public $user;

    /**
     * 语言信息.
     *
     * @var
     */
    public $locale;

    /**
     * 注�
     * �依赖.
     *
     * TaskHasDeleted constructor.
     * @param User $user
     * @param $locale
     * @param $task_title
     * @param $task_user
     * @param $task_created_at
     */
    public function __construct(User $user, $locale, $task_title, $task_user, $task_created_at)
    {
        $this->user = $user;
        $this->locale = $locale;
        $this->task_title = $task_title;
        $this->task_user = $task_user;
        $this->task_created_at = $task_created_at;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['Slack'];
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
            ->error()
            ->content(trans('task.deleted-task', ['name' => $this->user->name]))
            ->attachment(function ($attachment) {
                $attachment->title(':scroll:'.trans('header.tasks').'：'.$this->task_title)
                    ->fields([
                        trans('task.user') => $this->task_user ? $this->task_user->name : trans('project.none'),
                        trans('task.created') => $this->task_created_at ? $this->task_created_at : trans('project.none'),
                    ]);
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
