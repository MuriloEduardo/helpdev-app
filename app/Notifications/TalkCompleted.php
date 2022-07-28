<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TalkCompleted extends Notification
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
            ->subject('Ajuda concluida, mandaram bem!')
            ->line('Como se sente agora que resolveu aquela sua dúvida?')
            ->line('Massa né? Não esquece de contar pros seus amigos Devs também...')
            ->action('Ver pedidos de ajuda com minhas habilidades', route('posts.index'));
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
