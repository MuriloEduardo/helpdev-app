<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Models\User;
use Livewire\Component;

class MessagesCreateForm extends Component
{
    public $talk;

    public $content;

    protected $rules = [
        'content' => 'required|string',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function user(): User
    {
        return auth()->user();
    }

    public function submit()
    {
        $this->validate();

        $message = $this->user()->messages()->create([
            'talk_id' => $this->talk->id,
            'content' => $this->content,
        ]);

        MessageSent::dispatch($message);

        $this->reset('content');
    }

    public function render()
    {
        return view('livewire.messages-create-form');
    }
}
