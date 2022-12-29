<?php

namespace App\Notifications;

use http\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectAssigned extends Notification
{
    use Queueable;
    protected mixed $project;
    protected mixed $client;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project_details)
    {
        $this->project = $project_details[0];
        $this->client = $project_details[1];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        $url = url('user/' . $this->project->user_id . '/projects' );

        return (new MailMessage)
            ->greeting('Hey, there.')
            ->line('You have been assigned a project. Want to view the details? Click the button below.')
            ->action('Check Projects', $url)
            ->line('Let\'s get this done.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'client' => $this->client->name,
        ];
    }
}
