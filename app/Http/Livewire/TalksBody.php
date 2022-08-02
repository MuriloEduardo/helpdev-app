<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TalksBody extends Component
{
    public $talk;

    public function getListeners()
    {
        return [
            "echo-private:talks.{$this->talk->id},TalksAccepted" => 'talkRefresh',
            "echo-private:talks.{$this->talk->id},TalksCompleted" => 'talkRefresh',
        ];
    }

    public function talkRefresh(): void
    {
        $this->talk->refresh();
    }

    public function render()
    {
        return view('livewire.talks-body');
    }
}
