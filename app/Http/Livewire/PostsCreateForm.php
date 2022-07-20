<?php

namespace App\Http\Livewire;

use App\Events\PostCreated;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class PostsCreateForm extends Component
{
    public $title;

    public $content;

    public $tags;

    public $amount;

    protected $rules = [
        'title' => 'required|string|min:10|max:125',
        'content' => 'required|string|min:100',
        'tags' => 'required|array',
        'amount' => 'required|numeric',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        $user = auth()->user();

        $post = $user->posts()->create([
            'title' => $this->title,
            'amount' => $this->amount,
            'content' => $this->content,
            'slug' => Str::of($this->title)->slug(),
        ]);

        $post->tags()->sync($this->tags);

        PostCreated::dispatch($post);

        return redirect()->route('posts.index')
            ->with('message', 'Postagem criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.posts-create-form', [
            'allTags' => Tag::all(),
        ]);
    }
}
