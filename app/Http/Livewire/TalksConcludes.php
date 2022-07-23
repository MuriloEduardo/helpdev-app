<?php

namespace App\Http\Livewire;

use App\Enums\TransactionStatus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TalksConcludes extends Component
{
    use AuthorizesRequests;

    public $talk;

    public function conclude()
    {
        $this->authorize('conclude-talk', $this->talk);

        $user = auth()->user();

        if ($this->talk->user_id === $user->id) {
            $this->talk->update([
                'completed_at' => now(),
            ]);
        }

        if ($this->talk->post->user_id === $user->id) {
            $this->talk->post->update([
                'completed_at' => now(),
            ]);
        }

        if ($this->talk->completed_at && $this->talk->post->completed_at) {
            $this->talk->user->transactions()->create([
                'talk_id' => $this->talk->id,
                'amount' => $this->talk->post->amount,
                'status' => TransactionStatus::Confirmado,
            ]);
        }

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-concludes');
    }
}