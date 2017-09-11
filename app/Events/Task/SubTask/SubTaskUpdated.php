<?php

namespace App\Events\Task\SubTask;

use App\User;
use App\Task\SubTask;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class SubTaskUpdated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * 附属任务.
     *
     * @var SubTask
     */
    public $subTask;

    /**
     * 用户.
     *
     * @var User
     */
    public $user;

    /**
     * 创建事件监听器.
     *
     * SubTaskUpdated constructor.
     * @param SubTask $subTask
     */
    public function __construct(SubTask $subTask)
    {
        $this->subTask = $subTask;
        $this->user = request()->user();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
