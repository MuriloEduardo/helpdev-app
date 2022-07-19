<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class ProfileForm extends Component
{
    public $user;

    public $tags;

    protected $rules = [
        'user.name' => 'required|string',
        'tags' => 'array',
    ];

    public function mount()
    {
        $this->user = auth()->user();

        $this->tags = $this->user->tags->map(function ($tag) {
            return $tag->id;
        });
    }

    public function render()
    {
        return view('livewire.profile-form', [
            'allTags' => Tag::all(),
        ]);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->user->name,
        ]);

        $this->user->tags()->sync($this->tags);

        return redirect()->route('profile')
            ->with('message', 'Perfil atualizado com sucesso!');
    }
}
