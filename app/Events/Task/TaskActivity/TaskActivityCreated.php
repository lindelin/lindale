<?php

namespace App\Events\Task\TaskActivity;

use App\Task\TaskActivity;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskActivityCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var TaskActivity
     */
    public $taskActivity;

    /**
     * TaskActivityCreated constructor.
     * @param TaskActivity $taskActivity
     */
    public function __construct(TaskActivity $taskActivity)
    {
        $this->taskActivity = $taskActivity;
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
