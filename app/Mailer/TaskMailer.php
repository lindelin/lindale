<?php

namespace App\Mailer;

use Mail;
use App\User;

class TaskMailer
{

    /**
     * @param User $user
     * @param $task
     */
    public function SentNewTaskInfo(User $user, $task)
    {
        Mail::queue(['html' => 'emails.tasks.create'], ['task' => $task], function ($message) use ($user) {
            $message->from('info-center@lindale.tk', 'Lindalë Information Center');
            $message->to($user->email, $user->name)->cc('kudouyoichi@gmail.com')->subject('Your Task!');
        });
    }

    /**
     * @param User $user
     * @param $task
     * @param $sender
     */
    public function SentTaskChangeInfo(User $user, $task, $sender)
    {
        Mail::queue(['html' => 'emails.tasks.change'], ['task' => $task, 'sender' => $sender], function ($message) use ($user, $sender) {
            $message->from('info-center@lindale.tk', 'Lindalë Information Center');
            $message->to($user->email, $user->name)->cc($sender->email)->subject($sender->name.'更新了你的任务');
        });
    }
}