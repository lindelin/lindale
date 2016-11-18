<?php

namespace App\Notifications\Project\Todo;

use App\Todo\Todo;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class TodoHasDeleted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * To-do
     *
     * @var
     */
    public $todo_content;
    public $todo_user;
    public $todo_status;
    public $todo_created;
    public $todo_project;
    public $todo_list;

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
     * TodoHasDeleted constructor.
     * @param User $user
     * @param $locale
     * @param $todo_content
     * @param $todo_user
     * @param $todo_status
     * @param $todo_created
     * @param $todo_project
     * @param $todo_list
     */
    public function __construct(User $user, $locale, $todo_content, $todo_user, $todo_status, $todo_created, $todo_project, $todo_list)
    {
        $this->user = $user;
        $this->locale = $locale;
        $this->todo_content = $todo_content;
        $this->todo_user = $todo_user;
        $this->todo_status = $todo_status;
        $this->todo_created = $todo_created;
        $this->todo_project = $todo_project;
        $this->todo_list = $todo_list;
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
            ->error()
            ->content(trans('todo.deleted-todo', ['name' => $this->user->name]))
            ->attachment(function ($attachment) {
                $attachment->title(':clipboard:'.$this->todo_content, url('/project/'.$this->todo_project.'/todo'))
                    ->fields([
                        trans('todo.user') => $this->todo_user,
                        trans('todo.todo-list') => $this->todo_list,
                        trans('todo.status') => trans($this->todo_status),
                        trans('todo.created') => $this->todo_created,
                    ]);
            });
    }
}
