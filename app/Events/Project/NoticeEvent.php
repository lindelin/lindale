<?php

namespace App\Events\Project;

use App\Notice\Notice;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NoticeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Notice
     */
    public $notice;

    /**
     * Notice constructor.
     * @param \App\Notice\Notice $notice
     */
    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
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
