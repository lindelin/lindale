<?php

namespace App\Events\Todo;

use App\Todo\Todo;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TodoCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * To-do.
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
     * 创建事件监听器.
     *
     * TodoCreated constructor.
     * @param Todo $todo
     * @param User $user
     */
    public function __construct(Todo $todo, User $user)
    {
        $this->todo = $todo;
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
