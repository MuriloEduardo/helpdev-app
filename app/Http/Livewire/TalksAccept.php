<?php

namespace App\Http\Livewire;

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
            'accepted' => true,
        ]);

        TalksAccepted::dispatch($this->talk);
    }

    public function render()
    {
        return view('livewire.talks-accept');
    }
}
