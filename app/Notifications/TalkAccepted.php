<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TalkAccepted extends Notification
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
        return ['mail'];
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
            ->subject($this->talk->post->user->name . ' aceitou sua ajuda e já fez a garantia da recompensa!')
            ->line('Agora você já pode mostrar como resolver o problema, com segurança de que irá receber sua recompensa.')
            ->action('Comecem a trabalhar', route('talks.show', $this->talk))
            ->line('Obrigado por contribuir para nossa comunidade!');
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
            //
        ];
    }
}
