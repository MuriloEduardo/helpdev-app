<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Talk;
use Livewire\Component;

class Notification extends Component
{
    public $post;

    public $talk;

    public $notification;

    public function mount()
    {
        if ($this->notification->data) {
            if (isset($this->notification->data['post_id'])) {
                $this->post = Post::find($this->notification->data['post_id']);
            }

            if (isset($this->notification->data['talk_id'])) {
                $this->talk = Talk::find($this->notification->data['talk_id']);
            }
        }
    }

    public function markAsRead()
    {
        $this->notification->markAsRead();

        return redirect()->route('notifications.index');
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
