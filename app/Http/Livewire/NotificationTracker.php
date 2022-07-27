<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationTracker extends Component
{
    public $user;

    public $countUnreadNotifications;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function getListeners()
    {
        return [
            "echo-private:App.Models.User.{$this->user->id},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'sendNotify',
        ];
    }

    public function sendNotify(): void
    {
        $this->countUnreadNotifications += 1;
    }

    public function render()
    {
        return view('livewire.notification-tracker');
    }
}
