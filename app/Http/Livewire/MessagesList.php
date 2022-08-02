<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessagesList extends Component
{
    public $talk;

    public function getListeners()
    {
        return [
            "echo-private:talks.{$this->talk->id}.messages,MessageSent" => 'messageReceived',
        ];
    }

    public function messageReceived(): void
    {
        $this->talk->refresh();
    }

    public function render()
    {
        return view('livewire.messages-list');
    }
}
