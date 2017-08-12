<?php

namespace App\Events\Project;

use App\Project\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProjectUpdated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * 项目实例.
     * @var Project
     */
    public $project;

    /**
     * 注�
     * �项目实例
     * ProjectCreated constructor.
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
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
