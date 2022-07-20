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
        $user = auth()->user();

        $this->posts = Post::where([
            'user_id' => $user->id,
        ])
            ->orWhereRelation('talks', 'user_id', $user->id)
            ->get();

        $this->posts = $this->posts->map(function ($post) use ($user) {
            $post->talks = $post->talks
                ->filter(function ($talk) use ($post, $user) {
                    if ($post->user_id !== $user->id) {
                        return $talk->user_id === $user->id;
                    } else {
                        return $talk;
                    }
                });

            return $post;
        });
    }

    public function render()
    {
        return view('livewire.talks-list', [
            'posts' => $this->posts,
        ]);
    }
}
