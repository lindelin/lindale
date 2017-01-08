<?php

namespace App\Events\Task;

use App\Task\Task;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskUpdated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * 任务.
     *
     * @var Task
     */
    public $task;

    /**
     * 用户.
     *
     * @var
     */
    public $user;

    /**
     * 创建事件监听器.
     *
     * TaskUpdated constructor.
     * @param Task $task
     * @param User $user
     */
    public function __construct(Task $task, User $user)
    {
        $this->task = $task;
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
