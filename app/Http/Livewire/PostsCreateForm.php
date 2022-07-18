<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PostsCreateForm extends Component
{
    public $title;

    public $content;

    protected $rules = [
        'title' => 'required|string|min:10',
        'content' => 'required|string|min:100',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        $user = auth()->user();

        $user->posts()->create([
            'title' => $this->title,
            'content' => $this->content,
            'slug' => Str::of($this->title)->slug(),
        ]);

        session()->flash('message', 'Postagem criada com sucesso!');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts-create-form');
    }
}
