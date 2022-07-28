<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionCreated extends Notification
{
    use Queueable;

    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
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
        if (!$this->transaction->talk_id) {
            $subjet = 'Saldo adicionado';
            $content = 'Parabéns! Agora você já pode receber ajuda de forma rápida!!!';
            $amount = $this->transaction->amount;
        }

        if ($this->transaction->amount < 0) {
            $subjet = 'Pagamento descontado como garantia.';
            $content = 'Quantia descontada como garantia em ' . $this->transaction->talk->post->title . ' para ' . $this->transaction->talk->user->name;
            $amount = $this->transaction->talk->post->amount;
        }

        return (new MailMessage)
            ->subject($subjet)
            ->line($content)
            ->line('R$' . number_format($amount, 2, ',', '.'))
            ->line($this->transaction->created_at->diffForHumans())
            ->action('Conferir', route('transactions.index'))
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
