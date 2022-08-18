<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TalkCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $talk;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($talk)
    {
        $this->talk = $talk;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Ei Dev!')
            ->subject('Opa, ' . $this->talk->user->name . ' disse que saberia te ajudar a resolver!')
            ->line('Conversem tranquilamente, mas você só será descontado quando escolher aquele Dev que melhor irá resolver sua questão.')
            ->action('Ver conversa', route('talks.show', $this->talk));
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
            'talk_id' => $this->talk->id,
        ];
    }
}
