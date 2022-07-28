<?php

namespace App\Http\Livewire;

use App\Enums\PostStatus;
use App\Events\TalksAccepted;
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

        TalksAccepted::dispatch($this->talk);

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-accept');
    }
}
