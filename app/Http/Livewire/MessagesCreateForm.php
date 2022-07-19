<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessagesCreateForm extends Component
{
    public $content;

    public function render()
    {
        return view('livewire.messages-create-form');
    }
}
