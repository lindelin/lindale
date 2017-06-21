<?php

namespace App\Notifications\Project\Task;

use App\User;
use App\Counter;
use Definer;
use App\Task\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class TaskHasUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Task.
     *
     * @var Task
     */
    public $task;

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
     * 注入依赖.
     *
     * TaskHasUpdated constructor.
     * @param Task $task
     * @param User $user
     * @param $locale
     */
    public function __construct(Task $task, User $user, $locale)
    {
        $this->task = $task;
        $this->user = $user;
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
            ->warning()
            ->content(trans('task.updated-task', ['name' => $this->user->name]))
            ->attachment(function ($attachment) {
                $attachment->title(':scroll:'.trans($this->task->Type->name).'：'.$this->task->title, url('/project/'.$this->task->Project->id.'/task/show/'.$this->task->id))
                    ->fields([
                        trans('task.user') => $this->task->User ? $this->task->User->name : trans('project.none'),
                        trans('task.cost') => $this->task->cost ? $this->task->cost.trans('task.hour') : trans('project.none'),
                        trans('task.status') => $this->task->is_finish === config('task.finished') ? trans('task.finish') : trans($this->task->Status->name),
                        trans('task.progress') => (int) $this->task->progress.'%',
                        trans('task.group') => $this->task->Group ? $this->task->Group->title : trans('project.none'),
                        trans('task.priority') => trans($this->task->Priority->name),
                        trans('task.start_at') => $this->task->start_at ? $this->task->start_at : trans('project.none'),
                        trans('task.end_at') => $this->task->end_at ? $this->task->end_at : trans('project.none'),
                        trans('todo.updated') => (string) $this->task->updated_at,
                        trans('todo.created') => (string) $this->task->created_at,
                    ])
                    ->content(Counter::SubTaskCount($this->task).'　'.trans('task.sub-task').'（'.Counter::FinishedSubTasks($this->task).' - '.trans('task.finish').'，'.
                        Counter::UnfinishedSubTasks($this->task).' - '.trans('task.unfinished').'）');
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
