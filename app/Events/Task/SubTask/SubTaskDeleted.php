<?php

namespace App\Events\Task\SubTask;

use App\Task\SubTask;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SubTaskDeleted
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
     * SubTaskDeleted constructor.
     * @param SubTask $subTask
     * @param User $user
     */
    public function __construct(SubTask $subTask, User $user)
    {
        $this->subTask = $subTask;
        $this->user = $user;
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
