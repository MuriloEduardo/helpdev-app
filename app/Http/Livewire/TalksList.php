<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class TalksList extends Component
{
    public $posts;

    public $talk;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.talks-list', [
            'posts' => $this->posts,
        ]);
    }
}
