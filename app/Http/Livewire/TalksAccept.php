<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TalksAccept extends Component
{
    public $talk;

    public function accept()
    {
        $this->talk->update([
            'accepted' => true,
        ]);

        return redirect()
            ->route('talks.show', $this->talk);
    }

    public function render()
    {
        return view('livewire.talks-accept');
    }
}
