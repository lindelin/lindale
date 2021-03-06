<?php

namespace App\Events\Todo;

use App\User;
use App\Todo\Todo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class TodoUpdated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * To-do.
     *
     * @var To-do
     */
    public $todo;

    /**
     * 用户.
     *
     * @var User
     */
    public $user;

    /**
     * 创建事件监听器.
     *
     * TodoCreated constructor.
     * @param To-do $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
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
