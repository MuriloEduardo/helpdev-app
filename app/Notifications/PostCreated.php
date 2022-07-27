<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
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
        $formattedTags = $this->post->tags->implode('title', ', ');

        return (new MailMessage)
            ->subject('Ei Dev! ' . $this->post->user->name . ' está precisando de uma ajudinha...')
            ->line('Veja o que esta sendo dito:')
            ->line($this->post->title)
            ->line('Esta sendo oferecido: R$' . number_format($this->post->amount, 2, ',', '.') . ' como recompensa.')
            ->line('Tecnologias envolvidas:')
            ->line($formattedTags)
            ->action('Posso ajudar', route('posts.show', $this->post))
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
            'post_id' => $this->post->id,
            'user_id' => $this->post->user_id,
        ];
    }
}
