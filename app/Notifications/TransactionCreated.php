<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionCreated extends Notification implements ShouldQueue
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
        if (!$this->transaction->talk_id) {
            $subjet = 'Saldo adicionado';
            $content = 'Parabéns! Agora você já pode receber ajuda de forma rápida!!!';
        } elseif ($this->transaction->amount < 0) {
            $subjet = 'Pagamento descontado como garantia.';
            $content = 'Quantia descontada como garantia em ' . $this->transaction->talk->post->title . ' para ' . $this->transaction->talk->user->name;
        } else {
            $subjet = 'Daleeeeee!!! Sua recompensa de ' . 'R$' . number_format($this->transaction->talk->post->amount, 2, ',', '.') . ' já está na sua conta 🤑';
            $content = 'Você mandou muito bem ao ajudar ' . $this->transaction->talk->post->user->name . '! Agora quando você estiver em apuros, travado, precisando de ajuda com código, você pode usar essa quantia para pedir ajuda de alguém também.';
        }

        return (new MailMessage)
            ->greeting('Ei Dev!')
            ->subject($subjet)
            ->line($content)
            ->line('R$' . number_format($this->transaction->amount, 2, ',', '.'))
            ->line($this->transaction->created_at->diffForHumans())
            ->action('Conferir', route('transactions.index'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $post_id = null;

        if ($this->transaction->talk) {
            $post_id = $this->transaction->talk->post_id;
        }

        return [
            'post_id' => $post_id,
            'amount' => $this->transaction->amount,
        ];
    }
}
