<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PostsCreateForm extends Component
{
    public $title;

    public $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
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
    }

    public function render()
    {
        return view('livewire.posts-create-form');
    }
}
