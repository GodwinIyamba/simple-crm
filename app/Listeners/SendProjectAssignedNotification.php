<?php

namespace App\Listeners;

use App\Events\ProjectAssignedEvent;
use App\Notifications\ProjectAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProjectAssignedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProjectAssignedEvent $event)
    {
        $user = $event->user;
        $client = $event->client;
        $project = $event->project;

        $user->notify(new ProjectAssigned([$project, $client]));
    }
}
