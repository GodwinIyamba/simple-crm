<?php

namespace App\Events;

use App\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectAssignedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project, $client, $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project, $client, $user)
    {
        $this->project = $project;
        $this->client = $client;
        $this->user = $user;
    }

}
