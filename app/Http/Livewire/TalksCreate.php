<?php

namespace App\Http\Livewire;

use App\Events\TalksCreated;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TalksCreate extends Component
{
    use AuthorizesRequests;

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
        $this->authorize('create-talk', $this->post);

        $talk = $this->user()->talks()->create([
            'post_id' => $this->post->id,
        ]);

        TalksCreated::dispatch($talk);

        return redirect()->route('talks.show', $talk);
    }
}
