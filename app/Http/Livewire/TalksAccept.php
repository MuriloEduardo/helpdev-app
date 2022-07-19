<?php

namespace App\Http\Livewire;

use App\Enums\PostStatus;
use Livewire\Component;

class TalksAccept extends Component
{
    public $talk;

    public function accept()
    {
        $this->talk->post->update([
            'status' => PostStatus::ConversaAceita,
        ]);

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-accept');
    }
}
