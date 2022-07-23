<?php

namespace App\Http\Livewire;

use App\Enums\PostStatus;
use App\Enums\TransactionStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TalksAccept extends Component
{
    use AuthorizesRequests;

    public $talk;

    public function accept()
    {
        $this->authorize('accept-talk', $this->talk);

        $this->talk->post->update([
            'status' => PostStatus::ConversaAceita,
        ]);

        $this->talk->post->user->transactions()->create([
            'talk_id' => $this->talk->id,
            'amount' => -$this->talk->post->amount,
            'status' => TransactionStatus::Confirmado,
        ]);

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-accept');
    }
}
