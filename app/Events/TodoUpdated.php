<?php

namespace App\Events;

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
     * @var Todo
     */
    public $todo;

    /**
     * 创建事件监听器.
     *
     * TodoUpdated constructor.
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
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
