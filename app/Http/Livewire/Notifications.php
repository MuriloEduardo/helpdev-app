<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $post;

    public $user;

    public $notification;

    public function mount()
    {
        $this->post = Post::find($this->notification->data['post_id']);

        $this->user = User::find($this->notification->data['user_id']);
    }

    public function markAsRead()
    {
        $this->notification->markAsRead();

        return redirect()->route('notifications.index');
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
