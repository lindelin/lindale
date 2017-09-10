<?php

namespace App\Events\Task;

use App\User;
use App\Task\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class TaskCreated
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
     * TaskCreated constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
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
