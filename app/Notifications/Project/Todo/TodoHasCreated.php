<?php

namespace App\Notifications\Project\Todo;

use App\Todo\Todo;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class TodoHasCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * To-do
     *
     * @var Todo
     */
    public $todo;

    /**
     * 用户
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
     * 资源注入
     *
     * TodoHasCreated constructor.
     * @param Todo $todo
     * @param User $user
     * @param $locale
     */
    public function __construct(Todo $todo, User $user, $locale)
    {
        $this->todo = $todo;
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
     * Slack 通知
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        \App::setLocale($this->locale);
        return (new SlackMessage)
            ->success()
            ->content(trans('todo.created-todo', ['name' => $this->user->name]))
            ->attachment(function ($attachment) {
                $attachment->title(':clipboard:'.$this->todo->content, url('/project/'.$this->todo->Project->id.'/todo'))
                    ->fields([
                        trans('todo.user') => $this->todo->User ? $this->todo->User->name : trans('project.none'),
                        trans('todo.todo-list') => $this->todo->TodoList ? $this->todo->TodoList->title : trans('project.none'),
                        trans('todo.status') => trans($this->todo->Status->name),
                        trans('todo.created') => (string)$this->todo->created_at,
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