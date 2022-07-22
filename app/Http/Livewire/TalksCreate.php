<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TalksCreate extends Component
{
    public $post;

    public function user(): User
    {
        return auth()->user();
    }

    public function render()
    {
        return view('livewire.talks-create');
    }

    public function store()
    {
        $talk = $this->user()->talks()->create([
            'post_id' => $this->post->id,
        ]);

        return redirect()->route('talks.show', $talk);
    }
}
