<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TalksCreateForm extends Component
{
    public $user;

    public $post;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.talks-create-form');
    }

    public function store()
    {
        $talk = $this->user->talks()->create([
            'post_id' => $this->post->id,
        ]);

        return redirect()->route('talks.show', $talk);
    }
}
