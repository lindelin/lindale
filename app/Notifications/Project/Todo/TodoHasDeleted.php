<?php

namespace App\Notifications\Project\Todo;

use App\User;
use App\Todo\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class TodoHasDeleted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * To-do.
     *
     * @var
     */
    public $todo_content;
    public $todo_created;

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
     * 资源注入.
     *
     * TodoHasDeleted constructor.
     * @param User $user
     * @param $locale
     * @param $todo_content
     * @param $todo_created
     */
    public function __construct(User $user, $locale, $todo_content, $todo_created)
    {
        $this->user = $user;
        $this->locale = $locale;
        $this->todo_content = $todo_content;
        $this->todo_created = $todo_created;
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
            ->content(trans('todo.deleted-todo', ['name' => $this->user->name]))
            ->attachment(function ($attachment) {
                $attachment->title(':clipboard:TODO：'.$this->todo_content)
                    ->fields([
                        trans('todo.created') => $this->todo_created ? $this->todo_created : trans('project.none'),
                    ]);
            });
    }
}
