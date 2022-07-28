<?php

namespace App\Http\Livewire;

use App\Events\TalksCompleted;
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
            TalksCompleted::dispatch($this->talk);
        }

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-concludes');
    }
}
